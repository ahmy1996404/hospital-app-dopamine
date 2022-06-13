<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\DoctorRequest;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\UploadFile\UploadFileRepositoryInterface;
use App\Models\Doctor;
use App\Models\DoctorWorkingHours;
use App\Models\Speciality;
use PhpParser\Node\Stmt\Do_;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @var UploadFileRepositoryInterface
     */
    private $uploadFileRepositoryInterface;

    public function __construct(UploadFileRepositoryInterface $uploadFileRepositoryInterface)
    {
        $this->uploadFileRepositoryInterface = $uploadFileRepositoryInterface;
    }

    public function index()
    {
        try {
            $data = User::query()->userType('doctor')->orderByDesc('created_at');

            $data = $data->get();

            return view('admin.doctor.index', compact('data'));
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
            $specialities = Speciality::query()->orderByDesc('name')->get();
            return view('admin.doctor.form', compact('edit', 'specialities'));
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
    public function store(DoctorRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->except(['is_active', 'avatar', 'user_type', 'speciality_id', 'doctor_info']);
            $data['user_type'] = 'doctor';
            $data['password'] = Hash::make($request['password']);

            if ($request->file('avatar')) {
                $file = $request->file('avatar');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/doctor'), $filename);
                $data['profile_photo_path'] = $filename;
            }
            $user = User::query()->create($data);

            $doctorData['speciality_id'] = $request['speciality_id'];
            $doctorData['clinic_address'] = $request['clinic_address'];

            $doctorData['doctor_info'] = $request['doctor_info'];
            $doctorData['user_id'] = $user->id;
            $doctor = Doctor::query()->create($doctorData);

            $i = 0;
            foreach ($request['days'] as $val) {
                $availabilityData[$i]['day'] = $request['days'][$i];
                $availabilityData[$i]['from'] = $request['from'][$i];
                $availabilityData[$i]['to'] = $request['to'][$i];
                $availabilityData[$i]['doctor_id'] = $doctor->id;

                $i++;
            }
            foreach ($availabilityData as $val) {
                $workingHours = DoctorWorkingHours::query()->create($val);
            }
            if ($user && $doctor && $workingHours) {
                DB::commit();
                return redirect()->route('admin.doctor.index')->with('success', __('message.Done Save Data Successfully'));
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
            $user = User::query()->userType('doctor')->findOrFail($id);

            $data = $user->get();

            return view('admin.doctor.show', compact('user'));
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
            $user = User::query()->userType('doctor')->findOrFail($id);
            $specialities = Speciality::query()->orderByDesc('name')->get();
            $doctor = Doctor::query()->where('user_id', '=', $id)->first();
            $Availability = DoctorWorkingHours::where('doctor_id', $doctor->id)->get();
            $days = array();
            foreach ($Availability as $Availabily) {

                array_push($days, $Availabily->day);
            }
            return view('admin.doctor.form', compact('edit', 'user', 'specialities', 'doctor', 'Availability', 'days'));
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
    public function update(DoctorRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->except(['password', 'avatar', 'user_type', 'speciality_id', 'doctor_info']);
            $user = User::query()->userType('doctor')->findOrFail($id);
            if ($request->file('avatar')) {
                $file = $request->file('avatar');
                @unlink(public_path('upload/doctor/') . $user->profile_photo_path);
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/doctor'), $filename);
                $data['profile_photo_path'] = $filename;
            }
            $doctor = Doctor::query()->where('user_id', '=', $id)->first();

            $doctorData['speciality_id'] = $request['speciality_id'];
            $doctorData['doctor_info'] = $request['doctor_info'];
            $doctorData['clinic_address'] = $request['clinic_address'];

            $Availability = DoctorWorkingHours::where('doctor_id', $doctor->id)->get();
            foreach ($Availability as $Availabil) {
                $Availabil->delete();
            }
            $i = 0;
            foreach ($request['days'] as $val) {
                $availabilityData[$i]['day'] = $request['days'][$i];
                $availabilityData[$i]['from'] = $request['from'][$i];
                $availabilityData[$i]['to'] = $request['to'][$i];
                $availabilityData[$i]['doctor_id'] = $doctor->id;
                $i++;
            }
            foreach ($availabilityData as $val) {
                $avail = DoctorWorkingHours::create($val);
            }
            if ($user->update($data) && $doctor->update($doctorData) && $avail) {
                DB::commit();
                return redirect()->route('admin.doctor.index')->with('success', __('message.Done Updated Data Successfully'));
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
            $user = User::query()->userType('doctor');

            if ($user->findOrFail($id)->delete()) {
                DB::commit();
                return redirect()->route('admin.doctor.index')->with('success', __('message.Done Deleted Data Successfully'));
            }

            return redirect()->back()->with('warning', __('message.Some failed errors'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
