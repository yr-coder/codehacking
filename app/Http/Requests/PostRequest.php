<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title'=>'required',
            'body'=>'required',
            'photo_id' => 'required',
            'category_id' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Please choose category',
            'photo_id.required' => 'Please choose a file for photo'
        ];
    }
}
