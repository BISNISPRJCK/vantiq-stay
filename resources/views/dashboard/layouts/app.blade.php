<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('styles')
</head>
<body>

<div class="wrapper">

    @include('dashboard.layouts.partials.navbar')

    @include('dashboard.layouts.partials.sidebar')

    <div class="content-wrapper p-4">
        @yield('content')
    </div>

    @include('dashboard.layouts.partials.footer')

</div>

@include('dashboard.layouts.partials.scripts')

</body>
</html>