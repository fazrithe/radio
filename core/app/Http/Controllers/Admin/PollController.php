<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PollController extends Controller
{
   public function index()
   {
       $page_title = 'Poll List';

       $polls = Poll::latest()->paginate(getPaginate());

       return view('admin.poll.index',compact('page_title','polls'));
   }

   public function pollStore(Request $request)
   {
       $request->validate([
           'question' => 'required|unique:polls',
           'choice' => 'required|array'
       ]);
       $poll = new Poll();
       $poll->question = $request->question;
       $poll->choice = $request->choice;
       $poll->status = $request->status ? 1 : 0;
       $poll->save();

       $notify[] = ['success','Successfully added poll'];
       return back()->withNotify($notify);
   }

   public function pollEdit(Request $request)
   {
        $poll = Poll::findOrFail($request->id);
        $request->validate([
            'question' => ['required', Rule::unique('polls')->ignore($poll->id),],
            'choice' => 'required|array'
        ]);
        $poll->question = $request->question;
        $poll->choice =$request->choice;
        $poll->status = $request->status ? 1 : 0;
        $poll->save();
        $notify[] = ['success', 'Successfully Updated poll '];
        return back()->withNotify($notify);
   }

}
