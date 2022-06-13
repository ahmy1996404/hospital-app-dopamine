<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientRequest extends FormRequest
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
            'email' => ['required', 'email', 'string', 'min:2', 'max:255', Rule::unique('users', 'email')],
            'phone' => ['required', 'string', Rule::unique('users', 'phone')],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'password' => ['required', 'string', 'min:2', 'max:255'],
            


        ];
    }

    protected function onUpdate(): array
    {
        return [
           
            'email' => ['required', 'email', 'string', 'min:2', 'max:255', Rule::unique('users', 'email')->ignore($this->id, 'id')],
            'phone' => ['required', 'string', Rule::unique('users', 'phone')->ignore($this->id, 'id')],
            'name' => ['required', 'string', 'min:2', 'max:255'],
 
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->routeIs('admin.patient.store')) {
            return $this->onCreate();
        } elseif (request()->routeIs('admin.patient.update')) {
            return $this->onUpdate();
        } else {
            return [];
        }
    }
}
