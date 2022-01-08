<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'social_name',
        'commercial_name',
        'company_type',
        'ice_num',
        'siret_num',
        'adresse',
        'zip_code',
        'city',
        'country',
        'phone',
        'ismoroccan',
        'iscreated',
        'effective_total',
        'doc_cau',
        'doc_status_entreprise', 
        'doc_registre',
        'doc_cpc',
        'activite_entreprise',
        'certificats',
        'ref_clients',
        'rules_accept',
    ];

    public $guarded=[];

    public function user(){
        return $this->belongsTo('User');
    }
}
