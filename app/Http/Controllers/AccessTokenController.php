<?php

namespace App\Http\Controllers;

use App\AccessToken;
use Illuminate\Http\Request;
use App\Traits\GlobalFunction;
use Illuminate\Support\Facades\DB;

class AccessTokenController extends Controller
{
    use GlobalFunction;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all data for AccessToken table
        $result = AccessToken::all();

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

        //check if user_id exists...
        $result = DB::table("access_tokens")->where('user_id', $request->user_id)->get();
        // $result = AccessToken::where('user_id', $request->user_id)->get();

        //if there is no existsing user_id then insert
        if($result){
            return $result."exists";

            // STUCKED OVER HERE..........................

            // //creating our payload here...
            // $payload = [
            //     "user_id" => $request->user_id,
            //     "token_key" => $request->token_key,
            //     "token_status"=> $request->token_status,
            //     "expiration"=> $request->expiration,
            //     "created_at" => $this->customCurrentDate(),
            //     "updated_at" => $this->customCurrentDate()
            // ];
            
            // //inserting the new resource...
            // $result = AccessToken::updateOrInsert($payload);

            // //declaring our return response
            // $response = $this->customApiResponse($result, 201); //CREATED

            // //return json response
            // return response()->json($response);
        }else {

            return $result."not exists";
            // //creating our payload here...
            // $payload = [
            //     "token_key" => $request->token_key,
            //     "token_status"=> $request->token_status,
            //     "expiration"=> $request->expiration,
            //     "created_at" => $this->customCurrentDate(),
            //     "updated_at" => $this->customCurrentDate()
            // ];

            // //update the resource...
            // $result->update($payload);

            // //declaring our return response
            // $response = $this->customApiResponse($result, 200); //OK

            // //return json response
            // return response()->json($response);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccessToken  $AccessToken
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return specific row using id
        $result = AccessToken::find($id);

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
}
