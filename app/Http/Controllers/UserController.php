<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class usercontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'first_name'=>'required',
        'last_name'=>'required',
        'role' => 'required',
        'email' => 'required|email',
        'mobile_no'=> 'required',
        'password' => 'required|string'
      ]);

      $user = new User([
        'first_name' => $request->get('first_name'),
        'last_name' => $request->get('last_name'),
        'role'=> $request->get('role'),
        'email'=> $request->get('email'),
        'mobile_no' => $request->get('mobile_no'),
        'password' => $request->get('password')
      ]);

      $user->save();
      return redirect('/users')->with('success', 'User has been added');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
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

        $request->validate([
        'first_name' =>'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email'=> 'required|email|string|max:255|unique:users',
        'mobile_no' => 'required',
        'password' => 'required|string|max:60'
      ]);

      $user = user::find($id);
      $user->first_name = $request->get('first_name');
      $user->last_name = $request->get('last_name');
      $user->email = $request->get('email');
      $user->mobile_no = $request->get('mobile_no');
      $user->password = $request->get('password');
      $user->save();

      return redirect('/users')->with('success', 'Details have been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect('/users')->with('success', 'user has been deleted Successfully');
    }
}

