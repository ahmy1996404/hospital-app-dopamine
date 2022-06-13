<?php

namespace App\Http\Requests\admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'doctor_id' => ['required', 'integer', Rule::exists('doctors', 'id')],
            'user_id' => ['required', 'integer', Rule::exists('users', 'id')],
            'date' => ['required'],
        ];
    }

    protected function onUpdate(): array
    {
        return [
            'doctor_id' => ['required', 'integer', Rule::exists('doctors', 'id')],
            'user_id' => ['required', 'integer', Rule::exists('users', 'id')],
            'date' => ['required'],
            'status' => ['required'],

        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->routeIs('admin.appointment.store')) {
            return $this->onCreate();
        } elseif (request()->routeIs('admin.appointment.update')) {
            return $this->onUpdate();
        } else {
            return [];
        }
    }
}
