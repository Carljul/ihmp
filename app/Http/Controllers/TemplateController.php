<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;
use App\Traits\GlobalFunction;

class TemplateController extends Controller
{
    use GlobalFunction;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all data for Template table
        $result = Template::all();

        //declaring our return response
        $response = $this->customApiResponse($result, 200); //OK

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
            "template_type" => $request->template_type,
            "content"=> $request->content,
            "is_template"=> $request->is_template,
            "is_deleted"=> $request->is_deleted,
            "created_at" => $this->customCurrentDate(),
            "updated_at" => $this->customCurrentDate()
        ];

        //inserting the new resource...
        $result = Template::insert($payload);

        //declaring our return response
        $response = $this->customApiResponse($result, 201); //CREATED

        //return json response
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Template  $Template
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return specific row using id
        $result = Template::find($id);

        //if id is not found
        if(!$result){
            //declaring our return response
            $response = $this->customApiResponse([], 404); //ID NOT FOUND

            //return json response
            return response()->json($response);
        }

        //declaring our return response
        $response = $this->customApiResponse($result, 200); //OK

        //return json response
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Template  $Template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //creating our payload here...
        $payload = [
            "template_type" => $request->template_type,
            "content"=> $request->content,
            "is_template"=> $request->is_template,
            "is_deleted"=> $request->is_deleted,
            "updated_at" => $this->customCurrentDate()
        ];

        //update the resource...
        $result = Template::find($request->id);

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
     * @param  \App\Template  $Template
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
        $result = Template::find($request->id);

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
