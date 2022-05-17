<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name'=>'required|max:20',
            'last_name'=>'required|max:25',
            'birthdate'=>'required',
            'email'=>'required|email|unique:customers,email,'.$this->id,
            'address'=>'required    ',
            'gender'=>'required',
            'hobby'=>'required',
            'mobile'=>'required|digits:10|numeric',
            'image'=>'required|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'we can not proceed without your Firstname.',
            'last_name.required' => 'we can not proceed without your Lastname.',
            'birthdate.required' => 'we can not proceed without your Birthdate.',
            'email.required' => 'we can not proceed without your Email.',
            'address.required' => 'we can not proceed without your Address',
            'gender.required' => 'we can not proceed without your gender.',
            'hobby.required' => 'we can not proceed without your hobby.',
            'mobile.required' => 'we can not proceed without your mobile.',
            'image.required' => 'we can not proceed without your image.',

        ];
    }
}
