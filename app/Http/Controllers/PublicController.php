<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Admin\Schedule;
use App\Models\Admin\Centre;
use App\Models\Admin\Blog;
use App\Models\Admin\Faq;
use App\Models\Admin\Setting;
use App\Models\User\Contact;
use App\Models\Admin\About;
use App\Models\Admin\Course;

class PublicController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function blogs()
    {
        $blogs = Blog::where('status',1)->latest()->get();
        return view('user.blog.blogs',compact('blogs'));
    }

    public function courses()
    {
        $courses = Course::where('status',1)->latest()->get();
        return view('user.course.courses',compact('courses'));
    }

    public function courseSingle($slug)
    {
        $course = Course::where('slug',$slug)->first();
        return view('user.course.sinlge_course',compact('course'));
    }
    public function courseOrder(Request $request)
    {
            $result =  $request->package_id;
            $result_explode = explode('|', $result);
        return "Model: ". $result_explode[0]."<br />"."Colour: ". $result_explode[1]."<br />";
    }

    public function faqs()
    {
        $faqs = Faq::where('status',1)->latest()->get();
        return view('user.faqs',compact('faqs'));
    }

    public function about()
    {
        $about = About::first();
        return view('user.about',compact('about'));
    }



    public function contact()
    {
        $setting = Setting::first();
        return view('user.contact',compact('setting'));
    }

    public function contactCreate(Request $request)
    {
       // return $request->all();
        $data = $request->validate([

            'name'=>'max:191',
            'phone'=>'max:191',
            'email'=>'max:191',
            'message'=>'',
            'status'=>'',

        ]);

        $contact = Contact::create($data);
        if ($contact) {

            $details = [
                'name'=>$contact->name,
                'email'=>$contact->email,
                'phone'=>$contact->phone,
            ];

            \Mail::to($request->email)->send(new \App\Mail\MyMail($details));
            return redirect()->back()->with('success','Your message send successfully');
            // code...
        }else{

            return redirect()->back()->with('wrong','Something is wrong.please fillup form properly.');
        }
    }



    public function fetchSchedule($id){
        $schedule = Schedule::where('centre_id',$id)->get();
        return json_encode($schedule);
    }
}
