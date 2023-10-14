<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Input, Redirect,Response,Hash,Storage,DB,Mail,URL,Session; 
use App\Models\Continent;
class ContinentController extends Controller
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
    public function store(Request $request)
    {
        try {
            $data=$request->all();
            $rules = array(
                'user_id'=>'required',
                'continent_date'=>'required',
                'short_name'=>'required',
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
                Continent::create($request->all());
                return Response::json(array( 'success' => true,'data' => $data,'message'=>'Continent Added Successfully.'), 200); 
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
    public function update(Request $request, $id)
    {
        
        try {
            $data=$request->all();
            $rules = array(
                'user_id'=>'required',
                'continent_date'=>'required',
                'short_name'=>'required',
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
                Continent::where('id',$id)->update(['name'=>$data['name'],'continent_date'=>$data['continent_date'],'short_name'=>$data['short_name'],'code'=>$data['code'],'description'=>$data['description']]);
                return Response::json(array( 'success' => true,'data' => $data,'message'=>'Continent Updated Successfully.'), 200); 
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

    public function listContinent(Request $request)
    {
        try {
            $data=$request->all();
            $list=Continent::get();
            $count=Continent::count();
            return response()->json(['recordsTotal' => $count,'recordsFiltered' =>$count ,'data'=>$list]);

        } catch (\Exception $e) {
          
            return $e->getMessage();
        }
    }


    public function getcontinent(Request $request)
    {
        try {
            $data=$request->all();
            if(isset($data['continent_id']))
            {
                $list=Continent::where('id',$data['continent_id'])->first();
            }
            else{
                $list=Continent::get();
            }
          
            return Response::json(array( 'success' => true,'data' => $list,'message'=>'Continent List.'), 200); 
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
                'continent_id'=>'required'
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
              $continent= Continent::where('id', $data['continent_id'])->delete();
                return Response::json(array( 'success' => true,'data' => $continent,'message'=>'Continent Deleted Successfully.'), 200); 
            }
        } catch (\Exception $e) {
          
            return $e->getMessage();
        }
    }

}
