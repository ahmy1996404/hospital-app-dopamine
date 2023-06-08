<?php

namespace App\Http\Requests\patient;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsMessageRequest extends FormRequest
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


            'name' => ['required', 'string', 'min:2', 'max:255'],

            'email' => ['required', 'email', 'min:2', 'max:255'],
            'phone' => ['required', 'string', 'min:2', 'max:255'],
            'subject' => ['required', 'string', 'min:2', 'max:255'],
            'message' => ['required', 'string', 'min:2', 'max:500'],



        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->routeIs('patient.contact.message.store')) {

            return $this->onCreate();
        } else {
            return [];
        }
    }
}
