<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PatientRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = User::query()->userType('user')->orderByDesc('created_at');

            $data = $data->get();

            return view('admin.patient.index', compact('data'));
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
            return view('admin.patient.form', compact('edit'));
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
    public function store(PatientRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->except(['is_active', 'avatar', 'user_type']);
            $data['user_type'] = 'user';
            $data['password'] = Hash::make($request['password']);

            if ($request->file('avatar')) {
                $file = $request->file('avatar');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $data['profile_photo_path'] = $filename;
            }
            $user = User::query()->create($data);

            
            if ($user) {
                DB::commit();
                return redirect()->route('admin.patient.index')->with('success', __('message.Done Save Data Successfully'));
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
            $user = User::query()->userType('user')->findOrFail($id);

            $data = $user->get();

            return view('admin.patient.show', compact('user'));
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
            $user = User::query()->userType('user')->findOrFail($id);
      
            return view('admin.patient.form', compact('edit', 'user'));
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
    public function update(PatientRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->except(['password', 'avatar', 'user_type']);
            $user = User::query()->userType('user')->findOrFail($id);
            if ($request->file('avatar')) {
                $file = $request->file('avatar');
                @unlink(public_path('upload/user_images/') . $user->profile_photo_path);
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $data['profile_photo_path'] = $filename;
            }
             
            if ($user->update($data)) {
                DB::commit();
                return redirect()->route('admin.patient.index')->with('success', __('message.Done Updated Data Successfully'));
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
            $user = User::query()->userType('user');

            if ($user->findOrFail($id)->delete()) {
                DB::commit();
                return redirect()->route('admin.patient.index')->with('success', __('message.Done Deleted Data Successfully'));
            }

            return redirect()->back()->with('warning', __('message.Some failed errors'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
