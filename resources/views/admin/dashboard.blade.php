@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h1 class="text-center">📘 Panel de Administración</h1>
    <p class="text-center">Bienvenido, {{ Auth::user()->name }}</p>
</div>
@endsection
