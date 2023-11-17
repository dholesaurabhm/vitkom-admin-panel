<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Input, Redirect,Response,Hash,Storage,DB,Mail,URL,Session; 
use App\Models\User;
use App\Models\Client;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addUser(Request $request)
    {
        try {
            $data=$request->all();
            $rules = array(
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
                'joining_date'=>'required',
                'end_date'=>'required',
                'status'=>'required',
            );
            $messages = [
            'required' => 'The :attribute field is required.',
            ];
            $validator = Validator::make($request->all(), $rules,$messages);
            
            if ($validator->fails()) {
                return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray(),
                'message'=>"Please Fill All Details"
            ), 400); 
            }
            else{
                $user=new User();
                $user->name=$data['name'];
                $user->email=$data['email'];
                $user->password=Hash::make($data['password']);
                $user->joining_date=$data['joining_date'];
                $user->end_date=$data['end_date'];
                $user->status=$data['status'];
                $user->normal_password=$data['password'];
                $user->save();
                return Response::json(array( 'success' => true,'data' => $user,'message'=>'User Added Successfully.'), 200); 
            }
          
          } catch (\Exception $e) {
          
              return $e->getMessage();
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        
        try {
            $data=$request->all();
            $rules = array(
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
                'joining_date'=>'required',
                'end_date'=>'required',
                'status'=>'required',
            );
            $messages = [
            'required' => 'The :attribute field is required.',
            ];
            $validator = Validator::make($request->all(), $rules,$messages);
            
            if ($validator->fails()) {
                return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray(),
                'message'=>"Please Fill All Details"
            ), 400); 
            }
            else{
                User::where('id',$id)->update(['name'=>$data['name'],'email'=>$data['email'],'password'=>Hash::make($data['password']),'normal_password'=>$data['password'],'joining_date'=>$data['joining_date'],'end_date'=>$data['end_date'],'status'=>$data['status']]);
                return Response::json(array( 'success' => true,'data' => $data,'message'=>'User Updated Successfully.'), 200); 
            }
          
          } catch (\Exception $e) {
          
              return $e->getMessage();
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listUser(Request $request)
    {
        try {
            $data=$request->all();
            $list=User::get();
            $count=User::count();
            return response()->json(['recordsTotal' => $count,'recordsFiltered' =>$count ,'data'=>$list]);

        } catch (\Exception $e) {
          
            return $e->getMessage();
        }
    }


    public function getUser(Request $request)
    {
        try {
            $data=$request->all();
            if(isset($data['user_id']))
            {
                $list=User::where('id',$data['user_id'])->first();
            }
            else{
                $list=User::get();
            }
          
            return Response::json(array( 'success' => true,'data' => $list,'message'=>'User List.'), 200); 
        } catch (\Exception $e) {
          
            return $e->getMessage();
        }
    }

    
    public function deleteUser(Request $request)
    {
        try {
            $data=$request->all();
            $rules = array(
                'user_id'=>'required'
            );
            $messages = [
            'required' => 'The :attribute field is required.',
            ];
            $validator = Validator::make($request->all(), $rules,$messages);
            
            if ($validator->fails()) {
                return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray(),
                'message'=>"Please Fill All Details"
            ), 400); 
            }
            else{
              $user= User::where('id', $data['user_id'])->delete();
                return Response::json(array( 'success' => true,'data' => $user,'message'=>'User Deleted Successfully.'), 200); 
            }
        } catch (\Exception $e) {
          
            return $e->getMessage();
        }
    }

    /*Client Functions */

    public function addClient(Request $request)
    {
        try {
            $data=$request->all();
            $rules = array(
                'name'=>'required',
                'email'=>'required',
                'mobile_no'=>'required',
                'pan_no'=>'required',
                'aadhar_no'=>'required',
                'dob'=>'required',
                'gender'=>'required'
            );
            $messages = [
            'required' => 'The :attribute field is required.',
            ];
            $validator = Validator::make($request->all(), $rules,$messages);
            
            if ($validator->fails()) {
                return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray(),
                'message'=>"Please Fill All Details"
            ), 400); 
            }
            else{
                $client=new Client();
                $client->name=$data['name'];
                $client->email=$data['email'];
                $client->mobile_no=$data['mobile_no'];
                $client->pan_no=$data['pan_no'];
                $client->aadhar_no=$data['aadhar_no'];
                $client->dob=$data['dob'];
                $client->gender=$data['gender'];
                $client->isdelete=0;
                $client->save();
                return Response::json(array( 'success' => true,'data' => $client,'message'=>'Client Added Successfully.'), 200); 
            }
          
          } catch (\Exception $e) {
          
              return $e->getMessage();
          }
    }

    public function updateClient(Request $request, $id)
    {
        
        try {
            $data=$request->all();
            $rules = array(
                'name'=>'required',
                'email'=>'required',
                'mobile_no'=>'required',
                'pan_no'=>'required',
                'aadhar_no'=>'required',
                'dob'=>'required',
                'gender'=>'required',
            );
            $messages = [
            'required' => 'The :attribute field is required.',
            ];
            $validator = Validator::make($request->all(), $rules,$messages);
            
            if ($validator->fails()) {
                return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray(),
                'message'=>"Please Fill All Details"
            ), 400); 
            }
            else{
                Client::where('id',$id)->update(['name'=>$data['name'],'email'=>$data['email'],'mobile_no'=>$data['mobile_no'],'pan_no'=>$data['pan_no'],'aadhar_no'=>$data['aadhar_no'],'dob'=>$data['dob'],'gender'=>$data['gender']]);
                return Response::json(array( 'success' => true,'data' => $data,'message'=>'Client Updated Successfully.'), 200); 
            }
          
          } catch (\Exception $e) {
          
              return $e->getMessage();
          }
    }

    public function listClient(Request $request)
    {
        try {
            $data=$request->all();
            $list=Client::where('isdelete',0)->get();
            $count=Client::where('isdelete',0)->count();
            return response()->json(['recordsTotal' => $count,'recordsFiltered' =>$count ,'data'=>$list]);

        } catch (\Exception $e) {
          
            return $e->getMessage();
        }
    }


    public function getClient(Request $request)
    {
        try {
            $data=$request->all();
            if(isset($data['client_id']))
            {
                $list=Client::where('id',$data['client_id'])->first();
            }
            else{
                $list=Client::get();
            }
          
            return Response::json(array( 'success' => true,'data' => $list,'message'=>'Client List.'), 200); 
        } catch (\Exception $e) {
          
            return $e->getMessage();
        }
    }

    public function deleteClient(Request $request)
    {
        try {
            $data=$request->all();
            $rules = array(
                'client_id'=>'required'
            );
            $messages = [
            'required' => 'The :attribute field is required.',
            ];
            $validator = Validator::make($request->all(), $rules,$messages);
            
            if ($validator->fails()) {
                return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray(),
                'message'=>"Please Fill All Details"
            ), 400); 
            }
            else{
              $client= Client::where('id', $data['client_id'])->update(['isdelete'=>1]);
                return Response::json(array( 'success' => true,'data' => $client,'message'=>'Client Deleted Successfully.'), 200); 
            }
        } catch (\Exception $e) {
          
            return $e->getMessage();
        }
    }
}
