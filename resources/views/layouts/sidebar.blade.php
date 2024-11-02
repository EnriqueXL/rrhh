<!-- Sidebar -->
<aside id="sidebar" class="col-2">
    <div class="d-flex align-items-center">
        <button class="toggle-btn" type="button">
            <i class="fas fa-bars"></i>
        </button>
        <div class="sidebar-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logos/mic.png') }}" alt="MicroTec" class="sidebar-logo-img">
            </a>
        </div>
    </div>
    
    <ul class="sidebar-nav list-unstyled">
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#empleados" aria-expanded="false" aria-controls="empleados">
                <i class="fas fa-user-friends icon"></i><span class="label">Empleados</span>
            </a>
            <ul id="empleados" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="{{ route('employees.index') }}" class="sidebar-link">Todos los empleados</a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('employees.create') }}" class="sidebar-link">Registrar</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="fas fa-tasks"></i><span class="label">Task</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                <i class="fas fa-shield-alt"></i><span class="label">Auth</span>
            </a>
            <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Login</a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">Register</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                <i class="fas fa-layer-group"></i><span class="label">Multi Level</span>
            </a>
            <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                        Two Links
                    </a>
                    <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Link 1</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Link 2</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="fas fa-bell"></i><span class="label">Notification</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link">
                <i class="fas fa-cog"></i><span class="label">Setting</span>
            </a>
        </li>
    </ul>

    <!-- Profile Dropdown (Similar to Settings Dropdown) -->
    <div class="sidebar-footer mt-auto">
        <div class="dropdown">
            <a class="sidebar-link dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle"></i> <span class="label">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</aside>