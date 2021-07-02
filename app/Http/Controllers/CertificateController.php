<?php

namespace App\Http\Controllers;

use App\Certificate;
use Illuminate\Http\Request;
use App\Traits\GlobalFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CertificateController extends Controller
{
    use GlobalFunction;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return all data for Certificate table
        $result = DB::table('certificates')
        ->leftJoin('priests', 'priests.id','=','certificates.priest_id')
        ->select('certificates.*', 'priests.id as priest_id','priests.firstname as priest_fname','priests.middlename as priest_mname','priests.lastname as priest_lname')
        ->where('certificates.is_deleted', 0)
        ->where('certificates.certificate_type', $request->certificate_type)
        ->orderByRaw('certificates.id DESC')
        ->paginate($this->getPaginationLimit());

        //returning json response
        return response()->json($this->customApiResponse($result, 200)); //OK
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
                "baptism_minister" => $content->{"baptism_minister"},
                "baptismal_register" => $content->{"baptismal_register"},
                "godparents" => $content->{"godparents"},
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

        //meta content validations for marriage
        if($request->certificate_type == "death"){

            
            //set our meta here...
            $metaContent = [
                "deceased_name" => $content->{"deceased_name"},
                "age" => $content->{"age"},
                "residence" => $content->{"residence"},
                "date_of_death" => $content->{"date_of_death"},
                "place_of_burial" => $content->{"place_of_burial"},
                "date_of_burial" => $content->{"date_of_burial"},
                "informant_or_relatives" => $content->{"informant_or_relatives"},
                "book_number" => $content->{"book_number"},
                "page_number" => $content->{"page_number"},
                "registry_number" => $content->{"registry_number"}, 
                "date_issued" => $content->{"date_issued"}
            ];

            //then parse it to json string
            $metaContent = json_encode($metaContent);
        }

        //create a query for checking the validation
        $checkDuplication = Certificate::where('meta', $metaContent)
                ->where('firstname', $request->firstname)
                ->where('middlename', $request->middlename)
                ->where('lastname', $request->lastname)
                ->where('certificate_type', $request->certificate_type)
                ->where('priest_id', $request->priest_id)
                ->get();

        //check if there is any duplication
        if(count($checkDuplication) !== 0){
            return response()->json($this->customApiResponse([], 400)); //Duplicated
        }

        //creating our payload here...
        $payload = [
            "firstname" => $request->firstname,
            "middlename" => $request->middlename,
            "lastname" => $request->lastname,
            "certificate_type" => $request->certificate_type,
            "priest_id" => $request->priest_id,
            "meta" => $metaContent,
            "is_deleted"=> $request->is_deleted == "" ? false : $request->is_deleted,
            "created_by"=> $request->created_by,
            "created_date"=> $this->customCurrentDate(),
            "created_at" => $this->customCurrentDate(),
            "updated_at" => $this->customCurrentDate()
        ];

        //inserting the new resource...
        $result = Certificate::insert($payload);

        //return json response
        return response()->json($this->customApiResponse($result, 201)); //CREATED
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificate  $Certificate
     * @return \Illuminate\Http\Response
     */
    public function show($search, Request $request)
    {
        if($request->isIdSearch && $request->isIdSearch == "true" && $request->isIdSearch == true){

            $result = DB::table('certificates')
            ->leftJoin('priests', 'priests.id','=','certificates.priest_id')
            ->select('certificates.*', 'priests.id as priest_id','priests.firstname as priest_fname','priests.middlename as priest_mname','priests.lastname as priest_lname')
            ->where('certificates.is_deleted', 0)
            ->where('certificates.id', $search)
            ->get();

            //if search is not found
            if(count($result) == 0){
                //return json response
                return response()->json($this->customApiResponse([], 404)); //ID NOT FOUND
            }

            //return json response
            return response()->json($this->customApiResponse($result, 200)); //OK

        }else if($request->dateFrom && $request->dateTo){

            //converted the dates to Carbon, and removed the minutes, seconds and milliseconds
            $dateFrom = substr(new Carbon($request->dateFrom), 0, 10);
            $dateTo = substr(new Carbon($request->dateTo), 0, 10);

            $result = DB::table('certificates')
            ->leftJoin('priests', 'priests.id','=','certificates.priest_id')
            ->select('certificates.*', 'priests.id as priest_id','priests.firstname as priest_fname','priests.middlename as priest_mname','priests.lastname as priest_lname')
            ->where('certificates.is_deleted', 0)
            ->where('certificates.certificate_type', $request->certificate_type)
            ->whereBetween('certificates.created_at', [$dateFrom, $dateTo])
            ->get();

            //if search is not found
            if(count($result) == 0){
                //return json response
                return response()->json($this->customApiResponse([], 404)); //ID NOT FOUND
            }

            //return json response
            return response()->json($this->customApiResponse($result, 200)); //OK

        }else{

            // return specific row using search
            $result = DB::table('certificates')
            ->leftJoin('priests', 'priests.id','=','certificates.priest_id')
            ->select('certificates.*', 'priests.id as priest_id','priests.firstname as priest_fname','priests.middlename as priest_mname','priests.lastname as priest_lname')
            ->where('certificates.is_deleted', 0)
            ->where('certificates.certificate_type', $request->certificate_type)
            ->where(function($query) use ($search){
                $query->where('certificates.firstname', 'LIKE', '%'. $search . '%')
                        ->orWhere('certificates.middlename', 'LIKE', '%'. $search . '%')
                        ->orWhere('certificates.lastname', 'LIKE', '%'. $search . '%')
                        ->orWhere('certificates.meta', 'LIKE', '%'. $search . '%')
                        ->orWhere('priests.firstname', 'LIKE', '%'. $search . '%')
                        ->orWhere('priests.middlename', 'LIKE', '%'. $search . '%')
                        ->orWhere('priests.lastname', 'LIKE', '%'. $search . '%');
            })
            ->orderByRaw('certificates.id DESC')
            ->paginate($this->getPaginationLimit());
            
            //if search is not found
            if(count($result) == 0){
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
     * @param  \App\Certificate  $Certificate
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
            "is_deleted"=> $request->is_deleted == "" ? false : $request->is_deleted,
            "created_by"=> $request->created_by,
            "created_date"=> $request->created_date,
            "updated_at" => $this->customCurrentDate()
        ];

        //update the resource...
        $result = Certificate::find($request->id);

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
     * @param  \App\Certificate  $Certificate
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
        $result = Certificate::find($request->id);

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


    /**
     * Update Parish Priest for specific records only
     *
     * @param  \App\Certificate  $Certificate
     * @return \Illuminate\Http\Response
     */
    public function updatePriest(Request $request){
        //creating our payload here...
        $payload = [
            "priest_id" => (int)$request->priest_id,
            "created_by"=> (int)$request->created_by,
            "updated_at" => $this->customCurrentDate()
        ];

        //update the resource...
        $result = Certificate::find($request->id);

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
}
