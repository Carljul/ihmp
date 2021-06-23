<?php

namespace App\Http\Controllers;

use App\Priest;
use Illuminate\Http\Request;
use App\Traits\GlobalFunction;

class PriestController extends Controller
{
    use GlobalFunction;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all data for Priest table which is not deleted
        // $result = Priest::where('is_deleted', 0)->orderByRaw('id DESC')->offset(0)->limit(10)->get();
        $result = Priest::where('is_deleted', 0)->orderByRaw('id DESC')->paginate($this->getPaginationLimit());
        
        //get all records from priest
        $resultAllCount = Priest::all();

        //returning json response
        return response()->json(['data' => $result, 'dataCount' => count($resultAllCount), 'status' => 200]); //OK
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return specific row using token
        $checkDuplication = Priest::where('firstname', $request->firstname)
                            ->where('middlename', $request->middlename)
                            ->where('lastname', $request->lastname)
                            ->where('prefix', $request->prefix)
                            ->get();

        //check if there is any duplication
        if(count($checkDuplication) === 0){
            //creating our payload here...
            $payload = [
                "firstname" => $request->firstname,
                "middlename"=> $request->middlename,
                "lastname"=> $request->lastname,
                "prefix"=> $request->prefix,
                "is_deleted"=> $request->is_deleted == "" ? false : $request->is_deleted,
                "created_at" => $this->customCurrentDate(),
                "updated_at" => $this->customCurrentDate()
            ];

            //inserting the new resource...
            $result = Priest::insertOrIgnore($payload);

            //declaring our return response
            $response = $this->customApiResponse($result, 201); //CREATED

            //return json response
            return response()->json($response);
        }else{
            return response()->json($this->customApiResponse([], 400)); //Duplicated
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function show($search, Request $request)
    {
        if($request->isIdSearch && $request->isIdSearch == "true" && $request->isIdSearch == true){

            //return specific row using search
            $result = Priest::where('id', $search)
                    ->orderByRaw('id DESC')
                    ->paginate($this->getPaginationLimit());

            //if search is not found
            if(count($result) == 0){
                //return json response
                return response()->json($this->customApiResponse([], 404)); //DATA NOT FOUND
            }

            //return json response
            return response()->json($this->customApiResponse($result, 200)); //OK

        }else{

            //return specific row using search
            $result = Priest::where('id', $search)
                    ->orWhere('firstname', $search)
                    ->orWhere('middlename', $search)
                    ->orWhere('lastname', $search)
                    ->orWhere('prefix', $search)
                    ->orderByRaw('id DESC')
                    ->paginate($this->getPaginationLimit());

            //if search is not found
            if(count($result) == 0){
                //return json response
                return response()->json($this->customApiResponse([], 404)); //DATA NOT FOUND
            }

            //return json response
            return response()->json($this->customApiResponse($result, 200)); //OK
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //creating our payload here...
        $payload = [
            "firstname" => $request->firstname,
            "middlename"=> $request->middlename,
            "lastname"=> $request->lastname,
            "prefix"=> $request->prefix,
            "is_deleted"=> $request->is_deleted == "" ? false : $request->is_deleted,
            "updated_at" => $this->customCurrentDate()
        ];

        //update the resource...
        $result = Priest::find($request->id);

        //if there is no existsing data to update
        if(!$result){
            //return json response
            return response()->json($this->customApiResponse([], 404)); //ID NOT FOUND
        }

        //then proceed with the update
        $result->update($payload);

        //return json response
        return response()->json($this->customApiResponse($result, 200)); //OK
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Priest  $Priest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //creating our payload here...
        $payload = [
            "is_deleted"=> $request->is_deleted == "" ? true : $request->is_deleted,
            "updated_at" => $this->customCurrentDate()
        ];

        //soft delete...
        $result = Priest::find($request->id);

        //if there is no existsing data to soft delete
        if(!$result){
            //return json response
            return response()->json($this->customApiResponse([], 404)); //ID NOT FOUND
        }

        //then proceed with soft delete
        $result->update($payload);
        
        //return json response
        return response()->json($this->customApiResponse($result, 202)); //DELETED
    }
}
