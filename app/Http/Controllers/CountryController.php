<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Input, Redirect,Response,Hash,Storage,DB,Mail,URL,Session; 
use App\Models\Country;

class CountryController extends Controller
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
                'country_date'=>'required',
                'short_name'=>'required',
                'continent_id'=>'required',
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
                Country::create($request->all());
                return Response::json(array( 'success' => true,'data' => $data,'message'=>'Country Added Successfully.'), 200); 
            }
          
          } catch (\Exception $e) {
          
              return $e->getMessage();
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        try {
            $data=$request->all();
            $rules = array(
                'user_id'=>'required',
                'country_date'=>'required',
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
                Country::where('id',$id)->update(['name'=>$data['name'],'country_date'=>$data['country_date'],'short_name'=>$data['short_name'],'code'=>$data['code'],'description'=>$data['description']]);
                return Response::json(array( 'success' => true,'data' => $data,'message'=>'Country Updated Successfully.'), 200); 
            }
          
          } catch (\Exception $e) {
          
              return $e->getMessage();
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }

    public function listCountry(Request $request)
    {
        try {
            $data=$request->all();
            $list=Country::select('countries.id','countries.short_name','countries.name','countries.code','countries.continent_id','continents.name as continent_name','countries.description','countries.country_date')->leftJoin('continents', 'continents.id', '=', 'countries.continent_id')->get();
            $count=Country::count();
            return response()->json(['recordsTotal' => $count,'recordsFiltered' =>$count ,'data'=>$list]);

        } catch (\Exception $e) {
          
            return $e->getMessage();
        }
    }


    public function getcountry(Request $request)
    {
        try {
            $data=$request->all();
            if(isset($data['country_id']))
            {
                $list=Country::select('countries.id','countries.short_name','countries.name','countries.code','countries.continent_id','continents.short_name as continent_name','countries.description','countries.country_date')->leftJoin('continents', 'continents.id', '=', 'countries.continent_id')->where('countries.id',$data['country_id'])->first();
            }
            else{
                $list=Country::select('countries.id','countries.short_name','countries.name','countries.code','countries.continent_id','continents.short_name as continent_name','countries.description','countries.country_date')->leftJoin('continents', 'continents.id', '=', 'countries.continent_id')->get();
            }
          
            return Response::json(array( 'success' => true,'data' => $list,'message'=>'Country List.'), 200); 
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
                'country_id'=>'required'
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
              $country= Country::where('id', $data['country_id'])->delete();
                return Response::json(array( 'success' => true,'data' => $country,'message'=>'Country Deleted Successfully.'), 200); 
            }
        } catch (\Exception $e) {
          
            return $e->getMessage();
        }
    }
    
}
