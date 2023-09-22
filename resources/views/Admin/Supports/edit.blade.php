<h1>Editar Dúvida <u>{{ $support->subject }}</u></h1>

@if ($errors->any)
    @foreach ($errors->all() as $error)
        <ul>
            <li>{{ $error }}</li>
        </ul>
    @endforeach
@endif

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="subject" value="{{ $support->subject }}"><br><br>
    <textarea rows="5" name="body" cols="15">{{ $support->body }}</textarea><br><br>
    <button type="submit" name="atualizar">Atualizat</button>
</form>
<p><a href="{{ route('supports.index') }}">Listar Dúvidas</a></p>
