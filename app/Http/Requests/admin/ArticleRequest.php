<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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


            'header' => ['required', 'string', 'min:2', 'max:255'],
            'content' => ['required', 'string', 'min:2'],
            'category_id' => ['required'],
            'thumbnail_img' => ['required'],
            'header_img' => ['required'],



        ];
    }

    protected function onUpdate(): array
    {
        return [

            'header' => ['required', 'string', 'min:2', 'max:255'],
            'content' => ['required', 'string', 'min:2'],
            'category_id' => ['required'],
            'thumbnail_img' => ['required'],
            'header_img' => ['required'],
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->routeIs('admin.article.store')) {
            return $this->onCreate();
        } elseif (request()->routeIs('admin.article.update')) {
            return $this->onUpdate();
        } else {
            return [];
        }
    }
}
