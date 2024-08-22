<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function CustomerPage():view{
        return view('pages.dashboard.customer-page');
    }
    public function CustomerCreate(Request $request){
        try {
            $name = $request->input('name');
            $email = $request->input('email');
            $mobile = $request->input('mobile');
            $address = $request->input('address');
            $user_id = $request->header('id');

         return Customer::create([
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'address' => $address,
                'user_id' => $user_id
            ],201);
        }catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
    public function CustomerList(Request $request){

            $user_id = $request->header('id');
            return Customer::where('user_id',$user_id)->get();
    }
    public function CustomerUpdate(Request $request){
        try{

            $customer_id = $request->input('id');
            $user_id = $request->header('id');
           return Customer::where('id',$customer_id)->where('user_id',$user_id)->update([
                'name'=> $request->input('name'),
                'email'=> $request->input('email'),
                'mobile'=> $request->input('mobile'),
                'address'=> $request->input('address')
            ],200);

        }catch (\Exception $e){
          return response()->json([
              'status' => 'error',
              'message' => $e->getMessage()
          ]);
        }
    }
  public function CustomerDelete(Request $request){
        try{
            $customer_id = $request->input('id');
            $user_id = $request->header('id');

           return  Customer::where('id',$customer_id)->where('user_id',$user_id)->delete();

        }catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
  }
    public function CustomerById(Request $request){
        $user_id = $request->header('id');
        $customer_id = $request->input('id');
        return Customer::where('id',$customer_id)->where('user_id',$user_id)->first();
    }
}
