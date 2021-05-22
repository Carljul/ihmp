<?php

namespace App\Http\Controllers;

use App\Certificate;
use Illuminate\Http\Request;
use App\Traits\GlobalFunction;

class CertificateController extends Controller
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
        $result = Certificate::all();

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
        //declare our meta here...
        $metaContent = "";
        $content = json_decode($request->meta); //decode it to JSON

        //meta content validations for confirmation
        if($request->certificate_type == "confirmation"){

            //set our meta here...
            $metaContent = [
                "father_firstname" => $content->{"father_firstname"},
                "father_middlename" => $content->{"father_middlename"},
                "father_lastname" => $content->{"father_lastname"},
                "mother_firstname" => $content->{"mother_firstname"},
                "mother_middlename" => $content->{"mother_middlename"},
                "mother_lastname" => $content->{"mother_lastname"},
                "confirmation_day" => $content->{"confirmation_day"},
                "confirmation_month" => $content->{"confirmation_month"},
                "confirmation_year" => $content->{"confirmation_year"},
                "confirmation_by" => $content->{"confirmation_by"},
                "first_sponsor" => $content->{"first_sponsor"},
                "second_sponsor" => $content->{"second_sponsor"},
                "registration_book" => $content->{"registration_book"},
                "book_page" => $content->{"book_page"},
                "book_number" => $content->{"book_number"},
                "date_issued" => $content->{"date_issued"}
            ];

            //then parse it to json string
            $metaContent = json_encode($metaContent);
        }

        //meta content validations for baptism
        if($request->certificate_type == "baptism"){

            //set our meta here...
            $metaContent = [
                "born_on" => $content->{"born_on"},
                "born_in" => $content->{"born_in"},
                "father_firstname" => $content->{"father_firstname"},
                "father_middlename" => $content->{"father_middlename"},
                "father_lastname" => $content->{"father_lastname"},
                "mother_firstname" => $content->{"mother_firstname"},
                "mother_middlename" => $content->{"mother_middlename"},
                "mother_lastname" => $content->{"mother_lastname"},
                "resident_of" => $content->{"resident_of"},
                "baptism_date" => $content->{"baptism_date"},
                "baptism_minister" => [],
                "baptismal_register" => $content->{"baptismal_register"},
                "volume" => $content->{"volume"},
                "page" => $content->{"page"},
                "date_issued" => $content->{"date_issued"}
            ];

            //then parse it to json string
            $metaContent = json_encode($metaContent);
        }

        //meta content validations for marriage
        if($request->certificate_type == "marriage"){

            //set our meta here...
            $metaContent = [
                "husband_firstname" => $content->{"husband_firstname"},
                "husband_middlename" => $content->{"husband_middlename"},
                "husband_lastname" => $content->{"husband_lastname"},
                "husband_age" => $content->{"husband_age"},
                "husband_civil_status" => $content->{"husband_civil_status"},
                "husband_birthdate" => $content->{"husband_birthdate"},
                "husband_birthplace" => $content->{"husband_birthplace"},
                "husband_residence" => $content->{"husband_residence"},
                "husband_baptismdate" => $content->{"husband_baptismdate"},
                "husband_fathersname" => $content->{"husband_fathersname"},
                "husband_mothersname" => $content->{"husband_mothersname"},
                "husband_firstwitness" => $content->{"husband_firstwitness"},
                "husband_secondwitness" => $content->{"husband_secondwitness"},
                "wife_firstname" => $content->{"wife_firstname"},
                "wife_middlename" => $content->{"wife_middlename"},
                "wife_lastname" => $content->{"wife_lastname"},
                "wife_age" => $content->{"wife_age"},
                "wife_civil_status" => $content->{"wife_civil_status"},
                "wife_birthdate" => $content->{"wife_birthdate"},
                "wife_birthplace" => $content->{"wife_birthplace"},
                "wife_residence" => $content->{"wife_residence"},
                "wife_baptismdate" => $content->{"wife_baptismdate"},
                "wife_fathersname" => $content->{"wife_fathersname"},
                "wife_mothersname" => $content->{"wife_mothersname"},
                "wife_firstwitness" => $content->{"wife_firstwitness"},
                "wife_secondwitness" => $content->{"wife_secondwitness"},
                "marriage_place" => $content->{"marriage_place"},
                "marriage_date" => $content->{"marriage_date"},
                "solemnized_by" => $content->{"solemnized_by"},
                "marriage_number" => $content->{"marriage_number"},
                "marriage_page" => $content->{"marriage_page"},
                "marriage_line" => $content->{"marriage_line"},
                "marriage_day" => $content->{"marriage_day"},
                "marriage_month" => $content->{"marriage_month"},
                "marriage_year" => $content->{"marriage_year"}
            ];

            //then parse it to json string
            $metaContent = json_encode($metaContent);
        }

        //creating our payload here...
        $payload = [
            "firstname" => $request->firstname,
            "middlename" => $request->middlename,
            "lastname" => $request->lastname,
            "certificate_type" => $request->certificate_type,
            "priest_id" => $request->priest_id,
            "meta" => $metaContent,
            "is_deleted"=> false, //by default to false
            "created_by"=> $request->created_by,
            "created_date"=> $this->customCurrentDate(),
            "created_at" => $this->customCurrentDate(),
            "updated_at" => $this->customCurrentDate()
        ];

        //inserting the new resource...
        $result = Certificate::insert($payload);

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
        $result = Certificate::find($id);

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
            "firstname" => $request->firstname,
            "middlename" => $request->middlename,
            "lastname" => $request->lastname,
            "certificate_type" => $request->certificate_type,
            "priest_id" => $request->priest_id,
            "meta" => $request->meta,
            "is_deleted"=> $request->is_deleted,
            "created_by"=> $request->created_by,
            "created_date"=> $request->created_date,
            "created_at" => $this->customCurrentDate(),
            "updated_at" => $this->customCurrentDate()
        ];

        //update the resource...
        $result = Certificate::find($request->id);

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
        $result = Certificate::find($request->id);

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
