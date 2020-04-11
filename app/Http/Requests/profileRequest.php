<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class profileRequest extends FormRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $rules = [
            'image' => 'image|mimes:png,jpeg|max:1024',
            'age' => 'required|min:18|max:50',
            'gendar' => 'required|string',
            'religion' => 'required|string',
            'mobile' => 'required|min:11|max:11|unique:profile,mobile',
            'nationality'   => 'required|string',
            'bio'   => 'required|string|max:500',
            'location'   => 'required|string|max:500',
            'additional_information'    => 'required|string|max:500',
        ];
                    

        return $rules;
       
    }
    public function messages()
    {


    }
}
