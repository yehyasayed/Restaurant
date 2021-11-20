<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chefs;
use App\Models\Eats;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\facades\Validator;


class FrontController extends Controller
{
    protected function showHome(){
        $chefs = Chefs::paginate(4);
        return view('front/home' , compact('chefs'));
    }
    protected function getMenu(){
        return view('front/menu');
    }
    protected function getMenuMeals(){
        $items = Eats::where( 'type' , '=' , 'meals' )->paginate(8);
        return view('front/meals' , compact('items'));
    }
    protected function getMenuDesserts(){
        $items = Eats::where( 'type' , '=' , 'desserts' )->paginate(8);
        return view('front/desserts' , compact('items'));
    }
    protected function getMenuDrinks(){
        $items = Eats::where( 'type' , '=' , 'drinks' )->paginate(8);
        return view('front/drinks' , compact('items'));
    }
    protected function order(){
        return view('front/order');
    }
    protected function makeOrder(Request $request){
        $validator = Validator::make( $request->all() , [
            'name' => 'required|max:100',
            'email' => 'required|max:50|email',
            'address' => 'required|max:50',
            'phone' => 'required|max:50',
            'order' => 'required|max:255',
            'meals' => 'required|max:20',
         ] , [
             'name.required' => 'you sloud enter your name',
             'email.required' => 'you sloud enter your email',
             'address.required' => 'you sloud enter your address',
             'phone.required' => 'you sloud enter your phone',
             'order.required' => 'you sloud enter your order',
             'meals.required' => 'you sloud enter your meals',
             'name.max' => 'max length 100 character',
             'email.max' => 'max length 50 character',
             'address.max' => 'max length 50 character',
             'phone.max' => 'max length 50 character',
             'order.max' => 'max length 255 character',
             'meals.max' => 'max length 20 character',
             'email.email' => 'this input required email',    
          ]);
         if( !$validator-> passes() )
         {
            return response()->json(['status'=>0 , 'error'=>$validator->errors()->toArray()]);
         }else{
            $customer = Customer::where( 'phone' , '=' ,  $request->phone)->get();
            if( count($customer)>0){
                Order::create([
                    "order" => $request -> order ,
                    "meals" => $request -> meals ,
                    "customer_id" => $customer[0]->id
                ]);
                return response()->json(['status'=>1, 'msg'=>'Successfully completed successfully']);
            }else{
                $customer = Customer::create([
                    "name" =>       $request -> name,
                    "email" =>      $request -> email,
                    "address" =>    $request -> address,
                    "phone" =>      $request -> phone,
                ]);
                Order::create([
                    "order" => $request -> order ,
                    "meals" => $request -> meals ,
                    "customer_id" => $customer -> id
                ]);
                return response()->json(['status'=>1, 'msg'=>'Successfully completed successfully']);
            }
         }

    }


}
