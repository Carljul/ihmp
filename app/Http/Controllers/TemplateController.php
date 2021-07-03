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
        $result = Template::where('is_deleted', 0)->orderByRaw('id DESC')->paginate($this->getPaginationLimit());

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
        //return specific row using token
        $checkDuplication = Template::where('template_type', $request->template_type)
                            ->where('content', $request->content)
                            ->where('is_template', $request->is_template)
                            ->paginate($this->getPaginationLimit());

        //check if there is any duplication
        if(count($checkDuplication) === 0){
            //creating our payload here...
            $payload = [
                "template_type" => $request->template_type,
                "content"=> $request->content,
                "is_template"=> $request->is_template,
                "is_deleted"=> $request->is_deleted == "" ? false : $request->is_deleted,
                "created_at" => $this->customCurrentDate(),
                "updated_at" => $this->customCurrentDate()
            ];

            //inserting the new resource...
            $result = Template::insert($payload);

            //return json response
            return response()->json($this->customApiResponse($result, 201)); //CREATED
        }else{
            return response()->json($this->customApiResponse([], 400)); //Duplicated
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Template  $Template
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if($request->isIdSearch && $request->isIdSearch == "true" && $request->isIdSearch == true){

            if($request->template != null || $request->template != undefined){
                //return specific row using id
                $result = Template::where('id', $id)->orderByRaw('id DESC')->paginate($this->getPaginationLimit());
            }else{
                $result = Template::where('template_type', $id)->orderByRaw('id DESC')->paginate($this->getPaginationLimit());
            }

            //if id is not found
            if(!$result){
                //return json response
                return response()->json($this->customApiResponse([], 404)); //ID NOT FOUND
            }

            //return json response
            return response()->json($this->customApiResponse($result, 200)); //OK

        }else{

            //return specific row using id
            $result = Template::where('id', $id)
                    ->orWhere('template_type', $id)
                    ->orWhere('content', 'LIKE', '%'.$id.'%')
                    ->orderByRaw('id DESC')
                    ->paginate($this->getPaginationLimit());

            //if id is not found
            if(!$result){
                //return json response
                return response()->json($this->customApiResponse([], 404)); //ID NOT FOUND
            }

            //return json response
            return response()->json($this->customApiResponse($result, 200)); //OK
        }
        
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
            "is_deleted"=> $request->is_deleted == "" ? false : $request->is_deleted,
            "updated_at" => $this->customCurrentDate()
        ];

        //update the resource...
        $result = Template::find($request->id);

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
     * @param  \App\Template  $Template
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
        $result = Template::find($request->id);

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
