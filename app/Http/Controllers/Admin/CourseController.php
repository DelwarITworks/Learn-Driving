<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\course;
use App\Models\Admin\coursecate;
use Image;
use Str;
use Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function courses()
    {
        $courses =  course::where('user_id',Auth::user()->id)->where('status',1)->latest()->get();
        $count = 1;
        return view('admin.course.index_course',compact('courses','count'));
    }
    public function userdeactivecourse()
    {
        $courses =  course::where('user_id',Auth::user()->id)->where('status',0)->latest()->get();
        $count = 1;
        return view('admin.course.index_course',compact('courses','count'));
    }

    public function index()
    {
        $courses =  course::where('status',1)->latest()->get();
        $count = 1;
        return view('admin.course.index_course',compact('courses','count'));
    }

    public function create()
    {
        return view('admin.course.create_course');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'title' => 'min:15|max:191',
            'image'=>'required|max:191',
            'description'=>'required',
            'slug'=>'required|unique:courses|max:191',
        ]);

        // $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $request->slug);

        $course = course::create([

            'title'=>$request->title,
            'user_id'=>Auth::id(),
            'slug'=> $request->slug,
            'image'=>$request->image,
            'summary'=>$request->summary,
            'description'=>$request->description,
            'additional'=>$request->additional,
            'meta_tag'=>$request->meta_tag,
            'meta_description'=>$request->meta_description,

        ]);
        $this->storeImage($course);
        if($course){
            return redirect()->back()->with('success', 'course Created Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }

    }

    //course EDIT
    public function edit(course $course,Request $request)
    {
        $count = 1;
        return view('admin.course.edit_course',compact('course','count'));
    }


    //course UPDATE

    public function update(course $course,Request $request)
    {
        $request->validate([
            'title' => 'min:15|max:191',
            'image'=>'max:191',
            'description'=>'required',
        ]);


         if($request->has('image')){
             if($request->old_image){
                 unlink('storage/app/public/'.$request->old_image);
             }
             $course->update([
                 'image' => $request->image->store('admin/course','public'),
             ]);
            $resize = Image::make('storage/app/public/'.$course->image)->resize(550,320);
            $resize->save();
         }



        $course->update([

            'title'=>$request->title,
            // 'user_id'=>Auth::id(),
            // 'slug'=> $request->slug,
            'summary'=>$request->summary,
            'description'=>$request->description,
            'additional'=>$request->additional,
            'meta_tag'=>$request->meta_tag,
            'meta_description'=>$request->meta_description,


        ]);
        if($course){
            return redirect()->back()->with('success', 'course Updated Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }

    }

    public function delete(course $course)
    {
        if($course->image){
            unlink('storage/app/public/'.$course->image);
        }
      
        $course->delete();
        if($course){
            return redirect()->back()->with('deletesuccess', 'Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    
    public function active(course $course)
    {
        $course->update(['status' => 1]);
        if($course){
            return redirect()->back()->with('success', 'course Activate Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    
    public function deactive(course $course)
    {
        $course->update(['status' => 0]);
        if($course){
            return redirect()->back()->with('success', 'course Deactivate Successfully');
        }else{
            return redirect()->back()->with('wrong', 'Something went wrong!!');
        }
    }

    public function deactiveList()
    {
        $courses =course::where('status',0)->get();
        $count = 1;
        return view('admin.course.deactive_course',compact('courses','count'));
    }

    public function activeList()
    {
        $courses =course::where('status',1)->get();
        return view('admin.course.course_deactive',compact('courses'));
    }




    //PUBLIC FUNCTIONS
    // private function validateRequest()
    // {
        
    //     return request()->validate([
    //         'title'=>'required',
    //         'slug'=> 'required',
    //         'coursecate_id'=>'required',
    //         'quantity'=>'required',
           
    //         'price'=>'required',
    //         'description'=>'required',
            
    //     ]);
    // }


    private function storeImage($course)
    {
        if(request()->hasFile('image')){
            $course->update([
                'image' => request()->image->store('admin/course','public'),
            ]);
            $resize = Image::make('storage/app/public/'.$course->image)->resize(550,320);
            $resize->save();
        }
    }
}
