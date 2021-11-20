<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chefs;
use App\Models\Eats;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\facades\Validator;

class AdminController extends Controller
{
    protected function showAdmin(){
        $chefs = Chefs::select('id','name')->get();
        $eats = Eats::select('id','title','type')->get();
        $items=[$chefs,$eats];
        return view('admin\dashboard' , compact('items'));
    }



    protected function addChef(Request $request){
        $file_extension = $request -> photo -> getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $photo_path = 'images/chef';
        $request -> photo -> move( $photo_path , $file_name );
        
        // make Validator
        $validator = Validator::make( $request->all() , [
           'name' => 'required|max:100',
           'information' => 'required',
        ] , [
            'name.required' => 'you sloud enter the name',
            'information.required' => 'you sloud enter the information',
            'name.max' => 'You must enter a number of characters less than 100 characters',
         ]);
        if( !$validator-> passes() )
        {
            return response()->json(['status'=>0 , 'error'=>$validator->errors()->toArray()]);
        }else{
            Chefs::create([
                "name" => $request -> name ,
                "information" => $request -> information ,
                "photo" => $file_name,
            ]);
            return response()->json(['status'=>1, 'msg'=>'Successfully completed successfully']);
        }
    }



    protected function deletChef(Request $request){
        $chef = Chefs::find($request -> id);
        if(!$chef)
        {
            return redirrect()->back();
        }
        else{
            $chef->delete();
            return response()->json([
                'status' => true ,
                'msg' => "delect process Successfully" ,
                'id' => $request -> id
            ]);
        }
    }



    protected function addMenu(Request $request){
        $file_extension = $request -> photo -> getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $photo_path = 'images/menu';
        $request -> photo -> move( $photo_path , $file_name );
        
        // make Validator
        $validator = Validator::make( $request->all() , [
           'title' => 'required|max:50',
           'details' => 'required|max:255',
           'type' => 'required|max:20',
           'price' => 'required|max:20',
        ] , [
            'title.required' => 'you sloud enter the title',
            'details.required' => 'you sloud enter the details',
            'type.required' => 'you sloud enter the type',
            'price.required' => 'you sloud enter the price',
            'title.max' => 'You must enter a number of characters less than 50 characters',
            'details.max' => 'You must enter a number of characters less than 255 characters',
            'type.max' => 'You must enter a number of characters less than 20 characters',
            'price.max' => 'You must enter a number of characters less than 20 characters',
         ]);
        if( !$validator-> passes() )
        {
            return response()->json(['status'=>0 , 'error'=>$validator->errors()->toArray()]);
        }else{
            Eats::create([
                "title" => $request -> title ,
                "details" => $request -> details ,
                "type" => $request -> type ,
                "price" => $request -> price ,
                "photo" => $file_name,
            ]);
            return response()->json(['status'=>1, 'msg'=>'Successfully completed successfully']);
        }
    }



    protected function deletMenu(Request $request){
        $menu = Eats::find($request -> id);
        if(!$menu)
        {
            return redirrect()->back();
        }
        else{
            $menu->delete();
            return response()->json([
                'status' => true ,
                'msg' => "delect process Successfully" ,
                'id' => $request -> id
            ]);
        }
    }
}
