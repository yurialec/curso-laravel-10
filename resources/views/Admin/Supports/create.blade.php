<h1>Cadastrar nova dúvida</h1>
<x-alert />
<form action="{{ route('supports.store') }}" method="POST">
    @include('Admin.Supports.partials.form')
</form>
