<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrudsRequest extends FormRequest
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
            'name' => 'required|min:5|max:255',
            'gender' => 'required|min:5|max:255',
            'phone' => 'required|min:5|max:255',
            'email' => 'required|max:255|unique:cruds,email,' . $this->crud,
            'address' => 'required|min:5|max:255',
            'nation' => 'required|min:5|max:255',
            'dob' => 'required',
            'ed_bg' => 'required|min:5|max:255',
            'contact_mode' => 'required|min:5|max:255'
        ];
    }
}
