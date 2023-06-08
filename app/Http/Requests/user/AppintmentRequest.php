<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AppintmentRequest extends FormRequest
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
            'date' => ['required'],
        ];
    }

    protected function onUpdate(): array
    {
        return [

        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->routeIs('patient.appointment.store')) {
            return $this->onCreate();
        } else {
            return [];
        }
    }
}
