<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
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
    protected function onUpdate(): array
    {
        return [

            'header' => ['required', 'string', 'min:2', 'max:255'],
            'content' => ['required', 'string', 'min:2', 'max:500'],

        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    { 
        if (request()->routeIs('admin.aboutUs.update')) {
            return $this->onUpdate();
        } else {
            return [];
        }
    }
}
