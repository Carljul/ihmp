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
        //return all data for Priest table
        $result = Priest::all();

        //declaring our return response
        $response = [
            'data' => $result,
            'status' => 200, //OK
        ];

        //returning json response
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //creating our payload here...
        $payload = [
            "firstname" => $request->firstname,
            "middlename"=> $request->middlename,
            "lastname"=> $request->lastname,
            "prefix"=> $request->prefix,
            "is_deleted"=> $request->is_deleted,
            "created_at" => $this->customCurrentDate(),
            "updated_at" => $this->customCurrentDate()
        ];

        //inserting the new resource...
        $result = Priest::insert($payload);

        //declaring our return response
        $response = [
            'data' => $result,
            'status' => 201, //CREATED
        ];

        //return json response
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return specific row using id
        $result = Priest::find($id);

        //declaring our return response
        $response = [
            'data' => $result,
            'status' => 200, //OK
        ];

        //return json response
        return response()->json($response);
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
            "is_deleted"=> $request->is_deleted,
            "updated_at" => $this->customCurrentDate()
        ];

        //update the resource...
        $result = Priest::find($request->id);

        //if there is no existsing data to update
        if(!$result){
            //declaring our return response
            $response = $this->customApiResponse([], 404); //ID NOT FOUND

            //return json response
            return response()->json($response);
        }

        //then proceed with the update
        $result->update($payload);

        //declaring our return response
        $response = $this->customApiResponse($result, 200); //OK

        //return json response
        return response()->json($response);
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
            "is_deleted"=> $request->is_deleted,
            "updated_at" => $this->customCurrentDate()
        ];

        //soft delete...
        $result = Priest::find($request->id);

        //if there is no existsing data to soft delete
        if(!$result){
            //declaring our return response
            $response = $this->customApiResponse([], 404); //ID NOT FOUND

            //return json response
            return response()->json($response);
        }

        //then proceed with soft delete
        $result->update($payload);

        //declaring our return response
        $response = $this->customApiResponse($result, 200); //OK

        //return json response
        return response()->json($response);
    }
}
