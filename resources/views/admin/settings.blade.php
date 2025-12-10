@extends('layouts.admin')

@section('title', 'Settings - Scentora')
@section('page_title', 'Settings')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
@endpush

@section('content')
<div class="admin-dashboard-page">

    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">Settings</h2>
        </div>
        <div class="admin-card-body">
            <p>Settings configuration will be available here.</p>
        </div>
    </div>
</div>
@endsection

