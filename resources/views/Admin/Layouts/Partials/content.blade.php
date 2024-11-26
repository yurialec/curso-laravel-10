<div class="index-container rounded-border p-4">
    <h1 class="fs-4 text-light mb-4">Listar Suportes</h1>

    <div class="table-responsive">
        <table class="table table-dark table-striped rounded-border">
            <thead>
                <tr>
                    <th>Assunto</th>
                    <th>Status</th>
                    <th>Comentário</th>
                    <th>Interações</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="table table-dark">
                @foreach ($supports->items() as $support)
                    <tr>
                        <td>{{ $support->subject }}</td>
                        <td>
                            <x-status-support :status="$support->status" />
                        </td>
                        <td> ASDFG </td>
                        <td>Lista de usuários</td>
                        <td>
                            <a style="text-decoration: none;" href="{{ route('supports.show', $support->id) }}">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a style="text-decoration: none;" href="{{ route('supports.edit', $support->id) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('supports.destroy', $support->id) }}" method="POST" class="d-inline"
                                id="delete-form-{{ $support->id }}">
                                @csrf
                                @method('DELETE')
                                <a href="#" class="text-danger" style="text-decoration: none;"
                                    onclick="confirmDelete({{ $support->id }}, '{{ $support->subject }}')">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        <x-pagination :paginator="$supports" :appends="$filters" />
    </div>
</div>