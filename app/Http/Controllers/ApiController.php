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
use App\Models\LifeReport;
use App\Models\HealthReport;
use App\Models\BondReport;
use App\Models\BondMaster;
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
            $list=User::where('isdelete',0)->get();
            $count=User::where('isdelete',0)->count();
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
              $user= User::where('id', $data['user_id'])->update(['isdelete'=>1,'status'=>0]);
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
               $query=SchemeMaster::select('scheme_master.id','scheme_type','insurer_id','scheme_name','nav','insurer_master.company_name',DB::raw('replace(replace(replace(insurance_type, 1, "LIFE INSURANCE"),2,"HEALTH INSURANCE"),3,"GENERAL INSURANCE")as insurance_name'))->leftJoin('insurer_master', 'insurer_master.id', '=', 'scheme_master.insurer_id')->where('scheme_master.isdelete',0);
            if($request->search['value'])
            {
                $query=$query->where('scheme_master.scheme_name','like', '%' . $request->search['value'] . '%');
                $query=$query->orwhere('insurer_master.company_name','like', '%' . $request->search['value'] . '%');
            }
            $count=$query->count();
            $list=$query->orderBy('scheme_master.created_at','DESC')->skip($data['start'])->take($data['length'])->get();

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
                $query=MutualFund::select('id','client_id','amc_id','scheme_name','scheme_id','isin','folio_no','plan','nav',DB::raw('FLOOR(invested_amount)as invested_amount'),'current_unit',DB::raw('FLOOR(current_value)as current_value'),'current_nav',DB::raw('FLOOR(profit_loss)as profit_loss'),)->where('client_id',$data['client_id'])->where('isdelete',0);
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
                    $report=TransactionReport::select(DB::raw('replace(replace(trxn_type, 1, "Purchase"),2,"Redemption")as report_type'),DB::raw('DATE_FORMAT(trxn_date, "%d-%m-%Y")as trasaction_date'),'nav','invest_amount','no_units','stamp_duty','balance_unit')->where('client_id',$list->client_id)->where('isin',$list->isin)->where('folio_no',$list->folio_no)->where('isdelete',0)->groupBy('tr_no')->orderBy('trxn_date','ASC')->get();
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
                'mimes'=>'Only CSV File is allowed to Upload'
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
                    
                    if($data['file_type']=='1')  //Purchase
                    {
                      $report=$this->savePurchase($trans->id,$list[0]);
                    }else if($data['file_type']=='2'){  //Redemption
                        $report=$this->saveRedemption($trans->id,$list[0]);
                    }
                    else if($data['file_type']=='3'){  // Life
                        $report=$this->saveLife($trans->id,$list[0]);
                    }
                    else if($data['file_type']=='4'){  // Health
                        $report=$this->saveHealth($trans->id,$list[0]);
                    }
                    else if($data['file_type']=='5'){  // Bond
                        $report=$this->saveBond($trans->id,$list[0]);
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

         public function saveLife($id,$data)
         {
             try {
                $finaldata=array_slice($data,1);
                 foreach($finaldata as $k=>$v)
                 {
                    $client=Client::where('pan_no',$v[24])->first();
                   $check_company=InsurerMaster::where('insurance_type',1)->where('company_name',$v[3])->first();
                   $plan_id='';
                   if($check_company) //If Company is present
                   {
                     $check_scheme=SchemeMaster::where('insurer_id',$check_company->id)->where('scheme_name',$v[4])->first();
                     if($check_scheme) //Check scheme is present
                     {
                        $plan_id=$check_scheme->id;
                     }
                     else{
                        $plan=SchemeMaster::create(['scheme_type'=>1,'insurer_id'=>$insurer->id,'scheme_name'=>$v[4],'nav'=>1]);
                    $plan_id=$plan->id;
                     }
                   }
                   else{  //If Company Name is not Present
                    $insurer = InsurerMaster::create(['insurance_type' => 1,'company_name' => $v[3], 'isdelete' => 0 ]);
                    $plan=SchemeMaster::create(['scheme_type'=>1,'insurer_id'=>$insurer->id,'scheme_name'=>$v[4],'nav'=>1]);
                    $plan_id=$plan->id;
                   }
                   
                    $pur=new LifeReport();
                    $pur->client_id=$client !=null ? $client->id:'';
                    $pur->tar_no=$v[1] ?? '';
                    $pur->plan_type=$v[2] ?? '';
                    $pur->company_name=$v[3] ??'';
                    $pur->plan_name=$v[4] ??'';
                    $pur->plan_id=$plan_id;
                    $pur->proposer_name=$v[5]?? '';
                    $pur->application_no=$v[6]?? '';
                    $pur->policy_no=$v[7]?? '';
                    $pur->sum_assured=str_replace( ',', '', $v[8] ?? 0 );
                    $pur->gross_premium=str_replace( ',', '', $v[9]?? 0 );
                    $pur->net_premium=str_replace( ',', '', $v[10]?? 0 );
                    $pur->endorsement_premium=str_replace( ',', '', $v[11]?? 0 );
                    $pur->total_permium=str_replace( ',', '', $v[12]?? 0 );
                    $pur->permium_term=str_replace( ',', '', $v[13]?? 0 );
                    $pur->policy_term=str_replace( ',', '', $v[14]?? 0 );
                    $pur->mode_payment=$v[15] ?? '';
                    $pur->login_date=date("Y-m-d", strtotime($v[16]));
                    $pur->issue_date=date("Y-m-d", strtotime($v[17]));
                    $pur->risk_date=date("Y-m-d", strtotime($v[18]));
                    $pur->post_date=date("Y-m-d", strtotime($v[19]));
                    $pur->status=$v[20]??'';
                    $pur->reason=$v[21]??'';
                    $pur->remark=$v[22]??'';
                    $pur->mode=$v[23]??'';
                    $pur->pan_no=$v[24]??'';
                    $pur->isdelete=0;
                    $pur->file_id=$id;
                    $pur->save();
                 }
                 return "Life Report Uploaded";
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }

         public function saveHealth($id,$data)
         {
             try {
                $finaldata=array_slice($data,1);
                 foreach($finaldata as $k=>$v)
                 {
                    $client=Client::where('pan_no',$v[25])->first();
                   $check_company=InsurerMaster::where('company_name',$v[4])->first();
                   $plan_id='';
                   if($check_company) //If Company is present
                   {
                     $check_scheme=SchemeMaster::where('insurer_id',$check_company->id)->where('scheme_name',$v[5])->first();
                     if($check_scheme) //Check scheme is present
                     {
                        $plan_id=$check_scheme->id;
                     }
                     else{
                        $plan=SchemeMaster::create(['scheme_type'=>2,'insurer_id'=>$insurer->id,'scheme_name'=>$v[5],'nav'=>1]);
                    $plan_id=$plan->id;
                     }
                   }
                   else{  //If Company Name is not Present
                    $insurer = InsurerMaster::create(['insurance_type' => 2,'company_name' => $v[4], 'isdelete' => 0 ]);
                    $plan=SchemeMaster::create(['scheme_type'=>2,'insurer_id'=>$insurer->id,'scheme_name'=>$v[5],'nav'=>1]);
                    $plan_id=$plan->id;
                   }
                   
                    $pur=new HealthReport();
                    $pur->client_id=$client !=null ? $client->id:'';
                    $pur->tar_no=$v[1] ?? '';
                    $pur->transaction_type=$v[2] ?? '';
                    $pur->plan_type=$v[3] ?? '';
                    $pur->company_name=$v[4] ??'';
                    $pur->plan_name=$v[5] ??'';
                    $pur->plan_id=$plan_id;
                    $pur->proposer_name=$v[6]?? '';
                    $pur->application_no=$v[7]?? '';
                    $pur->policy_no=$v[8]?? '';
                    $pur->sum_assured=str_replace( ',', '', $v[9] ?? 0 );
                    $pur->gross_premium=str_replace( ',', '', $v[10]?? 0 );
                    $pur->net_premium=str_replace( ',', '', $v[11]?? 0 );
                    $pur->endorsement_premium=str_replace( ',', '', $v[12]?? 0 );
                    $pur->total_permium=str_replace( ',', '', $v[13]?? 0 );
                    $pur->login_date=date("Y-m-d", strtotime($v[14]));
                    $pur->issue_date=date("Y-m-d", strtotime($v[15]));
                    $pur->risk_date=date("Y-m-d", strtotime($v[16]));
                    $pur->risk_exp_date=date("Y-m-d", strtotime($v[17]));
                    $pur->post_date=date("Y-m-d", strtotime($v[18]));
                    $pur->status=$v[19]??'';
                    $pur->reason=$v[20]??'';
                    $pur->remark=$v[21]??'';
                    $pur->policy_copy=$v[22]?? '';
                    $pur->mode=$v[23]??'';
                    $pur->vehicle_no=$v[24]?? '';
                    $pur->pan_no=$v[25]??'';
                    $pur->isdelete=0;
                    $pur->file_id=$id;
                    $pur->save();
                 }
                 return "Health Report Uploaded";
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }

         public function saveBond($id,$data)
         {
             try {
                $finaldata=array_slice($data,1);
                 foreach($finaldata as $k=>$v)
                 {
                    $client=Client::where('pan_no',$v[9])->first();
                    $pur=new BondReport();
                    $pur->client_id=$client !=null ? $client->id:'';
                    $pur->date_from=$v[0] ?? '';
                    $pur->client_code=$v[1] ?? '';
                    $pur->client_name=$v[2] ??'';
                    $pur->scrip_name=$v[3] ??'';
                    $pur->bond_name=$v[4]?? '';
                    $pur->tot_purchase=$v[5]?? '';
                    $pur->tot_sale=$v[6]?? '';
                    $pur->platform=$v[7]?? '';
                    $pur->status=$v[8]??'';
                    $pur->pan_no=$v[9]??'';
                    $pur->isdelete=0;
                    $pur->file_id=$id;
                    $pur->save();
                 }
                 $bonds=BondReport::where('file_id',$id)->where('isdelete',0)->groupBy(['client_id','scrip_name','client_code'])->get();
                 foreach($bonds as $k=>$v)
                 {
                        $bm = BondMaster::firstOrNew(array('client_id' => $v->client_id,'scrip_name'=>$v->scrip_name,'client_code'=>$v->client_code));
                        $bm->client_id=$v->client_id;
                        $bm->start_date=$v->date_from;
                        $bm->client_code=$v->client_code;
                        $bm->client_name=$v->client_name;
                        $bm->scrip_name=$v->scrip_name;
                        $bm->bond_name=$v->bond_name;
                        $bm->total=0;
                        $bm->platform=$v->platform;
                        $bm->isdelete=0;
                        $bm->save();
                        $this->calculateBond($bm->id);
                    
                 }

                 return "Bond Report Uploaded";
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }

         public function calculateBond($id)
         {
            try {
                
                $bond=BondMaster::where('id',$id)->where('isdelete',0)->first();
                $report=BondReport::where('client_id',$bond->client_id)->where('scrip_name',$bond->scrip_name)->where('client_code',$bond->client_code)->where('isdelete',0)->orderBy('date_from','ASC')->get();
                $total=0;
                foreach($report as $k=>$v)
                 {
                    if($v->status=='BUY')
                    {
                      $total+=$v->tot_purchase;
                    }else if($v->status=='SELL')
                    {
                        $total-=$v->tot_sale;
                    }
                 }
                 $updatebond=BondMaster::where('id',$id)->update(['total'=>$total]);

                return "Bond Report Uploaded";
            } catch (\Exception $e) {
            
                return $e->getMessage();
            }
         }

         public function calculateFund($id)
         {
             try {
              
                $fund=MutualFund::where('id',$id)->where('isdelete',0)->first();
                $report=TransactionReport::select('id','trxn_type','invest_amount',DB::raw('cast(no_units AS DECIMAL(16,4))as no_units'),'trxn_date','nav')->where('client_id',$fund->client_id)->where('isin',$fund->isin)->where('folio_no',$fund->folio_no)->where('isdelete',0)->groupBy('tr_no')->orderBy('trxn_date','ASC')->get();
                $investedAmount=$current_unit=$current_value=$profit_loss=0;
                $unitsBought = []; // Associative array to store units bought with their purchase prices
                // foreach($report as $k=>$v)
                //  {
                //     if($v->trxn_type==1)
                //     {
                     
                //       $invested_amount+=(float)$v->invest_amount;
                //       $current_unit+=(float)$v->no_units;
                //       $current_value+=(float)$fund->nav *(float)$v->no_units;
                //       $profit_loss+=(float)$current_value -(float)$invested_amount;
                //     }else if($v->trxn_type==2)
                //     {
                //         $invested_amount-=(float)$v->invest_amount;
                //         $current_unit-=(float)$v->no_units;
                //         $current_value-=(float)$fund->nav * (float)$v->no_units;
                //         $profit_loss+=(float)$current_value -(float)$invested_amount;
                //     }
                //     $current_unit=round($current_unit,4);
                //  }

                foreach ($report as $transaction) {
                    if ($transaction['trxn_type'] === "2") {
                        $unitsSold = $transaction['no_units'];
                        foreach ($unitsBought as $priceAtPurchase => &$units) {
                            if ($units >= $unitsSold) {
                                $unitsSold = number_format($unitsSold, 2, '.', '');
                                $foo = $unitsSold * $priceAtPurchase;
                                $investedAmount -= number_format($foo, 2, '.', '');
                                if($investedAmount<0) { $investedAmount = '0.00'; }
                                $units -= $unitsSold;
                                $units = number_format($units, 2, '.', '');
                                if($units<0) { $units = '0.00'; }
                                break;
                            } else {
                                $units = number_format($units, 2, '.', '');
                                $foo = $units * $priceAtPurchase;
                                $investedAmount -=number_format($foo, 2, '.', '');
                                $investedAmount = number_format($investedAmount, 2, '.', '');
                                if($investedAmount<0) { $investedAmount = '0.00'; }
                                $unitsSold -= $units;
                                $unitsSold = number_format($unitsSold, 2, '.', '');
                                $units = 0;
                            }
                        }
                        $current_unit-=(float)$transaction->no_units;
                        $current_value-=(float)$fund->nav * (float)$transaction->no_units;
                        $profit_loss-=(float)$current_value +(float)$investedAmount;
                    } elseif ($transaction['trxn_type'] === "1") {
                        $unitsBought[$transaction['nav']] = isset($unitsBought[$transaction['nav']]) ? $unitsBought[$transaction['nav']] + $transaction['no_units'] : $transaction['no_units'];
                        $investedAmount += $transaction['invest_amount'] ;
                        $current_unit+=(float)$transaction->no_units;
                        $current_value+=(float)$fund->nav * (float)$transaction->no_units;
                        $profit_loss+=(float)$current_value -(float)$investedAmount;
                    }
                    $current_unit=round($current_unit,4);
                }

                $updatefund=MutualFund::where('id',$id)->update(['invested_amount'=>$investedAmount,'current_unit'=>$current_unit,'current_value'=>$current_value,'profit_loss'=>$profit_loss]);
               
                 return $updatefund;

            } catch (\Exception $e) {
               
                return $e->getMessage();
            }
        }


         public function listImportTransaction(Request $request)
         {
             try {
                $data=$request->all();
                $query=TransactionFile::select('transaction_files.id','users.name as user_name','file_path',DB::raw('DATE_FORMAT(transaction_files.created_at, "%d-%m-%Y %h:%i %p")as trans_date'),DB::raw('replace(replace(replace(replace(replace(file_type, 1, "Pruchase"),2,"Redemption"),3,"Life Insurance"),4,"Health Insurance"),5,"Bonds")as report_type'))->leftJoin('users', 'users.id', '=', 'transaction_files.user_id')->where('transaction_files.isdelete',0)->orderBy('transaction_files.created_at','DESC');
                if($request->search['value'])
                {
                    $query=$query->where('users.name','like', '%' . $request->search['value'] . '%');
                  //  $query=$query->orwhere('report_type','like', '%' . $request->search['value'] . '%');
                }
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
                    $tran_report=TransactionFile::where('id', $data['transaction_id'])->first();
                   $trans= TransactionFile::where('id', $data['transaction_id'])->update(['isdelete'=>1]);
                   if( $tran_report->file_type==1 || $tran_report->file_type==2)
                   {
                    $report=TransactionReport::where('file_id',$data['transaction_id'])->update(['isdelete'=>1]);
                    $funds=TransactionReport::where('file_id',$data['transaction_id'])->where('isdelete',1)->groupBy(['client_id','folio_no','isin'])->get();
 
                    foreach($funds as $k=>$v)
                    {
                        $mutul=MutualFund::where('client_id',$v->client_id)->where('folio_no',$v->folio_no)->where('isin',$v->isin)->first();
                        if($mutul)
                        {
                            $this->calculateFund($mutul->id);
                        }
                    }
                   }
                   else if($tran_report->file_type==3)
                   {
                    $report=LifeReport::where('file_id',$data['transaction_id'])->update(['isdelete'=>1]);
                   }
                   else if($tran_report->file_type==4)
                   {
                    $report=HealthReport::where('file_id',$data['transaction_id'])->update(['isdelete'=>1]);
                   }
                   else if($tran_report->file_type==4)
                   {
                    $report=HealthReport::where('file_id',$data['transaction_id'])->update(['isdelete'=>1]);
                   }
                  
                return Response::json(array( 'success' => true,'data' => $trans,'message'=>'Transaction File Deleted Successfully.'), 200); 
                 }
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }


         public function listlife_insurance(Request $request)
         {
             try {
                 $data=$request->all();
                 $query=LifeReport::select('*',DB::raw('DATE_FORMAT(issue_date, "%d-%m-%Y") as issue_date'),DB::raw('DATE_FORMAT(risk_date, "%d-%m-%Y") as risk_date'))->where('isdelete',0)->where('client_id',$data['client_id']);
                 if($request->search['value'])
                 {
                     $query=$query->where('company_name','like', '%' . $request->search['value'] . '%');
                     $query=$query->orwhere('plan_name','like', '%' . $request->search['value'] . '%');
                     $query=$query->orwhere('application_no','like', '%' . $request->search['value'] . '%');
                     $query=$query->orwhere('policy_no','like', '%' . $request->search['value'] . '%');
                 }
                 $count=$query->count();
                 $list=$query->skip($data['start'])->take($data['length'])->get();
                
                 return response()->json(['recordsTotal' => $count,'recordsFiltered' =>$count ,'data'=>$list]);
     
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }

         public function getlife_insurance(Request $request)
         {
             try {
                $data=$request->all();
                $query=LifeReport::where('isdelete',0);

                if(isset($data['life_id']))
                {
                   $list=$query->where('id',$data['life_id'])->first();
                }
                else{
                   $list=$list->get();
                }
              
                return Response::json(array( 'success' => true,'data' => $list,'message'=>'Life List.'), 200); 
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }


         public function listhealth_insurance(Request $request)
         {
             try {
                 $data=$request->all();
                 $query=HealthReport::select('*',DB::raw('DATE_FORMAT(issue_date, "%d-%m-%Y") as issue_date'),DB::raw('DATE_FORMAT(risk_exp_date, "%d-%m-%Y") as risk_exp_date'))->where('isdelete',0)->where('client_id',$data['client_id']);
                 if($request->search['value'])
                 {
                     $query=$query->where('company_name','like', '%' . $request->search['value'] . '%');
                     $query=$query->orwhere('plan_name','like', '%' . $request->search['value'] . '%');
                     $query=$query->orwhere('application_no','like', '%' . $request->search['value'] . '%');
                     $query=$query->orwhere('policy_no','like', '%' . $request->search['value'] . '%');
                 }
                 $count=$query->count();
                 $list=$query->groupBy('policy_no')->skip($data['start'])->take($data['length'])->get();
                
                 return response()->json(['recordsTotal' => $count,'recordsFiltered' =>$count ,'data'=>$list]);
     
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }

         public function gethealth_insurance(Request $request)
         {
             try {
                 $data=$request->all();
                 $query=HealthReport::where('isdelete',0);
           
                 if(isset($data['health_id']))
                 {
                    $list=$query->where('id',$data['health_id'])->first();
                 }
                 else{
                    $list=$list->get();
                 }
               
                 return Response::json(array( 'success' => true,'data' => $list,'message'=>'Health List.'), 200); 
     
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }

         public function listbonds(Request $request)
         {
             try {
                 $data=$request->all();
                 $query=BondMaster::where('isdelete',0)->where('client_id',$data['client_id']);
                 if($request->search['value'])
                 {
                     $query=$query->where('client_code','like', '%' . $request->search['value'] . '%');
                     $query=$query->orwhere('client_name','like', '%' . $request->search['value'] . '%');
                     $query=$query->orwhere('scrip_name','like', '%' . $request->search['value'] . '%');
                     $query=$query->orwhere('bond_name','like', '%' . $request->search['value'] . '%');
                     $query=$query->orwhere('platform','like', '%' . $request->search['value'] . '%');
                 }
                 $count=$query->count();
                 $list=$query->skip($data['start'])->take($data['length'])->get();
                
                 return response()->json(['recordsTotal' => $count,'recordsFiltered' =>$count ,'data'=>$list]);
     
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }


         public function getbonds(Request $request)
         {
             try {
                 $data=$request->all();
                 $query=BondMaster::where('isdelete',0);

                 if(isset($data['bond_id']))
                 {
                    $list=$query->where('id',$data['bond_id'])->first();
                    $report=BondReport::select('platform','date_from','tot_purchase','tot_sale','status')->where('client_id',$list->client_id)->where('client_code',$list->client_code)->where('scrip_name',$list->scrip_name)->where('isdelete',0)->orderBy('date_from','ASC')->get();
                    $list['report']=$report;
                 }
                 else{
                    $list=$list->get();
                 }
               
                 return Response::json(array( 'success' => true,'data' => $list,'message'=>'Bond Fund List.'), 200); 
     
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }



         public function getdashboard_count(Request $request)
         {
             try {
                 $data=$request->all();
                 
                 $final=[];
                 
                 $mutul=MutualFund::where('isdelete',0)->sum('current_value');
                 $bond=BondMaster::where('isdelete',0)->sum('total');
                 $mutul_client=MutualFund::where('isdelete',0)->where('current_unit','>','1')->count();
                 $bond_client=BondMaster::where('isdelete',0)->where('total','>','1')->count();
                 $final['active_client']=$bond_client +$mutul_client;
                 $final['sip']=TransactionReport::where('isdelete',0)->where('type','like','%SIP%')->groupBy('folio_no')->sum('invest_amount');
                 $final['redemption']=TransactionReport::where('isdelete',0)->whereMonth('trxn_date', Carbon::now()->month)->where('trxn_type',2)->sum('invest_amount');
                 $final['anum']=$mutul+$bond;
                 return Response::json(array( 'success' => true,'data' => $final,'message'=>'Dashboard Count'), 200); 
     
             } catch (\Exception $e) {
               
                 return $e->getMessage();
             }
         }

         public function recalculate()
         {
            $mutual=MutualFund::where('isdelete',0)->get();
            foreach ($mutual as $mu) {
                $this->calculateFund($mu->id);
            }
            return 'Done';
         }

}
