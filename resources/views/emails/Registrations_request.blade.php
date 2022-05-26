@component('mail::message')
<h1 style="text-align: center">Demande De Registrations</h1>

<div style="text-align: center;font-weight: bold;color:blue">User</div>
<hr style="width: 80%;text-align: center;">
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Name</div>
    <div>{{$user_request['name']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">email</div>
    <div>{{$user_request['email']}}</div>
</div> 

<div style="text-align: center;font-weight:bold;color:blue">Entreprise</div>
<hr style="width: 80%;text-align: center;">
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Social Name</div>
    <div>{{$entreprise_request['social_name']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Commercial Name</div>
    <div>{{$entreprise_request['commercial_name']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Company Type</div>
    <div>{{$entreprise_request['company_type']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Ice Num</div>
    <div>{{$entreprise_request['ice_num']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Siret Num</div>
    <div>{{$entreprise_request['siret_num']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Adresse</div>
    <div>{{$entreprise_request['adresse']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Zip Code</div>
    <div>{{$entreprise_request['zip_code']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">City</div>
    <div>{{$entreprise_request['city']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Country</div>
    <div>{{$entreprise_request['country']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Phone</div>
    <div>{{$entreprise_request['phone']}}</div>
</div>
@if($entreprise_request['ismoroccan'] == 1)
    <div style="width: 100%;display:flex;justify-content:space-between">
        <div style="font-weight: bold">Maroccain</div>
        <div>Oui</div>
    </div>
@else 
    <div style="width: 100%;display:flex;justify-content:space-between">
        <div style="font-weight: bold">Maroccain</div>
        <div>Non</div>
    </div>
@endif
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Effective Total</div>
    <div>{{$entreprise_request['effective_total']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Date de creation</div>
    <div>{{$entreprise_request['iscreated']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Document CAU</div>
    <div><a href="/{{$entreprise_request['doc_cau']}}">CAU</a></div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Document Status</div>
    <div><a href="/{{$entreprise_request['doc_status_entreprise']}}">Status</a></div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Document Registre</div>
    <div><a href="/{{$entreprise_request['doc_registre']}}">Registre</a></div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Document CPC</div>
    <div><a href="/{{$entreprise_request['doc_cpc']}}">CPC</a></div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Activite Entreprise</div>
    <div>{{$entreprise_request['activite_entreprise']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Certificats</div>
    <div>{{$entreprise_request['certificats']}}</div>
</div>
<div style="width: 100%;display:flex;justify-content:space-between">
    <div style="font-weight: bold">Refferences Clients</div>
    <div><a href="/{{$entreprise_request['ref_clients']}}">Refferences Clients</a></div>
</div>


@component('mail::button', ['url' => 'http://127.0.0.1:8000/ValiderInscription/'.$entreprise_request['id'].'/s','color' => 'success'])
Accepter
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/ValiderInscription/'.$entreprise_request['id'].'/r','color' => 'red'])
Refuser
@endcomponent

<div style="text-align: center">SST Plateform</div>

@endcomponent
