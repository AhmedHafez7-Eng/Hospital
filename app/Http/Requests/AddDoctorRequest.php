<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDoctorRequest extends FormRequest
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
            'name' => 'required|max:70',
            'phone' => 'required|numeric',
            'spec' => 'required|not_in:-1',
            'roomNo' => 'required|numeric',
            'docImg' => 'required|mimes:jpeg,png,jpg'
        ];
    }
}