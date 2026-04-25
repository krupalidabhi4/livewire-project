<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/build/assets/app-EfEBHmqD.css">
    <script type="module" src="/build/assets/app-BbzB21r_.js"></script>
    @livewireStyles
</head>
<body>

    {{-- Header / Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid px-4">
            {{-- Brand --}}
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                <i class="bi bi-layers-fill me-1"></i>
                {{ config('app.name', 'Laravel') }}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                {{-- Left nav links --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                           href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('project.*') ? 'active' : '' }}"
                           href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-folder2-open me-1"></i>Projects
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li>
                                <a class="dropdown-item" href="{{ route('project.list') }}">
                                    <i class="bi bi-list-ul me-1"></i>All Projects
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('project.create') }}">
                                    <i class="bi bi-plus-circle me-1"></i>Add Project
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                {{-- Right: user info + logout --}}
                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <li class="nav-item">
                        <span class="navbar-text text-light">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ Auth::user()->name }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">
                                <i class="bi bi-box-arrow-right me-1"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Toast notifications --}}
    <div id="toast-container" style="position:fixed;top:70px;right:16px;z-index:9999;min-width:280px"></div>

    {{-- Page content --}}
    <div class="container-fluid py-4 px-4">
        {{ $slot }}
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('notify', ({ message, type }) => {
                const bg   = type === 'danger' ? 'bg-danger' : (type === 'warning' ? 'bg-warning' : 'bg-success');
                const html = `<div class="alert ${bg} text-white alert-dismissible shadow fade show" role="alert">
                                ${message}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                              </div>`;
                const container = document.getElementById('toast-container');
                container.insertAdjacentHTML('afterbegin', html);
                setTimeout(() => container.querySelector('.alert')?.remove(), 4000);
            });
        });
    </script>
</body>
</html>
