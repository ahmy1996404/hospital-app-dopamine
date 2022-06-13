<?php

namespace App\Http\Requests\doctor;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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


            'diagnosis' => ['required', 'string', 'min:2', 'max:255'],

            'report_details' => ['required', 'string', 'min:2', 'max:255'],



        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->routeIs('doctor.appointment.report.store')) {
            return $this->onCreate();
        }  else {
            return [];
        }
    }
}
