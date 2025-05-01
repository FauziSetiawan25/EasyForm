<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MyApp</a>
    @auth
    <form method="POST" action="{{ url('/logout') }}">
        @csrf
        <button class="btn btn-outline-danger">Logout</button>
    </form>
    @endauth
  </div>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>
