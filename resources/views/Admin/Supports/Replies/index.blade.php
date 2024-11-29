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
                    <li class="list-group-item bg-dark text-light mb-2 d-flex justify-content-between align-items-center">
                        <div>
                            <p>{{ $reply['content'] }}</p>
                            <small class="text-muted">
                                <small class="text-light">Respondido em
                                    {{ \Carbon\Carbon::parse($reply['created_at'])->format('d/m/Y H:i') }}
                                    por {{ $reply['user']['name'] }}
                                </small>
                            </small>
                        </div>
                        <form action="{{ route('replies.destroy', [$support->id, $reply['id']]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="mb-4">
        <h2 class="fs-5 text-light">Responder</h2>
        <form action="{{ route('replies.store') }}" method="POST" class="mt-3">
            @csrf
            <input type="hidden" name="support_id" value="{{ $support->id }}">

            <div class="mb-3">
                <label for="content" class="form-label text-light">Mensagem</label>
                <textarea name="content" id="content"
                    class="form-control bg-dark text-light @error('content') is-invalid @enderror" rows="5"
                    placeholder="Digite sua resposta aqui...">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success btn-sm">Enviar Resposta</button>
        </form>
    </div>

    <a href="{{ route('supports.index') }}" class="btn btn-primary btn-sm">
        Voltar para a Lista
    </a>
</div>

@endsection