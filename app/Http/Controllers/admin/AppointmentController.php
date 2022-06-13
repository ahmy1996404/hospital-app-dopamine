<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\DoctorWorkingHours;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Appointment::query()->orderByDesc('created_at');

            $data = $data->get();

            return view('admin.appointment.index', compact('data'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $edit = false;
            $doctors = Doctor::query()->orderByDesc('created_at')->get();
            $users = User::query()->userType('user')->orderByDesc('created_at')->get();

            return view('admin.appointment.form', compact('edit', 'doctors', 'users'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();

            $appointment = Appointment::query()->create($data);
            if ($appointment) {
                DB::commit();
                return redirect()->route('admin.appointment.index')->with('success', __('message.Done Save Data Successfully'));
            }
            return redirect()->back()->with('warning', __('message.Some failed errors'));
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage())
                ->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $appointment = Appointment::query()->findOrFail($id);

            $data = $appointment->get();

            return view('admin.appointment.show', compact('data'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $edit = true;
            $appointment = Appointment::query()->findOrFail($id);
            $doctors = Doctor::query()->orderByDesc('created_at')->get();
            $users = User::query()->userType('user')->orderByDesc('created_at')->get();
            $doctorAvailDays =  array();
            $days = DoctorWorkingHours::where("doctor_id", $appointment->doctor_id)->get();
            foreach ($days as $day) {

                $date = Carbon::parse('this ' . $day->day)->toDateString();
                $dateObject['day'] = $day->day;
                $dateObject['date'] = $date;
                $doctorAvailDays[] = (object)$dateObject;
            }
            return view('admin.appointment.form', compact('edit', 'users', 'doctors', 'appointment', 'doctorAvailDays'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();

            $appointment = Appointment::query()->findOrFail($id);

            if ($appointment->update($data)) {
                DB::commit();
                return redirect()->route('admin.appointment.index')->with('success', __('message.Done Updated Data Successfully'));
            }
            return redirect()->back()->with('warning', __('message.Some failed errors'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage())
                ->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $appointment = Appointment::query()->findOrFail($id);

            if ($appointment->delete()) {
                DB::commit();
                return redirect()->route('admin.appointment.index')->with('success', __('message.Done Deleted Data Successfully'));
            }

            return redirect()->back()->with('warning', __('message.Some failed errors'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
