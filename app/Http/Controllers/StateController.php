<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Input, Redirect,Response,Hash,Storage,DB,Mail,URL,Session; 
use App\Models\Country;
use App\Models\State;

class StateController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data=$request->all();
            $rules = array(
                'user_id'=>'required',
                'state_date'=>'required',
                'short_name'=>'required',
                'country_id'=>'required',
                'name'=>'required',
                'code'=>'required',
                'description'=>'required',
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
                State::create($request->all());
                return Response::json(array( 'success' => true,'data' => $data,'message'=>'State Added Successfully.'), 200); 
            }
          
          } catch (\Exception $e) {
          
              return $e->getMessage();
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data=$request->all();
            $rules = array(
                'user_id'=>'required',
                'state_date'=>'required',
                'short_name'=>'required',
                'country_id'=>'required',
                'name'=>'required',
                'code'=>'required',
                'description'=>'required',
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
                State::where('id',$id)->update(['name'=>$data['name'],'state_date'=>$data['state_date'],'short_name'=>$data['short_name'],'code'=>$data['code'],'description'=>$data['description'],'country_id'=>$data['country_id']]);
                return Response::json(array( 'success' => true,'data' => $data,'message'=>'State Updated Successfully.'), 200); 
            }
          
          } catch (\Exception $e) {
          
              return $e->getMessage();
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
    }

    

    public function liststate(Request $request)
    {
        try {
            $data=$request->all();
            $list=State::select('states.id','states.short_name','states.name','states.code','states.country_id','countries.name as country_name','states.description','states.state_date')->leftJoin('countries', 'countries.id', '=', 'states.country_id')->get();
            $count=State::count();
            return response()->json(['recordsTotal' => $count,'recordsFiltered' =>$count ,'data'=>$list]);

        } catch (\Exception $e) {
          
            return $e->getMessage();
        }
    }


    public function getstate(Request $request)
    {
        try {
            $data=$request->all();
            if(isset($data['state_id']))
            {
                $list=State::select('states.id','states.short_name','states.name','states.code','states.country_id','countries.name as country_name','states.description','states.state_date')->leftJoin('countries', 'countries.id', '=', 'states.country_id')->where('states.id',$data['state_id'])->first();
            }
            else{
                $list=State::select('states.id','states.short_name','states.name','states.code','states.country_id','countries.name as country_name','states.description','states.state_date')->leftJoin('countries', 'countries.id', '=', 'states.country_id')->get();
            }
          
            return Response::json(array( 'success' => true,'data' => $list,'message'=>'State List.'), 200); 
        } catch (\Exception $e) {
          
            return $e->getMessage();
        }
    }

    
    public function delete(Request $request)
    {
        try {
            $data=$request->all();
            $rules = array(
                'user_id'=>'required',
                'state_id'=>'required'
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
              $country= State::where('id', $data['state_id'])->delete();
                return Response::json(array( 'success' => true,'data' => $country,'message'=>'State Deleted Successfully.'), 200); 
            }
        } catch (\Exception $e) {
          
            return $e->getMessage();
        }
    }
    
}
