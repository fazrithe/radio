<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\Archive;
use App\Models\Event;
use App\Models\Frontend;
use App\Models\GeneralSetting;
use App\Models\Language;
use App\Models\Page;
use App\Models\Poll;
use App\Models\PollLog;
use App\Models\RadioJockey;
use App\Models\SupportAttachment;
use App\Models\SupportMessage;
use App\Models\SupportTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;


class SiteController extends Controller
{
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    public function index()
    {
        $count = Page::where('tempname', $this->activeTemplate)->where('slug', 'home')->count();
        if ($count == 0) {
            $page = new Page();
            $page->tempname = $this->activeTemplate;
            $page->name = 'HOME';
            $page->slug = 'home';
            $page->save();
        }
        $data['polls'] = Poll::where('status', 1)->first();

        $data['page_title'] = 'Home';
        $data['sections'] = Page::where('tempname', $this->activeTemplate)->where('slug', 'home')->firstOrFail();
        return view($this->activeTemplate . 'home', $data);
    }

    public function pollVote(Request $request)
    {
        $poll = Poll::findOrFail($request->id);
        $ip = $request->ip();
        $log = PollLog::where('poll_id', $poll->id)->where('ip', $ip)->get();
        $pollLog = new PollLog();
        if (!$log->isEmpty()) {
            $notify[] = ['error', 'You Have Already Participated'];
            return redirect()->back()->withNotify($notify);
        }
        if ($log->isEmpty()) {

            $pollLog->result = $poll->choice[$request->radioPoll];
            $pollLog->ip = $ip;
            $pollLog->poll_id = $poll->id;
            $pollLog->save();

            $notify[] = ['success', 'Successfully Voted'];
            return redirect()->back()->withNotify($notify);
        }
    }


    public function pages($slug)
    {
        $page = Page::where('tempname', $this->activeTemplate)->where('slug', $slug)->firstOrFail();
        $data['page_title'] = $page->name;
        $data['sections'] = $page;
        return view($this->activeTemplate . 'pages', $data);
    }


    public function contact()
    {
        $data['page_title'] = "Contact Us";
        return view($this->activeTemplate . 'contact', $data);
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'subject' => 'required|max:300',
            'message' => 'required|max:60000',
        ]);

        $email = GeneralSetting::first()->admin_email;

        sendGeneralEmail($email, $request->subject, $request->message);

        $notify[] = ['success', 'Send Email Successfull'];
        return redirect()->back()->withNotify($notify);
    }

    public function changeLanguage($lang = null)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return redirect()->back();
    }

    public function blogDetails($id, $slug)
    {
        $blog = Frontend::where('id', $id)->where('data_keys', 'blog.element')->firstOrFail();
        $page_title = $blog->data_values->title;
        return view($this->activeTemplate . 'blogDetails', compact('blog', 'page_title'));
    }

    public function allEvents()
    {
        $page_title = "All Archive Events";

        $events = Archive::where('url', '!=', null)->orWhere('input_file', '!=', null)->latest()->paginate(getPaginate());


        return view(activeTemplate() . 'events', compact('page_title', 'events'));
    }

    public function allJockeys()
    {
        $page_title = "All Jockeys";

        $jockeys = RadioJockey::latest()->with('socials')->paginate(getPaginate());

        return view(activeTemplate() . 'jockey', compact('page_title', 'jockeys'));
    }

    public function policy(Request $request)
    {
        $policy = Frontend::findOrFail($request->id)->data_values;
        $page_title = $policy->title;

        return view(activeTemplate() . 'policy', compact('policy', 'page_title'));
    }


    public function jockeyDetails(Request $request)
    {
        $jockey = RadioJockey::with('socials')->findOrFail($request->id);
        $page_title = "Rj" . $jockey->full_name;

        return view(activeTemplate() . 'rjdetails', compact('page_title', 'jockey'));
    }

    public function placeholderImage($size = null)
    {
        if ($size != 'undefined') {
            $size = $size;
            $imgWidth = explode('x', $size)[0];
            $imgHeight = explode('x', $size)[1];
            $text = $imgWidth . '×' . $imgHeight;
        } else {
            $imgWidth = 150;
            $imgHeight = 150;
            $text = 'Undefined Size';
        }
        $fontFile = realpath('assets/font') . DIRECTORY_SEPARATOR . 'RobotoMono-Regular.ttf';
        $fontSize = round(($imgWidth - 50) / 8);
        if ($fontSize <= 9) {
            $fontSize = 9;
        }
        if ($imgHeight < 100 && $fontSize > 30) {
            $fontSize = 30;
        }

        $image     = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 100, 100, 100);
        $bgFill    = imagecolorallocate($image, 175, 175, 175);
        imagefill($image, 0, 0, $bgFill);
        $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth  = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX      = ($imgWidth - $textWidth) / 2;
        $textY      = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }

    public function findEvents(Request $request)
    {
        $dayOfWeek =  $request->inputValue;

        $tab =  $request->tab;

        $events = Event::where('week_name', strtolower($dayOfWeek))->get();

        return view(activeTemplate() . 'event', compact('events', 'tab'));
    }

    public function cron()
    {

        $general = GeneralSetting::first();
        $general->last_cron = now();
        $general->save();

        $time = now()->format('H:i:s');
        Event::where('week_name', strtolower(now()->format('l')))->where('end_time', '<', $time)->where(function ($query) {
            $query->orWhere('cron_update', null)->orWhere('cron_update', '<', now()->format('Y-m-d'));
        })->get()->map(function ($item) {
            $archive = new Archive();
            $archive->jockey_name = $item->jockey->fullname;
            $archive->jockey_image = $item->jockey->image;
            $archive->event_name = $item->event_name;
            $archive->week_name = $item->week_name;
            $archive->start_time = $item->start_time;
            $archive->end_time = $item->end_time;
            $archive->image = $item->image;
            $archive->save();
            $item->cron_update = now()->format('Y-m-d');
            $item->save();
        });
    }

    public function eventSearch(Request $request)
    {
        $date = Carbon::parse($request->search)->format('Y-m-d');
        $page_title = 'Search Archive Event';

        $events = Archive::where('url', '!=', null)->whereDate('created_at', $date)->paginate(getPaginate());

        return view(activeTemplate() . 'events', compact('page_title', 'events'));
    }
}
