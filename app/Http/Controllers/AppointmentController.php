<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Appointment;
use App\User;
use App\Task;
use App\System;
use App\Status;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasks = Task::all();
        $statuses = Status::all();
        $systems = System::all();

        return view('Appointment.create', compact('tasks', 'statuses', 'systems'));
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
           'customer_name' => 'required',
           'address' => 'required',
           'email' => 'required|email',
           'mobile_no' => 'required',
           'system' => 'required',
           'task' => 'required',
           'appointment_date' =>'required',
           'task_status' =>'required'

        ]);

        $appointment = new Appointment([
            'customer_name' => $request->get('customer_name'),
            'address' => $request->get('address'),
            'email' =>$request->get('email'),
            'mobile_no' => $request->get('mobile_no'),
            'system' => $request->get('system'),
            'task' => $request->get('task'),
            'appointment_date' => $request->get('appointment_date'),
            'task_status'=> $request->get('task_status')
        ]);

        $appointment -> save();
        return redirect('/appointments')->with('success', 'Appointment has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = \App\User::where('id', $id)->firstorFail();
        //return view('product_detail')->with('product', $product);

        $users = User::all();
        $tasks = Task::all();
        $statuses = Status::all();

        $appointment = Appointment::find($id);
        return view('appointment.assign', compact('users','appointment','tasks', 'statuses'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $appointment = Appointment::find($id);

        return view('appointment.edit', compact('appointment','status'));
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
        'customer_name' => 'required',
        'address' => 'required',
        'email'=> 'required',
        'mobile_no' => 'required',
        'system' => 'required',
        'task' => 'required',
        'appointment_date' => 'required',
        'task_status' => 'required'
      ]);

      $appointment = appointment::find($id);
      $appointment->customer_name = $request->get('customer_name');
      $appointment->address = $request->get('address');
      $appointment->email = $request->get('email');
      $appointment->mobile_no = $request->get('mobile_no');
      $appointment->system = $request->get('system');
      $appointment->task = $request->get('task');
      $appointment->appointment_date = $request->get('appointment_date');
      $appointment->save();

      return redirect('/appointments')->with('success', 'Details have been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = appointment::find($id);
        $appointment->delete();
        return redirect('/appointments')->with('success', 'appointment has been deleted Successfully');
    }

}
