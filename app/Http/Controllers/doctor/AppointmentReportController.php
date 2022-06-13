<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\doctor\ReportRequest;
use App\Models\Appointment;
use App\Models\AppointmentReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        try {

            $data = Appointment::has('report')->where('user_id', '=', $id)->orderByDesc('created_at');

            $data = $data->get();
            return view('doctor.appointment.report.index', compact('data'));
        } catch (\Exception $exception) {

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        try {
            $appointment = Appointment::query()->findOrFail($id);

            return view('doctor.appointment.report.form', compact('appointment'));
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
    public function store(ReportRequest $request)
    {
        try {

            DB::beginTransaction();
            $data = $request->all();

            $report = AppointmentReport::query()->create($data);
            if ($report) {
                DB::commit();
                return redirect()->route('doctor.appointment')->with('success', __('message.Done Save Data Successfully'));
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
            $report = AppointmentReport::query()->findOrFail($id);
            $data = $report;
                return view('doctor.appointment.report.show', compact('data'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
