<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentReport;
use App\Models\ChatLog;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\User;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class MainUserController extends Controller
{
    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.view_profile', compact('user'));
    }
    public function UserProfileEdit()
    {

        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('patient.profile.view_profile_edit', compact('editData'));
    }
    public function UserProfileStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',

        ]);
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/') . $data->profile_photo_path);
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message ' => ' user profile updated successfuly',
            'alert-type' => 'success'
        );
        return redirect()->route('profile.edit')->with($notification);
    }
    public function UserPasswordView()
    {
        return view('patient.profile.view_change_password');
    }
    public function UserPasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',

        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    }
    public function showHome()
    {
        $doctors = User::query()->userType('doctor')->orderByDesc('created_at')->get();

        return view('patient.home', compact('doctors'));
    }
    public function showDoctors($speciality = null)
    {
        if ($speciality) {
            $doctors = Doctor::query()->whereHas('speciality', function ($q)  use ($speciality) {
                $q->where('name', '=', $speciality);
            })->orderByDesc('created_at')->get();
        } else {
            $doctors = Doctor::query()->orderByDesc('created_at')->get();
        }
        $specialities = Speciality::query()->orderByDesc('created_at')->get();

        return view('patient.doctors', compact('doctors', 'specialities'));
    }
    public function showAppointment($id = null)
    {
        try {

            if ($id) {
                $doctor = true;
                $doctors = Doctor::query()->findOrFail($id);
            } else {
                $doctor = false;
                $doctors = Doctor::query()->orderByDesc('created_at')->get();
            }
            $specialities = Speciality::query()->orderByDesc('created_at')->get();

            return view('patient.appiontment', compact('doctor', 'doctors', 'specialities'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function showDoctorData($id)
    {

        $doctor = Doctor::query()->findOrFail($id);


        return view('patient.doctor-details', compact('doctor'));
    }
    public function storeAppointment(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['user_id'] = Auth::id();

            $appointment = Appointment::query()->create($data);
            if ($appointment) {
                DB::commit();
                return redirect()->route('user.appoinment.view')->with('success', __('message.Done Save Data Successfully'));
            }
            return redirect()->back()->with('warning', __('message.Some failed errors'));
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage())
                ->withInput($request->all());
        }
    }
    public function UserAppointments()
    {
        try {

            $data = Appointment::query()->where('user_id', '=', Auth::id())->orderByDesc('created_at');

            $data = $data->get();
            return view('patient.profile.view_appointment', compact('data'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function UserReports()
    {
        try {

            $data = AppointmentReport::query()->whereHas('appointment', function ($q) {
                $q->where('user_id', '=', Auth::id());
            })->with(['appointment'])->orderByDesc('created_at');

            $data = $data->get();
            return view('patient.profile.view_report', compact('data'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function UserShowReport($id)
    {
        try {
            $report = AppointmentReport::query()->findOrFail($id);

            $data = $report;
            return view('patient.profile.show_report', compact('data'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function showChat($id= null)
    {
        try {
            $patientWithDoctorChat = array();
            foreach (Auth::user()->sendedMessages as $message) {
                array_push($patientWithDoctorChat, $message->receiver_id);
            }
            foreach (Auth::user()->recivedMessages as $message) {
                array_push($patientWithDoctorChat, $message->sender_id);
            }
            $patientWithDoctorChat = array_unique($patientWithDoctorChat);
            $doctorChat = array();
            foreach ($patientWithDoctorChat as $doctorId) {
                $doctor = User::query()->find($doctorId);
                $messages = ChatLog::query()
                    ->where([['sender_id', '=', $doctor->id], ['receiver_id', '=', Auth::id()]])
                    ->orWhere([['sender_id', '=', Auth::id()], ['receiver_id', '=', $doctor->id]])
                    ->orderByDesc('created_at')->first();
                $data = array('doctor_id' => $doctor->id, 'name' => $doctor->name, 'avatar' => $doctor->profile_photo_path, 'last_message' => $messages->message, 'created_at' => $messages->created_at->diffForHumans());


                array_push($doctorChat, (object) $data);
            }
            $doctors =  User::query()->userType('doctor')->orderByDesc('created_at')->get();
            $chat = null;
            $chatWith = null;

            if ($id){
                $chatWith = User::query()->find($id);

                $chat =
                ChatLog::query()
                    ->where([['sender_id', '=', $id], ['receiver_id', '=', Auth::id()]])
                    ->orWhere([['sender_id', '=', Auth::id()], ['receiver_id', '=', $id]])
                    ->orderBy('created_at')->get();
            }
            return view('patient.chat.app', compact('doctorChat', 'doctors' , 'chat', 'chatWith'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function sendMessage(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();

            $message = ChatLog::query()->create($data);
            if ($message) {
                DB::commit();
                return redirect()->back()->with('success', __('message.Done Save Data Successfully'));
            }
            return redirect()->back()->with('warning', __('message.Some failed errors'));
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage())
                ->withInput($request->all());
        }
    }
}
