<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BasicInfoRequest extends Request
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
            'org_spec' => 'required', 
            'org_name' => 'required',
            'title1' => 'required',
            'title2' => 'required',
            'title3' => 'required',
            'title4' => 'required',
            'subject1' => 'required',
            'subject2' => 'required',
            'subject3' => 'required',
            'subject4' => 'required',
        ];
    }
}
