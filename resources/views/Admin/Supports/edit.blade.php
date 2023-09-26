<h1>Editar Dúvida <u>{{ $support->subject }}</u></h1>

<x-alert />

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @method('PUT')
    @include('Admin.Supports.partials.form', [
        'support' => $support,
    ])
</form>
<p><a href="{{ route('supports.index') }}">Listar Dúvidas</a></p>
