<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Input, Redirect,Response,Hash,Storage,DB,Mail,URL,Session; 
use App\Models\User;
use App\Models\Client;
use App\Models\InsurerMaster;
use App\Models\SchemeMaster;
use App\Models\FundMaster;
use App\Models\FundPlan;

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

     /*Insurer Master Functions */

     public function addinsurer_master(Request $request)
     {
         try {
             $data=$request->all();
             $rules = array(
                 'insurance_type'=>'required',
                 'company_name'=>'required',
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
                 $insm=new InsurerMaster();
                 $insm->insurance_type=$data['insurance_type'];
                 $insm->company_name=$data['company_name'];
                 $insm->isdelete=0;
                 $insm->save();
                 return Response::json(array( 'success' => true,'data' => $insm,'message'=>'Company Name Added Successfully.'), 200); 
             }
           
           } catch (\Exception $e) {
           
               return $e->getMessage();
           }
     }
 
     public function updateinsurer_master(Request $request, $id)
     {
         
         try {
             $data=$request->all();
             $rules = array(
                'insurance_type'=>'required',
                'company_name'=>'required',
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
                InsurerMaster::where('id',$id)->update(['insurance_type'=>$data['insurance_type'],'company_name'=>$data['company_name']]);
                 return Response::json(array( 'success' => true,'data' => $data,'message'=>'Company Name Updated Successfully.'), 200); 
             }
           
           } catch (\Exception $e) {
           
               return $e->getMessage();
           }
     }
 
     public function listinsurer_master(Request $request)
     {
         try {
             $data=$request->all();
             $list=InsurerMaster::where('isdelete',0)->get();
             $count=InsurerMaster::where('isdelete',0)->count();
             return response()->json(['recordsTotal' => $count,'recordsFiltered' =>$count ,'data'=>$list]);
 
         } catch (\Exception $e) {
           
             return $e->getMessage();
         }
     }
 
 
     public function getinsurer_master(Request $request)
     {
         try {
             $data=$request->all();
             $list=InsurerMaster::select('id','insurance_type','company_name',DB::raw('replace(replace(replace(insurance_type, 1, "LIFE INSURANCE"),2,"HEALTH INSURANCE"),3,"GENERAL INSURANCE")as insurance_name'))->where('isdelete',0);
             if(isset($data['type']))
             {
                $list=$list->where('insurance_type',$data['type']);
             }

             if(isset($data['insurer_id']))
             {
                $list=$list->where('id',$data['insurer_id'])->first();
             }
             else{
                $list=$list->get();
             }
           
             return Response::json(array( 'success' => true,'data' => $list,'message'=>'Insurer Master List.'), 200); 
         } catch (\Exception $e) {
           
             return $e->getMessage();
         }
     }
 
     public function deleteinsurer_master(Request $request)
     {
         try {
             $data=$request->all();
             $rules = array(
                 'insurer_id'=>'required'
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
               $client= InsurerMaster::where('id', $data['insurer_id'])->update(['isdelete'=>1]);
                 return Response::json(array( 'success' => true,'data' => $client,'message'=>'Company Deleted Successfully.'), 200); 
             }
         } catch (\Exception $e) {
           
             return $e->getMessage();
         }
     }

       /*Scheme Master Functions */

       public function addscheme_master(Request $request)
       {
           try {
               $data=$request->all();
               $rules = array(
                   'scheme_type'=>'required',
                   'insurer_id'=>'required',
                   'scheme_name'=>'required',
                   'nav'=>'required'
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
                   $insm=new SchemeMaster();
                   $insm->scheme_type=$data['scheme_type'];
                   $insm->insurer_id=$data['insurer_id'];
                   $insm->scheme_name=$data['scheme_name'];
                   $insm->nav=$data['nav'];
                   $insm->isdelete=0;
                   $insm->save();
                   return Response::json(array( 'success' => true,'data' => $insm,'message'=>'Scheme Added Successfully.'), 200); 
               }
             
             } catch (\Exception $e) {
             
                 return $e->getMessage();
             }
       }
   
       public function updatescheme_master(Request $request, $id)
       {
           
           try {
               $data=$request->all();
               $rules = array(
                'scheme_type'=>'required',
                'insurer_id'=>'required',
                'scheme_name'=>'required',
                'nav'=>'required'
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
                SchemeMaster::where('id',$id)->update(['scheme_type'=>$data['scheme_type'],'insurer_id'=>$data['insurer_id'],'scheme_name'=>$data['scheme_name'],'nav'=>$data['nav']]);
                return Response::json(array( 'success' => true,'data' => $data,'message'=>'Scheme Updated Successfully.'), 200); 
               }
             
             } catch (\Exception $e) {
             
                 return $e->getMessage();
             }
       }
   
       public function listscheme_master(Request $request)
       {
           try {
               $data=$request->all();
               $list=SchemeMaster::select('scheme_master.id','scheme_type','insurer_id','scheme_name','nav','insurer_master.company_name',DB::raw('replace(replace(replace(insurance_type, 1, "LIFE INSURANCE"),2,"HEALTH INSURANCE"),3,"GENERAL INSURANCE")as insurance_name'))->leftJoin('insurer_master', 'insurer_master.id', '=', 'scheme_master.insurer_id')->where('scheme_master.isdelete',0)->orderBy('scheme_master.created_at','DESC')->get();
               $count=SchemeMaster::where('isdelete',0)->count();
               return response()->json(['recordsTotal' => $count,'recordsFiltered' =>$count ,'data'=>$list]);
   
           } catch (\Exception $e) {
             
               return $e->getMessage();
           }
       }
   
   
       public function getscheme_master(Request $request)
       {
           try {
               $data=$request->all();
               $list=SchemeMaster::select('scheme_master.id','scheme_type','insurer_id','scheme_name','nav','insurer_master.company_name',DB::raw('replace(replace(replace(insurance_type, 1, "LIFE INSURANCE"),2,"HEALTH INSURANCE"),3,"GENERAL INSURANCE")as insurance_name'))->leftJoin('insurer_master', 'insurer_master.id', '=', 'scheme_master.insurer_id')->where('scheme_master.isdelete',0);
               
               if(isset($data['scheme_id']))
               {
                  $list=$list->where('scheme_master.id',$data['scheme_id'])->first();
               }
               else{
                  $list=$list->get();
               }
             
               return Response::json(array( 'success' => true,'data' => $list,'message'=>'Scheme Master List.'), 200); 
           } catch (\Exception $e) {
             
               return $e->getMessage();
           }
       }
   
       public function deletescheme_master(Request $request)
       {
           try {
               $data=$request->all();
               $rules = array(
                   'scheme_id'=>'required'
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
                 $client= SchemeMaster::where('id', $data['scheme_id'])->update(['isdelete'=>1]);
                   return Response::json(array( 'success' => true,'data' => $client,'message'=>'Scheme Deleted Successfully.'), 200); 
               }
           } catch (\Exception $e) {
             
               return $e->getMessage();
           }
       }

       public function getschemeReport(Request $request)
       {
           try {
            ini_set('max_execution_time', 1800);
            // $response = Http::get('https://www.amfiindia.com/spages/NAVAll.txt?t=17122023114157');
            // dd($response);
            //    return response()->json(['data'=>json_decode($response->body())]);
            $file="https://www.amfiindia.com/spages/NAVAll.txt?t=17122023114157";
            $doc=file_get_contents($file);

            $line=explode("\n",$doc);
            $sub = array_slice( $line, 4, null, true);
            $fund_id=0;
            foreach($sub as $k=>$v){
                if(trim($v[1]) != '')
                { 
                    $check = explode(';',$v);
                    if(count($check)==1)
                    {
                        $fm = FundMaster::firstOrNew(array('name' => $check[0]));
                        $fm->name = $check[0];
                        $fm->save();
                        $fund_id=$fm->id;
                        echo '<br>Name: '.$check[0].$fund_id; 
                    }
                    else{
                        
                        $plan=FundPlan::create([
                            'fund_id'=>$fund_id,
                            'scheme_code'=>$check[0] ??'-',
                            'isin_code'=>$check[1] ??'-',
                            'isin_reinvestment'=>$check[2] ?? '-',
                            'scheme_name'=>$check[3] ??'-',
                            'nav'=>$check[4] ??'-',
                            'plan_date'=>date('Y-m-d', strtotime($check[5])) ??'-',
                            'response'=>$v,
                        ]);
                        echo '<br>Fundid: '.$fund_id.'- Data'.$check[0].$check[1].$check[2].$check[3].$check[4].$check[5];
                    }
                }
            }
              return  $line;
           } catch (\Exception $e) {
             
               return $e->getMessage();
           }
       }
   
}
