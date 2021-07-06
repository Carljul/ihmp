<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Traits\GlobalFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use GlobalFunction;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = DB::table('users')
        ->leftJoin('roles', 'roles.id','=','users.role_id')
        ->select('users.*','roles.display_name as role_name', 'roles.id as role_id')
        ->where('users.role_id','!=', 3)
        ->paginate($this->getPaginationLimit());
        //returning json response
        return response()->json($this->customApiResponse($result, 200)); //OK
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search, Request $request)
    {
        if($request->isIdSearch && $request->isIdSearch == "true" && $request->isIdSearch == true){
            if($request->isOwnedAccount != null || $request->isOwnedAccount != undefined || $request->isOwnedAccount != ''){
                //return specific row using search
                $result = DB::table('users')
                ->leftJoin('roles', 'roles.id','=','users.role_id')
                ->select('users.*','roles.display_name as role_name', 'roles.id as role_id')
                ->where('users.id','=',$request->id)->get();
            }else{
                //return specific row using search
                $result = DB::table('users')
                ->leftJoin('roles', 'roles.id','=','users.role_id')
                ->select('users.*','roles.display_name as role_name', 'roles.id as role_id')
                ->where('users.role_id','!=', 3)
                ->where('users.id','=',$request->id)
                ->paginate($this->getPaginationLimit());
            }
            
            //if search is not found
            if(count($result) == 0){
                //return json response
                return response()->json($this->customApiResponse([], 404)); //DATA NOT FOUND
            }

            //return json response
            return response()->json($this->customApiResponse($result, 200)); //OK

        }else{

            // return specific row using search
            $result = User::where('role_id', '!=', "3")
                    ->where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('email', 'LIKE', '%'.$search.'%')
                    ->orderByRaw('id DESC')
                    ->paginate($this->getPaginationLimit());

            // if search is not found
            if(count($result) == 0){
                //return json response
                return response()->json($this->customApiResponse([], 404)); //DATA NOT FOUND
            }

            //return json response
            return response()->json($this->customApiResponse($result, 200)); //OK
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //creating our payload here...
        if($request->isResetPassword == "true"){
            /// Password: 1234567890
            $payload = [
                "password" => '$2y$10$ok6GIRvHw4.qFfE2Hc004eOegiUOJBmw/J3b7H4udkNYuwZCGMRQW',
                "updated_at" => $this->customCurrentDate()
            ];
        }else{
            $payload = [
                "role_id" => $request->role_id,
                "is_active"=> $request->is_active,
                "updated_at" => $this->customCurrentDate()
            ];
        }

        //update the resource...
        $result = User::find($request->id);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateInfo(Request $request, $id){
        
        $payload;
        if($request->password == null || $request->password == ''){
            $payload = [
                "name" => $request->name,
                "email"=> $request->email,
                "updated_at" => $this->customCurrentDate()
            ];
        }else{
            $payload = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "updated_at" => $this->customCurrentDate()
            ];
        }

        //update the resource...
        $result = User::find($request->id);

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
