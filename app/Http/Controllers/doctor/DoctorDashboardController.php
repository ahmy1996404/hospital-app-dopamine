<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorDashboardController extends Controller
{
    public function showDashboard(  )
    {
     
        $totalAppointmants = Appointment::query()->where('doctor_id','=' , Auth::user()->doctor->id)->count();
        $pendingAppointmants = Appointment::query()->where('doctor_id', '=', Auth::user()->doctor->id)->where('status','=', 'pending')->count();
        $completedAppointmants = Appointment::query()->where('doctor_id', '=', Auth::user()->doctor->id)->where('status', '=', 'completed')->count();
        $canceledAppointmants = Appointment::query()->where('doctor_id', '=', Auth::user()->doctor->id)->where('status', '=', 'cancelled')->count();

        $data = Appointment::query()->where('doctor_id', '=', Auth::user()->doctor->id)->orderByDesc('created_at')->take(5)->get();

        return view('user.index' , compact(['totalAppointmants', 'pendingAppointmants', 'completedAppointmants', 'canceledAppointmants', 'data']));
    }
}
