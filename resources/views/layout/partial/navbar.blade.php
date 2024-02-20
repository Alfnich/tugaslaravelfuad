<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Fuad</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/student/all">Student</a>
        </li>
            <li class="nav-item">
          <a class="nav-link" href="/kelas">Kelas</a>
        </li>
      </ul>
      <ul>
          @auth
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Hi, {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/dashboard/dashboard">Dashboard</a></li>
                        <li>
                            <form method="post" action="/login/logout">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                    <form class="d-flex gap-2" role="search">
                          <a class="btn btn-success fw-semibold" href="/login">Login</a>
                          <a class="btn btn-success fw-semibold" href="/register">Register</a>
                    </form>
          @endauth
       </ul>
    </div>
  </div>
</nav>
