<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    protected function onCreate(): array
    {
        return [
            'speciality_id' => ['required', 'integer', Rule::exists('specialities', 'id')],      
            'doctor_info' => ['required'],
            'clinic_address' => ['required'],
            'email' => ['required', 'email', 'string', 'min:2', 'max:255', Rule::unique('users', 'email')],
            'phone' => ['required', 'string', Rule::unique('users', 'phone')],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'password' => ['required', 'string', 'min:2', 'max:255'],
            "days"    => "required|array|min:1",
            "from"    => "required|array",
            "from.*"    => "required",
            "to"    => "required|array",
            "to.*"    => "required",
            "videoDays"    => "required|array|min:1",
            "videoFrom"    => "required|array",
            "videoFrom.*"    => "required",
            "videoTo"    => "required|array",
            "videoTo.*"    => "required",

        ];
    }

    protected function onUpdate(): array
    {
        return [
            'speciality_id' => ['required', 'integer', Rule::exists('specialities', 'id')],
            'doctor_info' => ['required'],
            'clinic_address' => ['required'],
            'email' => ['required', 'email', 'string', 'min:2', 'max:255', Rule::unique('users', 'email')->ignore($this->id, 'id')],
            'phone' => ['required', 'string', Rule::unique('users', 'phone')->ignore($this->id, 'id')],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            "days"    => "required|array|min:1",
            "from"    => "required|array",
            "from.*"    => "required",
            "to"    => "required|array",
            "to.*"    => "required",
            "videoDays"    => "required|array|min:1",
            "videoFrom"    => "required|array",
            "videoFrom.*"    => "required",
            "videoTo"    => "required|array",
            "videoTo.*"    => "required",

        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->routeIs('admin.doctor.store')) {
            return $this->onCreate();
        } elseif (request()->routeIs('admin.doctor.update')) {
            return $this->onUpdate();
        } else {
            return [];
        }
    }
}
