<?php

namespace App\Http\Controllers;

use App\Priest;
use Illuminate\Http\Request;

class PriestController extends Controller
{
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
            "user_id" => $request->user_id,
            "latitude"=> $request->latitude,
            "longitude"=> $request->longitude,
            "status"=> $request->status,
            "time_created"=> $this->customCurrentTime(),
            'day_created' => $this->customCurrentDay(),
            'month_created' => $this->customCurrentMonth(),
            'year_created' => $this->customCurrentYear(),
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
    public function update(Request $request, Priest $id)
    {
        //creating our payload here...
        $payload = [
            "user_id" => $request->user_id,
            "latitude"=> $request->latitude,
            "longitude"=> $request->longitude,
            "status"=> $request->status,
        ];

        //inserting the new resource...
        $result = Priest::find($id);
        $result->update($payload);

        //declaring our return response
        $response = [
            'data' => $result,
            'status' => 200, //OK
        ];

        //return json response
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Priest  $priest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Priest $priest)
    {
        //
    }
}
