<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'title'=>['required','string', 'max:100'],
            'title_service'=>['required','string', 'max:100'],
            'phone_user'=>['required','string', 'max:30'],
            'lang_user'=>['string', 'max:100'],
            'social_name'=>['required','string', 'max:100'],
            'commercial_name'=>['required','string', 'max:100'],
            'company_type'=>['required','string', 'max:100'],
            'ice_num'=>['required','string', 'max:100'],
            'siret_num'=>['required','string', 'max:100'],
            'adresse'=>['required','string', 'max:250'],
            'zip_code'=>['required','string', 'max:100'],
            'city'=>['required','string', 'max:100'],
            'country'=>['required','string', 'max:100'],
            'phone'=>['required','string', 'max:100'],
            'ismoroccan'=>['required','boolean'],
            'iscreated'=>['required','date'],
            'effective_total'=>['required','string', 'max:100'],
            'doc_cau'=>['required','string', 'max:200'],
            'doc_status_entreprise'=>['required','string', 'max:200'],
            'doc_registre'=>['required','string', 'max:200'],
            'doc_cpc'=>['required','string', 'max:200'],
            'activite_entreprise'=>['required','string', 'max:100'],
            'certificats'=>['required','string', 'max:100'],
            'ref_clients'=>['required','string', 'max:200'],
            'rules_accept'=>['required','boolean'],
        ];
    }
}