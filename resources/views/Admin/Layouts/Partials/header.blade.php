<div class="header-container rounded-border p-3 mb-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-auto">
                <p class="mb-0 bg-success text-white rounded px-3 py-2 border border-success">
                    Dúvidas: {{ $total }}
                </p>
            </div>

            <div class="col text-center">
                <form action="{{ route('supports.index') }}" class="d-flex justify-content-center">
                    <input type="text" name="filter" value="{{ $filter['filter'] ?? '' }}"
                        class="form-control me-2 bg-dark text-light border-secondary" placeholder="Pesquisar">
                    <button class="btn btn-primary btn-sm rounded-pill d-flex align-items-center">
                        <i class="bi bi-search me-1"></i>
                    </button>
                </form>
            </div>

            <div class="col-auto text-end">
                <a href="{{ route('supports.create') }}" class="btn btn-primary btn-sm rounded-pill">
                    Cadastrar nova dúvida
                </a>
            </div>
        </div>
    </div>
</div>