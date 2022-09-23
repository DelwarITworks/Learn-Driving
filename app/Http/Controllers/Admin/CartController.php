<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Admin\Course;
use App\Models\User;
use Auth;

class CartController extends Controller
{

    public function addCart(Request $request,Course $course)
    {
        // $product = Course::findorFail($id);
        $array = array();

        $array['id'] = $course->id;
        $array['name'] = $course->title;
        $array['qty'] = $request->quantity;;
        $array['price'] = $request->total_amount;
        $array['weight'] = 1;
        $array['options']['course_id'] = $course->id;
        $array['options']['package_id'] = 1;
        $array['options']['car_id'] = 1;
        $array['options']['user_id'] = 1;
        $array['options']['assistant'] = $request->assistant;
        $array['options']['start_date'] = $request->start_date;
        $array['options']['time_slot'] = $request->time_slot;
        $array['options']['quantity'] = $request->quantity;
        Cart::add($array);



        return Response()->json(['success'=>'Addcart']);
    }

    public function update($id)
    {
        $update = Cart::update($id,request()->qty);
        return back();
    }

    public function view()
    {
        if(Auth::check()){
        $data = User::findorFail(Auth::id());
        $userdetails = $data->userdetail;
        $viewcarts = Cart::content();
        return view('cartview',compact('userdetails','viewcarts'));
        }else{
            $notification = array(
                'messege' => '!!Login First Please',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return back();
    }
}
