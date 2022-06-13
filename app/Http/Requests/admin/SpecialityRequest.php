<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SpecialityRequest extends FormRequest
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
        



        ];
    }

    protected function onUpdate(): array
    {
        return [

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
        if (request()->routeIs('admin.speciality.store')) {
            return $this->onCreate();
        } elseif (request()->routeIs('admin.speciality.update')) {
            return $this->onUpdate();
        } else {
            return [];
        }
    }
}
