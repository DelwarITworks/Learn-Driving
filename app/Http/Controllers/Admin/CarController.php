<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\car;
use App\Models\Admin\Course;
use Image;
use Str;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cars = car::latest()->get();
        $courses = course::latest()->get();
        $count = 1;
        return view('admin.course.car_manage',compact('cars','courses','count'));
    }
   public function create(Request $request)
    {
        $this->validateRequest();
        $car = car::create([
            'course_id'=> $request->course_id,
            'name'=> $request->name,
            'amount'=> $request->amount,
        ]);
        if($car){
            return redirect()->back()->with('success','car store successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }


    public function update(car $car ,Request $request)
    {
        $this->validateRequest();
        $car->update([
            'course_id'=> $request->course_id,
            'name'=> $request->name,
            'amount'=> $request->amount,
        ]);

        if($car){
            return redirect()->back()->with('success','car updated successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }

    }

    public function delete(car $car)
    {
        // if($car->image){
        // unlink('storage/app/public/'.$car->image);
        // }
        $car->delete();
        if($car){
            return redirect()->back()->with('success','car deleted successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }


    public function active(car $car)
    {
        $car->update(['status' => 1]);
        if($car){
            return redirect()->back()->with('success','This car activate successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }

    
    public function deactive(car $car)
    {
        $car->update(['status' => 0]);
        if($car){
            return redirect()->back()->with('success','This car deactive successfully.');
        }else{
            return redirect()->back()->with('wrong','Something went wrong.');
        }
    }



    //private methods
    private function validateRequest()
    {
        return request()->validate([
            'course_id'=>'required|max:11',
            'name'=>'required|max:191',
            'amount'=>'required|max:11',
            // 'image'=>'required',
        ]);
    }

   private function storeImage($car)
    {
        if(request()->hasFile('image')){
            $car->update([
                'image' => request()->image->store('admin/car','public'),
            ]);

            $resize = Image::make('storage/app/public/'.$car->image)->resize(300,300);
            $resize->save();
        }
    }
}
