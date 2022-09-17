<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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

            'profile_name' => 'required|min:5|max:25',
            'profile_title' => 'required|min:5|max:30',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'facebook' => 'required|url',
            'linkedin' => 'required|url',
            'github' => 'required|url',
            'profile_pic' => 'required|image',

        ];
    }
}