<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addAssistance extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'patient' => 'required',
            'nurse' => 'required',
            'date' => 'required',
            'medicines[]' => 'required'
        ];
    }
}
