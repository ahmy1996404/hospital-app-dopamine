<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorWorkingHours;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    
    public function getDoctorAvailability(Request $request)
    {
        $data =  array();
        $days = DoctorWorkingHours::where("doctor_id", $request->doctor_id)->get();
        foreach ($days as $day){
            $date = Carbon::parse('this '. $day->day)->toDateString();
            array_push($data , $date);
        }
      
        return response()->json($data);
    }
    public function getSpecialityDoctors(Request $request)
    {
        $data =  array();
        $doctors = Doctor::with('user')->where("speciality_id", $request->speciality_id)->get();
        

        return response()->json($doctors);
    }
}   
