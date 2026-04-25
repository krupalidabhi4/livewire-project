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
<body class="bg-light">

    <div class="min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="w-100" style="max-width: 440px;">
            <div class="text-center mb-4">
                <h4 class="fw-bold">{{ config('app.name', 'Laravel') }}</h4>
            </div>
            {{ $slot }}
        </div>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
