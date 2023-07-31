<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') . Administration</title>
  <link rel="stylesheet" href="{{ asset('assets/bootstrap') }}/css/bootstrap.min.css" />
</head>
<body>
  @php
    $routeName = request()->route();
  @endphp
  <nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('admin.property.index') }}">Agence</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a @class(['nav-link', 'active' => $routeName->getName() === 'admin.property.index']) href="{{ route('admin.property.index') }}">Accueil</a>
          </li>

        </ul>
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
              {{-- {{ Illuminate\Support\Facades\Auth::user()->name }} --}}
              Admin
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <form action="" method="post">
                @method("delete")
                @csrf
                <button class="nav-link" type="submit">Se déconnecter</button>
              </form>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @yield('content')
  </div>
  <script src="{{ asset('assets/bootstrap') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('assets/bootstrap') }}/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/jquery') }}/jquery-3.7.0.min.js"></script>
</body>
</html>