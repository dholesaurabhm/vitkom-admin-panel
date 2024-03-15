<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Input, Redirect,Response,Hash,Storage,DB,Mail,URL,Session; 
use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use App\Models\InsurerMaster;
use App\Models\SchemeMaster;
use App\Models\FundMaster;
use App\Models\FundPlan;
use App\Models\FundISIN;
use App\Models\MutualFund;
use App\Models\TransactionFile;
use App\Models\TransactionReport;
use App\Imports\ImportTransaction;
use Maatwebsite\Excel\Facades\Excel;

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
               // 'end_date'=>'required',
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
                $user->end_date=$data['end_date'] ??'';
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
                //'end_date'=>'required',
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
                User::where('id',$id)->update(['name'=>$data['name'],'email'=>$data['email'],'password'=>Hash::make($data['password']),'normal_password'=>$data['password'],'joining_date'=>$data['joining_date'],'end_date'=>$data['end_date'] ??'','status'=>$data['status']]);
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
              //  'aadhar_no'=>'required',
                'dob'=>'required',
              //  'gender'=>'required'
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
                $client->aadhar_no=$data['aadhar_no'] ??'';
                $client->dob=$data['dob'];
                $client->gender=$data['gender'] ?? '';
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
               // 'aadhar_no'=>'required',
                'dob'=>'required',
               // 'gender'=>'required',
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
                Client::where('id',$id)->update(['name'=>$data['name'],'email'=>$data['email'],'mobile_no'=>$data['mobile_no'],'pan_no'=>$data['pan_no'],'aadhar_no'=>$data['aadhar_no'] ??'','dob'=>$data['dob'],'gender'=>$data['gender'] ??'']);
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
            $query=Client::where('isdelete',0);
            if($request->search['value'])
            {
                $query=$query->where('name','like', '%' . $request->search['value'] . '%');
                $query=$query->orwhere('mobile_no','like', '%' . $request->search['value'] . '%');
                $query=$query->orwhere('email','like', '%' . $request->search['value'] . '%');
            }
            $count=$query->count();
            $list=$query->skip($data['start'])->take($data['length'])->get();
           
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
                $list=Client::select('id','name','email','mobile_no');
                if(isset($data['search']))
                {
                    $list=$list->where('name','like', '%' . $data['search'] . '%');
                }
                if(isset($data['limit']))
                {
                    $list=$list->take($data['limit']);
                }
                $list=$list->get();
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
            ini_set('max_execution_time', 72000);
            $current_timestamp =isset($request->start_date)? date('dmYHis',strtotime($request->start_date)): date('dmYHis');
            $file="https://www.amfiindia.com/spages/NAVAll.txt?t=".$current_timestamp;
            $doc=file_get_contents($file);

            $line=explode("\n",$doc);
            $sub = array_slice( $line, 1, null, true);
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
                        $plan = FundPlan::firstOrNew(array('isin_code' => $check[1]));
                        $plan->fund_id = $fund_id;
                        $plan->scheme_code = $check[0] ??'-';
                        $plan->isin_code = $check[1] ??'-';
                        $plan->isin_reinvestment = $check[2] ?? '-';
                        $plan->scheme_name =$check[3] ??'-';
                        $plan->nav = $check[4] ??'-';
                        $plan->plan_date = date('Y-m-d', strtotime($check[5])) ??'-';
                        $plan->response = $v;
                        $plan->save();
                        // $plan=FundPlan::create([
                        //     'fund_id'=>$fund_id,
                        //     'scheme_code'=>$check[0] ??'-',
                        //     'isin_code'=>$check[1] ??'-',
                        //     'isin_reinvestment'=>$check[2] ?? '-',
                        //     'scheme_name'=>$check[3] ??'-',
                        //     'nav'=>$check[4] ??'-',
                        //     'plan_date'=>date('Y-m-d', strtotime($check[5])) ??'-',
                        //     'response'=>$v,
                        // ]);
                        $isin=FundISIN::create([
                            'isin'=>$check[1] ??'-',
                            'nav'=>$check[4] ??'-',
                            'plan_date'=>date('Y-m-d', strtotime($check[5])) ??'-',
                            'response'=>$v,
                        ]);
                       
                    }
                }
            }
              return  $line;
           } catch (\Exception $e) {
             
               return $e->getMessage();
           }
       }



         /*Mutual Fund Functions */

         public function addmutual_fund(Request $request)
         {
             try {
                 $data=$request->all();
                 $rules = array(
                     'client_id'=>'required',
                     'amc_id'=>'required',
                     'scheme_name'=>'required',
                     'scheme_id'=>'required',
                     'isin'=>'required',
                     'folio_no'=>'required',
                     'plan'=>'required',
                   //  'purchase_date'=>'required',
                     'nav'=>'required',
                     'invested_amount'=>'required',
                     'current_unit'=>'required',
                     'current_value'=>'required',
                     'current_nav'=>'required',
                     'profit_loss'=>'required'
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
                     $insm=new MutualFund();
                     $insm->client_id=$data['client_id'];
                     $insm->amc_id=$data['amc_id'];
                     $insm->scheme_name=$data['scheme_name'];
                     $insm->scheme_id=$data['scheme_id'];
                     $insm->isin=$data['isin'];
                     $insm->folio_no=$data['folio_no'];
                     $insm->plan=$data['plan'];
                    // $insm->purchase_date=$data['purchase_date'];
                     $insm->nav=$data['nav'];
                     $insm->invested_amount=$data['invested_amount'];
                     $insm->current_unit=$data['current_unit'];
                     $insm->current_value=$data['current_value'];
                     $insm->current_nav=$data['current_nav'];
                     $insm->profit_loss=$data['profit_loss'];
                     $insm->isdelete=0;
                     $insm->save();
                     return Response::json(array( 'success' => true,'data' => $insm,'message'=>'Mutual Fund Added Successfully.'), 200); 
                 }
               
               } catch (\Exception $e) {
               
                   return $e->getMessage();
               }
         }
     
         public function updatemutual_fund(Request $request, $id)
         {
             
             try {
                 $data=$request->all();
                 $rules = array(
                    'client_id'=>'required',
                    'amc_id'=>'required',
                    'scheme_name'=>'required',
                    'scheme_id'=>'required',
                    'isin'=>'required',
                    'folio_no'=>'required',
                    'plan'=>'required',
                  //  'purchase_date'=>'required',
                    'nav'=>'required',
                    'invested_amount'=>'required',
                    'current_unit'=>'required',
                    'current_value'=>'required',
                    'current_nav'=>'required',
                    'profit_loss'=>'required'
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
                    MutualFund::where('id',$id)->update(['client_id'=>$data['client_id'],'amc_id'=>$data['amc_id'],'scheme_id'=>$data['scheme_id'],'scheme_name'=>$data['scheme_name'],'isin'=>$data['isin'],'folio_no'=>$data['folio_no'],'plan'=>$data['plan'],'nav'=>$data['nav'],'invested_amount'=>$data['invested_amount'],'current_unit'=>$data['current_unit'],'current_value'=>$data['current_value'],'current_nav'=>$data['current_nav'],'profit_loss'=>$data['profit_loss']]);
                  return Response::json(array( 'success' => true,'data' => $data,'message'=>'Mutual Fund Updated Successfully.'), 200); 
                 }
               
               } catch (\Exception $e) {
               
                   return $e->getMessage();
               }
         }
     
         public function listmutual_fund(Request $request)
         {
             try {
                $data=$request->all();
                $query=MutualFund::where('client_id',$data['client_id'])->where('isdelete',0);
                if($request->search['value'])
                {
                    $query=$query->where('scheme_name','like', '%' . $request->search['value'] . '%');
                    $query=$query->orwhere('folio_no','like', '%' . $request->search['value'] . '%');
                    $query=$query->orwhere('plan','like', '%' . $request->search['value'] . '%');
                }
                $count=$query->count();
                $list=$query->skip($data['start'])->take($data['length'])->get();
               
                return response()->json(['recordsTotal' => $count,'recordsFiltered' =>$count ,'data'=>$list]);
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }
     
     
         public function getmutual_fund(Request $request)
         {
             try {
                 $data=$request->all();
                 $list=MutualFund::select('mutual_funds.id','client_id','amc_id','scheme_name','scheme_id','isin','plan','folio_no','purchase_date','nav','invested_amount','current_unit','current_value','current_nav','profit_loss')->leftJoin('fund_master', 'fund_master.id', '=', 'mutual_funds.amc_id')->where('mutual_funds.isdelete',0);
                 
                 if(isset($data['mutual_id']))
                 {
                    $list=$list->where('mutual_funds.id',$data['mutual_id'])->first();
                    $report=TransactionReport::select(DB::raw('replace(replace(trxn_type, 1, "Pruchase"),2,"Redemption")as report_type'),'trxn_date','nav','invest_amount','no_units','stamp_duty','balance_unit')->where('client_id',$list->client_id)->where('isin',$list->isin)->where('folio_no',$list->folio_no)->where('isdelete',0)->get();
                    $list['report']=$report;
                 }
                 else{
                    $list=$list->get();
                 }
               
                 return Response::json(array( 'success' => true,'data' => $list,'message'=>'Mutual Fund List.'), 200); 
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }
     
         public function deletemutual_fund(Request $request)
         {
             try {
                 $data=$request->all();
                 $rules = array(
                     'mutual_id'=>'required'
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
                   $client= MutualFund::where('id', $data['mutual_id'])->update(['isdelete'=>1]);
                     return Response::json(array( 'success' => true,'data' => $client,'message'=>'Mutual Fund Deleted Successfully.'), 200); 
                 }
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }
  
         public function getamc(Request $request)
         {
             try {
                 $data=$request->all();
                 $list=FundMaster::select('id','name')->where('isdelete',0)->where('name', 'not like', "%open%");
                 
                 if(isset($data['amc_id']))
                 {
                    $list=$list->where('id',$data['amc_id'])->first();
                 }
                 else{
                    $list=$list->get();
                 }
               
                 return Response::json(array( 'success' => true,'data' => $list,'message'=>'AMC List.'), 200); 
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }

         public function getamc_plan(Request $request)
         {
             try {
                 $data=$request->all();
                 $list=FundPlan::select('id','fund_id','scheme_code','isin_code','isin_reinvestment','scheme_name','nav','plan_date')->where('isdelete',0);
                 
                 if(isset($data['plan_id']))
                 {
                    $list=$list->where('id',$data['plan_id'])->first();
                 }else if(isset($data['scheme_id']) && isset($data['purchase_date']))
                 {
                    $list=$list->where('id',$data['scheme_id'])->orderBy('updated_at', 'desc')->first();
                 }
                 else{
                    $list=$list->where('fund_id',$data['amc_id'])->orderBy('updated_at', 'desc')->groupBy('scheme_name')->get();
                 }
               
                 return Response::json(array( 'success' => true,'data' => $list,'message'=>'AMC Plans.'), 200); 
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }
   
         
         public function importTransaction(Request $request)
         {
             try {
                ini_set('max_execution_time', 72000);
                $data=$request->all();
                $rules = array(
                    'user_id'=>'required',
                    'file_type'=>'required',
                    'transaction_file'=>'required|mimes:csv'
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
                    if ($request->hasFile('transaction_file')){
                       $file = $request->file('transaction_file');
                       $extension = $file->getClientOriginalExtension(); // you can also use file name
                       $fileName = $data['file_type'].'_'.time().'.'.$extension;
                       $path = public_path().'/transactionfiles';
                       $uplaod = $file->move($path,$fileName);
                    }
                    $trans=new TransactionFile();
                    $trans->user_id=$data['user_id'];
                    $trans->file_type=$data['file_type'];
                    $trans->file_path='transactionfiles/'.$fileName;
                    $trans->isdelete=0;
                    $trans->save();
                    $list=Excel::toArray(new ImportTransaction, $path.'/'.$fileName);
                    
                    if($data['file_type']=='1')
                    {
                      $report=$this->savePurchase($trans->id,$list[0]);
                    }else if($data['file_type']=='2'){
                        $report=$this->saveRedemption($trans->id,$list[0]);
                    }
                    return Response::json(array( 'success' => true,'data' => $report,'message'=>'Transaction File Uploaded Successfully.'), 200); 
                } 
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }


         public function savePurchase($id,$data)
         {
             try {
                $data=array_slice($data,1);
                 foreach($data as $k=>$v)
                 {
                    $client=Client::where('pan_no',$v[5])->first();
                    $pur=new TransactionReport();
                    $pur->trxn_type=1;
                    $pur->trxn_mode=$v[1] ?? '';
                    $pur->employee_name=$v[2] ??'';
                    $pur->group_name=$v[3] ??'';
                    $pur->client=$v[4] ??'';
                    $pur->client_id=$client !=null ? $client->id:'';
                    $pur->pan_no=$v[5]?? '';
                    $pur->type=$v[6]?? '';
                    $pur->trxn_date=date("Y-m-d", strtotime($v[7]));
                    $pur->folio_no=str_replace( '*', '', $v[8] )?? '';
                    $pur->scheme=$v[9]?? '';
                    $pur->nav=str_replace( ',', '', $v[10] );
                    $pur->no_units=str_replace( ',', '', $v[11] );
                    $pur->gross_amount=str_replace( ',', '', $v[12] );
                    $pur->stamp_duty=str_replace( ',', '', $v[13] );
                    $pur->broker_charge=str_replace( ',', '', $v[14] );
                    $pur->trxn_charge=str_replace( ',', '', $v[15] );
                    $pur->invest_amount=str_replace( ',', '', $v[16] );
                    $pur->balance_unit=str_replace( ',', '', $v[17] );
                    $pur->post_Date=date("Y-m-d", strtotime($v[18]));
                    $pur->tr_no=$v[19]?? '';
                    $pur->isin=$v[20]??'';
                    $pur->demat_account=substr($v[8], 0, 1) === '*' ? 'Yes':'No';
                    $pur->isdelete=0;
                    $pur->file_id=$id;
                    $pur->save();
                 }
                 $funds=TransactionReport::where('file_id',$id)->where('isdelete',0)->groupBy(['client_id','folio_no','isin'])->get();
                 foreach($funds as $k=>$v)
                 {
                    $amc=FundPlan::where('isin_code',$v->isin)->orderBy('updated_at', 'DESC')->first();
                    if($amc)
                    {
                        $insm = MutualFund::firstOrNew(array('client_id' => $v->client_id,'folio_no'=>$v->folio_no,'isin'=>$v->isin));
                        $insm->client_id=$v->client_id;
                        $insm->amc_id=$amc->fund_id;
                        $insm->scheme_name=$amc->scheme_name;
                        $insm->scheme_id=$amc->id;
                        $insm->isin=$amc->isin_code;
                        $insm->folio_no=$v->folio_no;
                        $insm->plan='SIP';
                        $insm->isdelete=0;
                        $insm->nav=$amc->nav;
                        $insm->current_nav=$amc->nav;
                        $insm->save();
                        $this->calculateFund($insm->id);
                    }
                 }
                 
                 return "Purchase Report Uploaded";
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }

         public function saveRedemption($id,$data)
         {
             try {
                $data=array_slice($data,1);
                 foreach($data as $k=>$v)
                 {
                    $client=Client::where('pan_no',$v[5])->first();
                    $pur=new TransactionReport();
                    $pur->trxn_type=2;
                    $pur->trxn_mode=$v[1]?? '';
                    $pur->employee_name=$v[2]?? '';
                    $pur->group_name=$v[3]?? '';
                    $pur->client=$v[4]?? '';
                    $pur->client_id=$client !=null ? $client->id:'';
                    $pur->pan_no=$v[5]?? '';
                    $pur->type=$v[6]?? '';
                    $pur->trxn_date=date("Y-m-d", strtotime($v[7]));
                    $pur->folio_no=str_replace( '*', '', $v[8] )?? '';
                    $pur->scheme=$v[9]?? '';
                    $pur->nav=str_replace( ',', '', $v[10] );
                    $pur->no_units=str_replace( ',', '', $v[11] );
                    $pur->exit_load=str_replace( ',', '', $v[12] );
                    $pur->stt=str_replace( ',', '', $v[13] );
                    $pur->tds=str_replace( ',', '', $v[14] );
                    $pur->broker_charge=str_replace( ',', '', $v[15] );
                    $pur->invest_amount=str_replace( ',', '', $v[16] );
                    $pur->post_Date=date("Y-m-d", strtotime($v[17]));
                    $pur->tr_no=$v[18]?? '';
                    $pur->isin=$v[19] ??'';
                    $pur->demat_account=substr($v[8], 0, 1) === '*' ? 'Yes':'No';
                    $pur->isdelete=0;
                    $pur->file_id=$id;
                    $pur->save();
                 }
                 $funds=TransactionReport::where('file_id',$id)->where('isdelete',0)->groupBy(['client_id','folio_no','isin'])->get();
                 foreach($funds as $k=>$v)
                 {
                    $amc=FundPlan::where('isin_code',$v->isin)->orderBy('updated_at', 'DESC')->first();
                    if($amc)
                    {
                        $insm = MutualFund::firstOrNew(array('client_id' => $v->client_id,'folio_no'=>$v->folio_no,'isin'=>$v->isin));
                        $insm->client_id=$v->client_id;
                        $insm->amc_id=$amc->fund_id;
                        $insm->scheme_name=$amc->scheme_name;
                        $insm->scheme_id=$amc->id;
                        $insm->isin=$amc->isin_code;
                        $insm->folio_no=$v->folio_no;
                        $insm->plan='SIP';
                        $insm->isdelete=0;
                        $insm->nav=$amc->nav;
                        $insm->current_nav=$amc->nav;
                        $insm->save();
                        $this->calculateFund($insm->id);
                    }
                 }
                 return "Done";
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }

         public function calculateFund($id)
         {
             try {
              
                $fund=MutualFund::where('id',$id)->where('isdelete',0)->first();
                $report=TransactionReport::where('client_id',$fund->client_id)->where('isin',$fund->isin)->where('folio_no',$fund->folio_no)->where('isdelete',0)->get();
                $invested_amount=$current_unit=$current_value=$profit_loss=0;
                foreach($report as $k=>$v)
                 {
                    if($v->trxn_type==1)
                    {
                     
                      $invested_amount+=$v->invest_amount;
                      $current_unit+=$v->no_units;
                      $current_value+=$fund->nav * $v->no_units;
                      $profit_loss+=$current_value -$invested_amount;
                    }else if($v->trxn_type==2)
                    {
                        $invested_amount-=$v->invest_amount;
                        $current_unit-=$v->no_units;
                        $current_value-=$fund->nav * $v->no_units;
                        $profit_loss+=$current_value -$invested_amount;
                    }
                 }
                 $updatefund=MutualFund::where('id',$id)->update(['invested_amount'=>$invested_amount,'current_unit'=>$current_unit,'current_value'=>$current_value,'profit_loss'=>$profit_loss]);
               
                 return $updatefund;

            } catch (\Exception $e) {
               
                return $e->getMessage();
            }
        }


         public function listImportTransaction(Request $request)
         {
             try {
                $data=$request->all();
                $query=TransactionFile::select('transaction_files.id','users.name as user_name','file_path',DB::raw('DATE_FORMAT(transaction_files.created_at, "%d-%m-%Y %h:%i %p")as trans_date'),DB::raw('replace(replace(file_type, 1, "Pruchase"),2,"Redemption")as report_type'))->leftJoin('users', 'users.id', '=', 'transaction_files.user_id')->where('transaction_files.isdelete',0)->orderBy('transaction_files.created_at','DESC');
                // if($request->search['value'])
                // {
                //     $query=$query->where('scheme_name','like', '%' . $request->search['value'] . '%');
                //     $query=$query->orwhere('folio_no','like', '%' . $request->search['value'] . '%');
                //     $query=$query->orwhere('plan','like', '%' . $request->search['value'] . '%');
                // }
                $count=$query->count();
                $list=$query->skip($data['start'])->take($data['length'])->get();
               
                return response()->json(['recordsTotal' => $count,'recordsFiltered' =>$count ,'data'=>$list]);
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }

         public function deleteTransaction(Request $request)
         {
             try {
                 $data=$request->all();
                 $rules = array(
                     'transaction_id'=>'required'
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
                   $trans= TransactionFile::where('id', $data['transaction_id'])->update(['isdelete'=>1]);
                   $report=TransactionReport::where('file_id',$data['transaction_id'])->update(['isdelete'=>1]);
                     return Response::json(array( 'success' => true,'data' => $trans,'message'=>'Transaction File Deleted Successfully.'), 200); 
                 }
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }

}
