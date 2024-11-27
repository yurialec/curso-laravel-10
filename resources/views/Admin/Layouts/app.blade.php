<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Importação do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Importação do arquivo CSS customizado -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #121212;
            color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .content {
            padding: 20px;
            margin: 20px;
            background-color: #1f1f1f;
            border-radius: 10px;
            border: 1px solid #2e2e2e;
        }

        footer {
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            background-color: #1f1f1f;
            border-radius: 10px;
            border: 1px solid #2e2e2e;
        }

        a {
            color: #90caf9;
        }

        a:hover {
            color: #bbdefb;
        }

        hr {
            border-top: 1px solid #2e2e2e;
        }

        .rounded-border {
            border-radius: 10px;
            border: 1px solid #2e2e2e;
        }

        .header-container {
            background-color: #1f1f1f;
            border-radius: 10px;
            border: 1px solid #2e2e2e;
        }

        .text-light {
            color: #f0f0f0 !important;
        }

        .index-container {
            background-color: #1f1f1f;
            border-radius: 10px;
            border: 1px solid #2e2e2e;
        }

        .table-dark th,
        .table-dark td {
            color: #f0f0f0;
            border-color: #2e2e2e;
        }

        .table-dark tbody tr:hover {
            background-color: #343434;
        }

        .pagination {
            justify-content: center;
        }

        .page-item {
            margin: 0 5px;
        }

        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .page-item .page-link {
            color: #f0f0f0;
            background-color: #2e2e2e;
            border: 1px solid #444;
            border-radius: 5px;
            padding: 5px 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .page-item .page-link:hover {
            background-color: #343434;
            color: #fff;
        }

        .page-item.disabled .page-link {
            background-color: #1f1f1f;
            color: #6c757d;
            border-color: #2e2e2e;
        }

        .details-container {
            background-color: #1f1f1f;
            border-radius: 10px;
            border: 1px solid #2e2e2e;
        }

        .list-group-item {
            border: 1px solid #2e2e2e;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .form-container {
            background-color: #1f1f1f;
            border-radius: 10px;
            border: 1px solid #2e2e2e;
        }

        .form-control {
            border-radius: 5px;
        }

        textarea::placeholder,
        input::placeholder {
            color: #6c757d;
        }

        .alert-success {
            background-color: #1f1f1f;
            color: #90ee90;
            border: 1px solid #28a745;
        }

        .alert-success .btn-close {
            color: #fff;
            opacity: 0.8;
        }

        .alert-success .btn-close:hover {
            color: #90ee90;
            opacity: 1;
        }
    </style>
    <title>Supports</title>
</head>

<body>
    <section>
        <header>
            @yield('header')
        </header>
        <div class="content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @yield('content')
        </div>

        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1"
            aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark text-light">
                    <div class="modal-header border-secondary">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmação de Exclusão</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja excluir o item <strong id="delete-item-name"></strong>?</p>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-secondary btn-sm rounded-pill"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-pill"
                            id="confirm-delete-button">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    let deleteForm = null;

    function confirmDelete(id, name) {
        document.getElementById('delete-item-name').textContent = name;

        deleteForm = document.getElementById(`delete-form-${id}`);

        const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
        deleteModal.show();
    }

    document.getElementById('confirm-delete-button').addEventListener('click', function () {
        if (deleteForm) {
            deleteForm.submit();
        }
    });
</script>

</html>