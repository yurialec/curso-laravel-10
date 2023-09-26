<div class="alert alert-danger">
    @if ($errors->any)
        @foreach ($errors->all() as $error)
            <ul>
                <li>{{ $error }}</li>
            </ul>
        @endforeach
    @endif
</div>
