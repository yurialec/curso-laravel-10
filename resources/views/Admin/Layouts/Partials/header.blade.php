<div class="header-container rounded p-3 mb-3 bg-dark">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('supports.index') }}"
                class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none text-light">
                Home
            </a>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-body-emphasis text-decoration-none text-light dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu text-small">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            Profile
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>