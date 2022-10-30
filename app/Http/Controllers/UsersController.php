<?php

namespace App\Http\Controllers;

use App\Models\Specialties;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return  Users::find($id)->appointments;
       // return  Users::with('appointments')->find($id)->appointments;
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Get all specialties: 
        
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
        $validator = Validator::make($request->all(), [
        
        'username'  => 'required|max:100|unique:users',
        'password'  => 'required|max:100',
        ]);
        if ($validator->fails()) {

            return response()->json($validator->errors(),400);
        
        }
        
        $newuser = new Users;
        $newuser -> username = request('username');
        $newuser -> hashed_pass = bcrypt(request('password'));
            
        $newuser -> save();
        return response()->json([
            '2' => 'Your information stored successfuly!',
        ]);
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return  Users::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}
