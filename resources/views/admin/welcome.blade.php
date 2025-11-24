@extends('layouts.master')

@section('title', 'Welcome')
@section('page-title', 'Kantor HAHA HIHI')

@section('content')
<div class="text-center mt-20">
    <h1 class="text-4xl font-bold text-emerald-700 dark:text-emerald-300">
        Selamat Datang, {{ $name }}
    </h1>
    <p class="mt-4 text-gray-600 dark:text-gray-300">
        Anda berhasil login sebagai administrator.
    </p>
</div>
@endsection