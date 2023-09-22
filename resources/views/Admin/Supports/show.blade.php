<h1>Detalhes da Dúvida</h1>
<ul>
    <li>{{ $support->id }}</li>
    <li>{{ $support->subject }}</li>
    <li>{{ $support->body }}</li>
    <li>{{ $support->status }}</li>
</ul>
<p><a href="{{ route('supports.index') }}">Listar Dúvidas</a></p>
