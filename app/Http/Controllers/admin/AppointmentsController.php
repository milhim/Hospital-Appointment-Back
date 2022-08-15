<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Department;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json($appointments);
    }
    public function show($id)
    {
        $appointment = Appointment::find($id);
        return response()->json($appointment);
    }

    public function store(Request $request)
    {
        $appointment = Appointment::create($request->all());
        $department = Department::where('name', $request->department_name)->first();

        $department->appointments()->save($appointment);
        return response()->json(['appointment' => $appointment, 'message' => 'Appointment created succefully']);
    }

    public function update($id, Request $request)
    {

        $appointment = Appointment::find($id);

        $appointment->department_name = $request->department_name;
        $appointment->department_id = $request->department_id;
        $appointment->appointment_date = $request->appointment_date;
        $appointment->taken = $request->taken;

        $appointment->save();

        return response()->json(['appointment' => $appointment, 'message' => 'Appointment updated succefully']);
    }
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted succefully']);
    }
}
