<div class="header-container rounded-border p-3 mb-3">
    <div class="container">
        <div class="row align-items-center">
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
    </div>
</div>