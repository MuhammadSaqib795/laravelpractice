
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Company Management')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('employees.index') }}">
            Company Management
        </a>

        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="{{ route('employees.index') }}">
                Employees
            </a>

            <a class="nav-link" href="{{ route('departments.index') }}">
                Departments
            </a>
        </div>
    </div>
</nav>

<main class="container py-4">
    @yield('content')
</main>

</body>
</html>
