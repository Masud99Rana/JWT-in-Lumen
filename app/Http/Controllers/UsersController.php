<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UsersController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

	public function index(){
		$results = app('db')->select("SELECT * FROM users");
        return response()->json(['users' => $results]);
	}

	public function store(Request $request){
        
        $this->validate($request, [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]); 
  

		app('db')->table('users')->insertGetId(
            array('name' => $request->name,'email' => $request->email,'password'=>app('hash')->make($request->password))
        );
        return response()->json(['success' => true]);
	}

	public function update(Request $request, $id){
        
        // $this->validate($request, [
        //     'name' => 'required|min:6',
        //     'password' => 'required|min:6'
        // ]); 

		app('db')->table('users')
            ->where('id', $id)
            ->update(['name' => $request->name,'email' => $request->email,'password'=>app('hash')->make($request->password)]);
        return response()->json(['success' => true]);
	}

	public function destroy(Request $request, $id){
		app('db')->table('users')->where('id', '=', $id)->delete();
        return response()->json(['success' => true]);
	}

}