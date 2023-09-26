<h1>Listar suportes</h1>
<a href="{{ route('supports.create') }}">Cadastrar nova dúvida</a>
<br>
<br>
<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>Assunto</th>
            <th>Conteúdo</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    @foreach ($supports->items() as $support)
        <tbody>
            <tr>
                <td>{{ $support->id }}</td>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->body }}</td>
                <td>{{ getStatusSupport($support->status) }}</td>
                <td>
                    <button type="submit"><a href="{{ route('supports.show', $support->id) }}">Visualizar</a></button>
                    <button type="submit"><a href="{{ route('supports.edit', $support->id) }}">Editar</a></button>
                    <form action="{{ route('supports.destroy', $support->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        <tbody>
    @endforeach
</table>

<x-pagination :paginator="$supports" :appends="$filters" />
