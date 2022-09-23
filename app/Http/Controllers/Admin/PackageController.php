<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Package;
use App\Models\Admin\Course;
use Image;
use Str;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $packages = package::latest()->get();
        $courses = course::latest()->get();
        $count = 1;
        return view('admin.course.package_manage',compact('packages','courses','count'));
    }
   public function create(Request $request)
    {
        $this->validateRequest();
        $package = package::create([
            'course_id'=> $request->course_id,
            'time'=> $request->time,
            'amount'=> $request->amount,
        ]);
        if($package){
            return redirect()->back()->with('success','Package store successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }


    public function update(package $package ,Request $request)
    {
        $this->validateRequest();
        $package->update([
            'course_id'=> $request->course_id,
            'time'=> $request->time,
            'amount'=> $request->amount,
        ]);

        if($package){
            return redirect()->back()->with('success','Package updated successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }

    }

    public function delete(package $package)
    {
        // if($package->image){
        // unlink('storage/app/public/'.$package->image);
        // }
        $package->delete();
        if($package){
            return redirect()->back()->with('success','Package deleted successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }


    public function active(package $package)
    {
        $package->update(['status' => 1]);
        if($package){
            return redirect()->back()->with('success','This package activate successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }

    
    public function deactive(package $package)
    {
        $package->update(['status' => 0]);
        if($package){
            return redirect()->back()->with('success','This package deactive successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }



    //private methods
    private function validateRequest()
    {
        return request()->validate([
            'course_id'=>'required|max:11',
            'time'=>'required|max:4',
            'amount'=>'required|max:11',
            // 'image'=>'required',
        ]);
    }

   private function storeImage($package)
    {
        if(request()->hasFile('image')){
            $package->update([
                'image' => request()->image->store('admin/package','public'),
            ]);

            $resize = Image::make('storage/app/public/'.$package->image)->resize(300,300);
            $resize->save();
        }
    }
}
