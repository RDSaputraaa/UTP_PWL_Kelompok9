@extends('layouts.navbar_user')

@section('title', 'Dashboard User')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-sm p-4">
        <h3>Selamat datang, {{ auth()->user()->name }}!</h3>

        <p class="text-muted mb-2">
            Kamu berhasil login sebagai User.
        </p>

        <span class="badge bg-success align-self-start">
            Pengguna
        </span>
    </div>
</div>
@endsection