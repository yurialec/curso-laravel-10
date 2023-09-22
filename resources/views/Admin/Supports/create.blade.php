<h1>Cadastrar nova dúvida</h1>

@if ($errors->any)
    @foreach ($errors->all() as $error)
        <ul>
            <li>{{ $error }}</li>
        </ul>
    @endforeach
@endif

<form action="{{ route('supports.store') }}" method="POST">
    @csrf()
    <input type="text" name="subject" placeholder="Título da dúvida" value="{{ old('subject') }}">
    <textarea rows="5" cols="30" name="body">{{ old('body') }}</textarea>
    <button type="submit" value="cadastrar">Cadastrar</button>
</form>
