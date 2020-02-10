<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\AssignEmail;
use Mail;
use App\Appointment;
use App\User;
use App\Task;
use App\System;
use App\Status;
use App\Assign;




class AssignController extends Controller
{
    public function index()
    {
        $assigns = Assign::all();
        return view('Assign.index', compact('assigns'));
    }
    /**
     * return the view to create a new assignment
     * email
     */

    public function create()
    {
        $users = User::all();
        $appointments = Appointment::all();
        return view('Appointment.assign', compact('users', 'appointments'));
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
           'name' => 'string',
           'message' => 'string',
           'email' => 'string',
        ]);

        $email = User::where('user_id',Auth::user()->id)->where('checked',false)->get();
        $assign = new Assign([
            
            'name' => $request->get('name'),
            'message' => $request->get('message'), 
            'email' => $request->get('email'),
            ]);

        $assign -> save();
        if($assign->save()){
            //mail logic
            Mail::to('$appointment->user->email')->send(new AssignEmail($assign));
        }
        return view('appointment.assign')->with('success', 'Assign has been done');

    }
}
