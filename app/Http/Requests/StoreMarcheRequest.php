<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMarcheRequest extends FormRequest
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
            'titre_input'=> ['required', 'string', 'max:255'],
            'desc_input'=> ['required', 'string'],
            'categ_input'=> ['required'],
            'file_charge'=>['required'],
        ];
    }
}
