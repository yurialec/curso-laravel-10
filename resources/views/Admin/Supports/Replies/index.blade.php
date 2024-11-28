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

    <div>
        <h3 class="mt-4">Respostas</h3>
        @if(empty($replies))
            <p class="text-muted">Ainda não há respostas para esta dúvida.</p>
        @else
            <ul class="list-group">
                @foreach ($replies as $reply)
                    <li class="list-group-item bg-dark text-light mb-2">
                        <p>{{ $reply['content'] }}</p>
                        <small class="text-muted">
                            <small class="text-light">Respondido em
                                {{$reply['created_at']}}
                                por {{ $reply['user']['name'] }}
                            </small>
                        </small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="mb-4">
        <h2 class="fs-5 text-light">Responder</h2>
        <form action="{{ route('replies.store') }}" method="POST" class="mt-3">
            @csrf
            <div class="mb-3">
                <label for="body" class="form-label text-light">Mensagem</label>
                <input type="hidden" name="support_id" value="{{$support->id}}">
                <textarea name="content" id="content" class="form-control bg-dark text-light" rows="5"
                    placeholder="Digite sua resposta aqui..." required></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-sm">Enviar Resposta</button>
        </form>
    </div>

    <a href="{{ route('supports.index') }}" class="btn btn-primary btn-sm">
        Voltar para a Lista
    </a>
</div>

@endsection