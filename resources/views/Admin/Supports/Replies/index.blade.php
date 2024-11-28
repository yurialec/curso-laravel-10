@extends('Admin.Layouts.app')

@section('content')

<div class="details-container rounded-border p-4">
    <h1 class="fs-4 text-light mb-4">Detalhes da Dúvida</h1>

    <ul class="list-group mb-4">
        <li class="list-group-item bg-dark text-light">
            <strong>ID:</strong> {{ $support->id }}
        </li>
        <li class="list-group-item bg-dark text-light">
            <strong>Assunto:</strong> {{ $support->subject }}
        </li>
        <li class="list-group-item bg-dark text-light">
            <strong>Conteúdo:</strong> {{ $support->body }}
        </li>
        <li class="list-group-item bg-dark text-light">
            <strong>Status:</strong> {{ $support->status }}
        </li>
    </ul>

    <a href="{{ route('supports.index') }}" class="btn btn-primary btn-sm rounded-pill">
        Voltar para a Lista
    </a>
</div>

@endsection