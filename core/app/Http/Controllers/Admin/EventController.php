<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Models\Archive;
use App\Models\RadioJockey;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function createEvent()
    {
        $page_title = "Create Event";
        $jockeys = RadioJockey::latest()->get();
        return view('admin.event.createevent', compact('page_title', 'jockeys'));
    }

    public function eventStore(Request $request)
    {
        $this->validate($request, [
            'jockey_id' => 'required|numeric',
            'event_name' => 'required|min:4',
            'week_name' => 'required',
            'start_time' => 'required|before:end_time',
            'end_time' => 'required|after:start_time',
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $start_time = Carbon::parse($request->start_time)->format('H:i');
        $end_time = Carbon::parse($request->end_time)->format('H:i');

        $validData =   Event::where('week_name', strtolower($request->week_name))->where(function ($q) use ($start_time, $end_time) {
            $q->whereBetween('start_time', [$start_time, $end_time])
                ->orWhereBetween('end_time', [$start_time, $end_time])
                ->orWhere(function ($q) use ($start_time, $end_time) {
                    $q->where('start_time', '<', $start_time)->where('end_time', '>', $end_time);
                });
        })->get();

        if ($validData->isNotEmpty()) {
            $notify[] = ['error', 'Already have a event in this time'];
            return back()->withNotify($notify);
        }

        $path = imagePath()['program']['path'];
        $size = imagePath()['program']['size'];

        if ($request->hasFile('image')) {

            try {
                $filename = uploadImage($request->image, $path, $size);
            } catch (\Exception $exp) {
                $notify[] = ['errors', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $event = new Event();

        $event->radio_jockey_id = $request->jockey_id;
        $event->event_name =  $request->event_name;
        $event->week_name = $request->week_name;
        $event->start_time = $start_time;
        $event->end_time = $end_time;
        $event->image = $filename;
        $event->save();

        $notify[] = ['success', 'Event Created Successfully'];
        return back()->withNotify($notify);
    }


    public function showAll()
    {
        $page_title = "All Events";
        $empty_message = "No Event Has been Created";

        $events = Event::with('jockey')->latest()->paginate(getPaginate());

        return view('admin.event.showall', compact('page_title', 'empty_message', 'events'));
    }


    public function eventDetails(Event $event)
    {
        $page_title = "Event Details";
        $jockeys = RadioJockey::latest()->get();
        return view('admin.event.details', compact('page_title', 'event', 'jockeys'));
    }


    public function eventDetailsUpdate(Request $request, Event $event)
    {

        $this->validate($request, [
            'radio_jockey_id' => 'required|numeric',
            'event_name' => 'required|min:4',
            'week_name' => 'required',
            'start_time' => 'required|before:end_time',
            'end_time' => 'required|after:start_time',
            'image' => 'image|mimes:jpg,png,jpeg',
            'url' => 'sometimes'
        ]);
        $start_time = Carbon::parse($request->start_time)->format('H:i');
        $end_time = Carbon::parse($request->end_time)->format('H:i');



    $validData =   Event::where('id', '!=', $event->id)->where('week_name', strtolower($request->week_name))->where(function ($q) use ($start_time, $end_time) {
            $q->whereBetween('start_time', [$start_time, $end_time])
                ->orWhereBetween('end_time', [$start_time, $end_time])
                ->orWhere(function ($q) use ($start_time, $end_time) {
                    $q->where('start_time', '<', $start_time)->where('end_time', '>', $end_time);
                });
        })->get();


        if ($validData->isNotEmpty()) {
            $notify[] = ['error', 'Already have a event in this time'];
            return back()->withNotify($notify);
        }

        $path = imagePath()['program']['path'];
        $size = imagePath()['program']['size'];

        $filename = $event->image;
        if ($request->hasFile('image')) {

            removeFile($path . '/' . $event->image);
            try {
                $filename = uploadImage($request->image, $path, $size);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $event->radio_jockey_id  = $request->radio_jockey_id;
        $event->event_name = $request->event_name;
        $event->week_name  = $request->week_name;
        $event->start_time = $start_time;
        $event->end_time  = $end_time;
        $event->image = $filename;
        $event->cron_update = null;
        $event->save();

        $notify[] = ['success', 'Event Updated Successfully'];
        return back()->withNotify($notify);
    }

    public function archive()
    {
        $page_title = "All Archived Events";
        $empty_message = "No Event Has been Created";
        $archives = Archive::latest()->paginate(getPaginate());
        return view('admin.event.archiveall', compact('page_title', 'empty_message', 'archives'));
    }

    public function archiveDetails($id)
    {
        $page_title = "All Archived Events";
        $archive = Archive::findOrFail($id);
        return view('admin.event.archive', compact('page_title', 'archive'));
    }

    public function archiveDetailsUpdate(Request $request, $id)
    {

        $request->validate([
            'url' => 'sometimes|url',
            'audio' => 'sometimes|mimes:mp3,mpga,wav,ogg',
        ]);

        $archive = Archive::findOrFail($id);
        $path_audio = imagePath()['event_audio']['path'];
        if($archive->input_file != null){
            unlink($path_audio.'/'.$archive->input_file);
        }

        $file = $request->audio;
        if ($request->hasFile('audio')) {
            try {
                $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();

                $file->move($path_audio, $filename);
            } catch (\Exception $exp) {
                $notify[] = ['errors', 'File could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }


        $archive->url = isset($request->url) ? $request->url : NULL;
        $archive->input_file = isset($filename) ? $filename : NULL;
        $archive->save();

        $notify[] = ['success', 'Archive Updated Successfully'];
        return back()->withNotify($notify);
    }

    public function archiveEventAll()
    {
        $page_title = "All Archived No Url Events";
        $empty_message = "No Event Has been Archived";
        $archives = Archive::where('url', null)->latest()->paginate(getPaginate());
        return view('admin.event.archiveall', compact('page_title', 'empty_message', 'archives'));
    }

    public function archiveEventSearch(Request $request)
    {

        if ($request->has('search')) {

            $archives = Archive::where('event_name', 'LIKE', '%' . $request->search . '%')->paginate(getPaginate());

            if ($archives->count() == 0) {
                $notify[] = ['error', 'No Events Found'];
                return back()->withNotify($notify);
            }

            $page_title = "Searched Archive";
            $empty_message = "No Event Has been Created";

            return view('admin.event.archiveall', compact('page_title', 'empty_message', 'archives'));
        }

        $notify[] = ['error', 'Invalid Search Request'];
        return back()->withNotify($notify);
    }



    public function delete(Request $request)
    {
        $event = Event::findOrFail($request->event);

        $event->delete();

        $notify[] = ['success', 'Event Deleted Successfully'];
        return back()->withNotify($notify);
    }

    public function eventSearch(Request $request)
    {

        if ($request->has('search')) {

            $events = Event::where('event_name', 'LIKE', '%' . $request->search . '%')->paginate(getPaginate());

            if ($events->count() == 0) {
                $notify[] = ['error', 'No Events Found'];
                return back()->withNotify($notify);
            }

            $page_title = "Searched Events";
            $empty_message = "No Event Has been Created";

            return view('admin.event.showall', compact('page_title', 'empty_message', 'events'));
        }

        $notify[] = ['error', 'Invalid Search Request'];
        return back()->withNotify($notify);
    }

    public function archiveDelete($id)
    {
        $archive = Archive::findOrFail($id);

        $path_audio = imagePath()['event_audio']['path'];

        if ($archive->input_file != null) {
            unlink($path_audio . '/' . $archive->input_file);
        }
        $archive->delete();

        $notify[] = ['success', 'Archive Deleted Success'];
        return back()->withNotify($notify);
    }
}
