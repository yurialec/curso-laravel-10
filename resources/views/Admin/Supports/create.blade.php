@extends('Admin.Layouts.app')

@section('content')
<div class="form-container rounded-border p-4">
    <h1 class="fs-4 text-light mb-4">Cadastrar Nova Dúvida</h1>
    <form action="{{ route('supports.store') }}" method="POST">
        @include('Admin.Supports.partials.form')
    </form>
</div>
@endsection