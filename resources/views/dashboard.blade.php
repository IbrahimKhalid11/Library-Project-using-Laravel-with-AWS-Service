@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="text-center p-5" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
            <h1 style="color: #007bff;">Dashboard</h1>
            <p style="color: #6c757d;">Welcome, {{ "Ibrahim Khalid" }}!</p>
            {{-- <a href="{{ route('profile') }}" class="btn btn-primary mt-3" style="background-color: #007bff; border-color: #007bff;">Go to Profile</a> --}}
        </div>
    </div>
@endsection
<style>
    body {
        background-image:  url('{{ asset('images/bg.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        margin: 0;
    }
</style>
