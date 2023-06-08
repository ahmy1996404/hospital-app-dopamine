<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorWorkingHours;
use App\Models\DoctorWorkingHoursVideo;
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
    public function getDoctorVideoAvailability(Request $request)
    {
        $data =  array();
        $days = DoctorWorkingHoursVideo::where("doctor_id", $request->doctor_id)->get();
        foreach ($days as $day){
            $date = Carbon::parse('this '. $day->day)->toDateString();
            array_push($data , $date);
        }

        return response()->json($data);
    }
    public function getDoctorAvailabilityHours(Request $request)
    {
        $data =  array();
        $d    = new \DateTime($request->date);
        $days = DoctorWorkingHours::where("doctor_id", $request->doctor_id)->where('day',$d->format('l'))->first();
        $times = $this->generateDateRange(Carbon::parse($request->date.' '.$days->from) ,Carbon::parse($request->date.' '.$days->to ),30,$request->doctor_id,$request->date);
        return response()->json($times);
    }
    public function getDoctorVideoAvailabilityHours(Request $request)
    {
        $data =  array();
        $d    = new \DateTime($request->date);
        $days = DoctorWorkingHoursVideo::where("doctor_id", $request->doctor_id)->where('day',$d->format('l'))->first();
        $times = $this->generateDateRange(Carbon::parse($request->date.' '.$days->from) ,Carbon::parse($request->date.' '.$days->to ),30,$request->doctor_id,$request->date);
        return response()->json($times);
    }
    public function getSpecialityDoctors(Request $request)
    {
        $data =  array();
        $doctors = Doctor::with('user')->where("speciality_id", $request->speciality_id)->get();
        

        return response()->json($doctors);
    }
    private function generateDateRange(Carbon $start_date, Carbon $end_date,$slot_duration = 30 , $doctorId,$date)
    {
        $doctor = Doctor::where('id',$doctorId)->first();
        $dates = [];
        $slots = $start_date->diffInMinutes($end_date)/$slot_duration;
        //first unchanged time
        $dates[]=$start_date->toTimeString();

        for($s = 1;$s <=$slots;$s++){

            $time=$start_date->addMinute($slot_duration)->toTimeString();
            $appointment = $doctor->doctorAppointments->where('date',$date)->where('time' ,$time )->where('status','completed')->where('type','voice')->first();
            if(!$appointment){
                $dates[]=$time;

            }

        }

        return $dates;
    }
}   
