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

            'name'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=> ['required', 'string', 'min:8', 'confirmed'],
            'title'=>['required'],
            'service_title'=>['required'],
            'phone'=>['required','string', 'max:30'],
            'lang',
            'social_name'=>['required'],
            'commercial_name'=>['required'],
            'company_type'=>['required'],
            'ice_num'=>['required'],
            'siret_num'=>['required'],
            'adresse'=>['required'],
            'zip_code'=>['required'],
            'city'=>['required'],
            'country'=>['required'],
            'phone'=>['required'],
            'ismoroccan'=>['required'],
            'iscreated'=>['required'],
            'effective_total'=>['required'],
            'doc_cau'=> 'max:8240',
            'doc_status_entreprise'=> 'max:8240',
            'doc_registre'=> 'max:8240',
            'doc_cpc'=> 'max:8240',
            'activite_entreprise',
            'certificats'=>['required'],
            'ref_clients'=> 'max:8240',
            'rules_accept'=>['required'],

            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'title',
            // 'title_service',
            // 'phone_user'=>['required','string', 'max:30'],
            // 'lang_user'=>['string', 'max:100'],
            // 'social_name',
            // 'commercial_name',
            // 'company_type',
            // 'ice_num',
            // 'siret_num',
            // 'adresse'=>['required','string', 'max:250'],
            // 'zip_code',
            // 'city',
            // 'country',
            // 'phone',
            // 'ismoroccan'=>['required','boolean'],
            // 'iscreated'=>['required','date'],
            // 'effective_total',
            // 'doc_cau',
            // 'doc_status_entreprise',
            // 'doc_registre',
            // 'doc_cpc',
            // 'activite_entreprise',
            // 'certificats',
            // 'ref_clients',
            // 'rules_accept'=>['required','boolean'],
        ];
    }
}