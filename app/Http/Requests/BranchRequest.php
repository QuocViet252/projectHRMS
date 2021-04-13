<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            
            'phone_branch'=>'digits:10',
        ];
    }
    public function messages()
    {
        return [
            'digits'=>'Số điện thoại gồm chữ số và 10 chữ số',
        ];
    }
}
