<div class="index-container rounded-border p-4">
    <h1 class="fs-4 text-light mb-4">Listar Suportes</h1>

    <div class="row align-items-center mb-4">
            <div class="col-auto">
                <p class="mb-0 bg-success text-white rounded px-3 py-2 border-0 shadow-sm">
                    <strong>Dúvidas:</strong> {{ $total }}
                </p>
            </div>

            <div class="col text-center">
                <form action="{{ route('supports.index') }}" class="d-flex justify-content-center">
                    <div class="input-group">
                        <input type="text" name="filter" value="{{ $filter['filter'] ?? '' }}"
                            class="form-control bg-white text-dark border-secondary"
                            placeholder="Pesquisar por dúvidas">
                        <button class="btn btn-primary d-flex align-items-center">
                            <i class="bi bi-search me-1"></i> Buscar
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-auto text-end">
                <a href="{{ route('supports.create') }}" class="btn btn-success d-flex align-items-center shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Nova dúvida
                </a>
            </div>
        </div>

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
                            <a style="text-decoration: none;" href="{{ route('replies.index', $support->id) }}">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a style="text-decoration: none;" href="{{ route('supports.edit', $support->id) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
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