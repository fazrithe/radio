<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RadioJockey;
use App\Models\Social;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class RadioJockeyController extends Controller
{
    public function showAll(Request $request)
    {
        $page_title =  "All Radio Jockeys";
        $empty_message = "No Jockey Found";
        $jockies = RadioJockey::with('socials')->latest()->paginate(getPaginate());

        return view('admin.jokies.showall',compact('page_title','empty_message', 'jockies'));
    }

    public function createJockey()
    {
        $page_title =  "Add Radio Jockeys";
        return view('admin.jokies.add',compact('page_title'));
    }


    public function addJockey(Request $request)
    {

        $request->validate([
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'email' => 'required|email|unique:radio_jockeys',
            'phone' => 'required|unique:radio_jockeys',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'about' => 'required|min:10',
            'designation'=>'required',

            'institution.name'=>'required',
            'institution.from_year'=>'required|date_format:Y|before:to_year',
            'institution.to_year'=> 'required|date_format:Y',
            'institution.about_institution'=>'required',

            'company.*.name' => 'required',
            'company.*.from_year_ex' => 'required|date_format:Y|before:to_year_ex',
            'company.*.to_year_ex' => 'required|date_format:Y',
            'company.*.responsibility' => 'required',
            'gallary.*' => 'required|image|mimes:jpg,png,jpeg'

        ]);



        $gallary_path = imagePath()['rj_gallary']['path'].'/'."$request->email";
        $gallary_image_size = imagePath()['rj_gallary']['size'];

        $image_array = [];
        if ($request->hasFile('gallary')) {
            try {
                foreach ($request->gallary as $value) {
                     $file = uploadImage($value,$gallary_path,$gallary_image_size);
                     array_push($image_array, $file);
                }
            } catch (\Exception $exp) {
                $notify[] = ['errors', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $path = imagePath()['rj_image']['path'];
        $size = imagePath()['rj_image']['size'];

        if ($request->hasFile('image')) {
            try {
                $filename = uploadImage($request->image, $path, $size);
            } catch (\Exception $exp) {
                $notify[] = ['errors', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        RadioJockey::create([
            'firstname' => $request->fname,
            'lastname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'about' => $request->about,
            'designation' => $request->designation,
            'education' => $request->institution,
            'experience' => $request->company,
            'image' => $filename,
            'gallary' => $image_array
        ]);


        $notify[] = ['success', 'Successfully Created Jockey'];
        return back()->withNotify($notify);
    }

    public function details(Request $request)
    {
       $page_title = "Jockey Details";
       $jockey = RadioJockey::findOrFail($request->id);
       return view('admin.jokies.details',compact('jockey','page_title'));
    }

    public function update(Request $request , RadioJockey $jockey)
    {

        $request->validate([
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'about' => 'required|min:10',
            'image' => 'image|mimes:jpg,png,jpeg',
            'designation'=>'required',
            'institution.name' => 'required',
            'institution.from_year' => 'required|date_format:Y|before:to_year',
            'institution.to_year' => 'required|date_format:Y',
            'institution.about_institution' => 'required',

            'company.*.name' => 'required',
            'company.*.from_year_ex' => 'required|date_format:Y|before:to_year_ex',
            'company.*.to_year_ex' => 'required|date_format:Y',
            'company.*.responsibility' => 'required',

            'gallary.*' => 'image|mimes:jpg,png,jpeg'

        ]);
        $path = imagePath()['rj_image']['path'];
        $size = imagePath()['rj_image']['size'];

        $filename = $jockey->image;
        if ($request->hasFile('image')) {
            try {
                $filename = uploadImage($request->image, $path, $size, $jockey->image);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $new_gallary = $jockey->gallary;
        $gallary_path = imagePath()['rj_gallary']['path'] . '/' . $request->email;

        $gallary_image_size = imagePath()['rj_gallary']['size'];
        $image_array = [];

        if ($request->hasFile('gallary')) {
            foreach ($request->gallary as $key => $value) {
                $a = $jockey->gallary;
                //dd($a);
                $filename2 = uniqid() . time() . '.' . $value->getClientOriginalExtension();
                $image_array += [$key => $filename2];

                if(array_key_exists($key, $a)){
                    unset($a[$key]);
                    $a[$key] = $filename2;
                    $new_gallary = $a;
                    removeFile($gallary_path . '/' . $a[$key]);
                }else{
                    $new_gallary = array_replace($a, $image_array);
                }

                $image = Image::make($value);

                if (!empty($gallary_image_size)) {
                    $size = explode('x', strtolower($gallary_image_size));
                    $image->resize($size[0], $size[1]);
                }
                $image->save($gallary_path . '/' . $filename2);
            }

            try {

            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }
        sort($new_gallary);
        $jockey->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'about' => $request->about,
            'designation'=>$request->designation,
            'education' => $request->institution,
            'experience' => $request->company,
            'image' => $filename,
            'gallary' => $new_gallary
        ]);

        $notify[] = ['success', 'Successfully Updated '];
        return back()->withNotify($notify);
    }




    public function social()
    {
        $page_title = 'Assign Social Links To Jockey';
        $jockeys = RadioJockey::latest()->get(['id','email']);
        $socials = Social::with('jockey')->latest()->paginate(getPaginate());
        return view('admin.jokies.social',compact('jockeys','page_title','socials'));
    }

    public function socialAdd(Request $request)
    {
       
        $check = Social::where('radio_jockey_id', $request->radio_jockey_id)->where('title', $request->title)->get();
        if($check->count() >= 1 ) {
            $notify[] = ['error', 'You have Already Added This Icon for this Jockey'];
            return back()->withNotify($notify);
        }

        $this->validate($request, [
                'radio_jockey_id' => 'required|numeric',
                'title' => 'required|min:4',
                'icon' => 'required',
                'url' => 'required',
                'bgcolor' => 'required|regex:/^[a-f0-9]{6}$/i'
            ]);

       Social::create([
            'radio_jockey_id' => $request->radio_jockey_id,
            'title' => strtolower($request->title),
            'icon' => $request->icon,
            'url' => $request->url,
            'bgcolor' => $request->bgcolor
       ]);

        $notify[] = ['success', 'Successfully Created '];
        return back()->withNotify($notify);

    }


    public function socialupdate(Request $request)
    {

        $this->validate($request, [
            'id' => 'numeric|required',
            'radio_jockey_id' => 'required|numeric',
            'title' => 'required|min:4',
            'icon' => 'required',
            'url' => 'required',
            'bgcolor' => 'required|regex:/^[a-f0-9]{6}$/i'
        ]);

        $social = Social::findOrFail($request->id);

        $social->update([
            'radio_jockey_id' => $request->radio_jockey_id,
            'title' => strtolower($request->title),
            'icon' => $request->icon,
            'url' => $request->url,
            'bgcolor' => $request->bgcolor
        ]);

        $notify[] = ['success', 'Successfully Updated '];
        return back()->withNotify($notify);

    }

    public function removeSocial(Request $request)
    {
        $social = Social::findOrFail($request->id);

        $social->delete();

        $notify[] = ['success', 'Successfully Deleted '];
        return back()->withNotify($notify);

    }

    public function searchJockey(Request $request)
    {
        if ($request->has('search')) {

            $jockies = RadioJockey::where('email', 'LIKE', '%' . $request->search . '%')->paginate(getPaginate(10));

            if ($jockies->count() == 0) {
                $notify[] = ['error', 'No Jockey Found'];
                return back()->withNotify($notify);
            }

            $page_title = "Searched Jockey";
            $empty_message = "No Jockey Has been Created";

            return view('admin.jokies.showall', compact('page_title', 'empty_message', 'jockies'));
        }

        $notify[] = ['error', 'Invalid Search Request'];
        return back()->withNotify($notify);
    }


    public function searchJockeySocial(Request $request)
    {
        if ($request->has('search')) {

            $jockeys = RadioJockey::latest()->get(['id', 'email']);
            $jockies = RadioJockey::where('email', 'LIKE', '%' . $request->search . '%')->first();

            $socials = Social::where('radio_jockey_id', $jockies->id)->paginate(getPaginate(10));

            if ($socials->count() == 0) {
                $notify[] = ['error', 'No social Icon Found'];
                return back()->withNotify($notify);
            }

            $page_title = "Searched social Icon";
            $empty_message = "No Jockey Has been Created";

            return view('admin.jokies.social', compact('jockeys', 'page_title', 'socials'));
        }

        $notify[] = ['error', 'Invalid Search Request'];
        return back()->withNotify($notify);
    }

}


