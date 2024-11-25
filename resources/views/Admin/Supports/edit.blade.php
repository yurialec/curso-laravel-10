@extends('Admin.Layouts.app')

@section('content')
<div class="form-container rounded-border p-4">
    <h1 class="fs-4 text-light mb-4">Editar Dúvida: <u>{{ $support->subject }}</u></h1>

    <form action="{{ route('supports.update', $support->id) }}" method="POST">
        @method('PUT')
        @include('Admin.Supports.partials.form', ['support' => $support,])
    </form>
    <a href="{{ route('supports.index') }}" class="btn btn-secondary btn-sm rounded-pill mt-3">
        Voltar para a Lista
    </a>
</div>
@endsection