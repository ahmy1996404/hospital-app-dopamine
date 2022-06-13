<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function getDoctorAppointment()
    {
        try {
            $data = Appointment::query()->where('doctor_id','=',Auth::user()->doctor->id)->orderByDesc('created_at');

            $data = $data->get();
            return view('doctor.appointment.index', compact('data'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function ChangeAppoinmentStatus($id , $status)
    {
        try {
         DB::beginTransaction();
        $data = Appointment::query()->where('doctor_id', '=', Auth::user()->doctor->id)->findOrFail($id);
        $data->status = $status;
        if($data->update()){
                DB::commit();
                return redirect()->route('doctor.appointment.index')->with('success', __('message.Done Updated Data Successfully'));

        }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
       
    }
}
