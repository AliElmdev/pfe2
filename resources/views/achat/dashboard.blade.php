@extends('layouts.dashboard')
@section('navbar')

@include('includes.navbar_achat')

@endsection

@section('title')

@endsection

@section('content')
    @yield('contenuDashboardAchat')
@endsection