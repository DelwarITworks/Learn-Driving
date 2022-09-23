<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Faq;
use Image;
use Str;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $faqs = faq::latest()->get();
        $count = 1;
        return view('admin.faq.faq_manage',compact('faqs','count'));
    }
   public function create(Request $request)
    {
        $this->validateRequest();
        $faq = faq::create([
            'question'=> $request->question,
            'answer'=> $request->answer,
        ]);
        return redirect()->back()->with('success','faq Stored Successfully.');
    }


    public function update(faq $faq ,Request $request)
    {
        $this->validateRequest();
        $faq->update([
            'question'=> $request->question,
            'answer'=> $request->answer,
        ]);

        return redirect()->back()->with('success','faq Updated Successfully');

    }

    public function delete(faq $faq)
    {
        $faq->delete();
        return redirect()->back()->with('wrong','Deleted Successful');
    }


    public function active(faq $faq)
    {
        $faq->update(['status' => 1]);
        if($faq){
            return redirect()->back()->with('success','This faq activate successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }

    
    public function deactive(faq $faq)
    {
        $faq->update(['status' => 0]);
        if($faq){
            return redirect()->back()->with('success','This faq deactive successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }



    //private methods
    private function validateRequest()
    {
        return request()->validate([
            'questions'=> 'max:191',
            'answer'=> '',
        ]);
    }

}
