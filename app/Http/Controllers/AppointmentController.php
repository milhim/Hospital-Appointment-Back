<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //
    public function index($dept_name)
    {
        $appointment = Appointment::where('department_name', $dept_name)->get();
        return response()->json($appointment);
    }
}
