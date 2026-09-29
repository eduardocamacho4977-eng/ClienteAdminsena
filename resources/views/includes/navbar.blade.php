<nav class="navbar navbar-expand-lg navbar-dark" style="background: #00A651;">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center me-3" href="{{ url('/') }}">
      <img src="{{ asset('image/logo sena.png') }}" alt="Logo SENA" style="height: 40px; margin-right: 8px; border-radius: 50%;">
      <span style="color: #ffffff; font-weight: bold;">Sena</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto align-items-center">
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}" style="color: #ffffff;">Sobre nosotros</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}" style="color: #ffffff;">Contacto</a></li>
      </ul>

      <form action="{{ route('search') }}" method="GET" class="d-flex me-2">
        <input class="form-control me-2" type="search" name="search" placeholder="Buscar..." value="{{ request('search') }}">
        <button class="btn btn-outline-light" type="submit">Buscar</button>
      </form>

      <ul class="navbar-nav ms-auto align-items-center">
        @auth
          @php
            $currentAdminRoute = Route::currentRouteName();
            $adminMenuLabel = 'Administración';

            if ($currentAdminRoute === 'administracion') {
                $adminMenuLabel = 'Administración';
            } elseif (in_array($currentAdminRoute, ['area.index', 'area.create', 'area.show', 'area.edit'])) {
                $adminMenuLabel = 'Áreas';
            } elseif (in_array($currentAdminRoute, ['training_center.index', 'training_center.create', 'training_center.show', 'training_center.edit'])) {
                $adminMenuLabel = 'Centros';
            } elseif (in_array($currentAdminRoute, ['course.index', 'course.create', 'course.show', 'course.edit'])) {
                $adminMenuLabel = 'Cursos';
            } elseif (in_array($currentAdminRoute, ['teacher.index', 'teacher.create', 'teacher.show', 'teacher.edit'])) {
                $adminMenuLabel = 'Profesores';
            } elseif (in_array($currentAdminRoute, ['apprentice.index', 'apprentice.create', 'apprentice.show', 'apprentice.edit'])) {
                $adminMenuLabel = 'Aprendices';
            } elseif (in_array($currentAdminRoute, ['computer.index', 'computer.create', 'computer.show', 'computer.edit'])) {
                $adminMenuLabel = 'Computadoras';
            }
          @endphp

          <li class="nav-item dropdown me-2">
            <a class="nav-link dropdown-toggle btn btn-light btn-sm px-3" href="#" id="adminModulesMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #00A651; border-radius: 8px; font-weight: 600;">
              {{ $adminMenuLabel }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminModulesMenu">
              <li><a class="dropdown-item" href="{{ route('administracion') }}">Vista administración</a></li>
              <li><a class="dropdown-item" href="{{ route('area.index') }}">Áreas</a></li>
              <li><a class="dropdown-item" href="{{ route('training_center.index') }}">Centros</a></li>
              <li><a class="dropdown-item" href="{{ route('course.index') }}">Cursos</a></li>
              <li><a class="dropdown-item" href="{{ route('teacher.index') }}">Profesores</a></li>
              <li><a class="dropdown-item" href="{{ route('apprentice.index') }}">Aprendices</a></li>
              <li><a class="dropdown-item" href="{{ route('computer.index') }}">Computadoras</a></li>
            </ul>
          </li>

          @php
            $userRoleLabel = ucfirst(auth()->user()->getEffectiveRole());
            $roles = [
                ['value' => 'administrador', 'label' => 'Administrador'],
                ['value' => 'instructor', 'label' => 'Instructor'],
                ['value' => 'aspirante', 'label' => 'Aspirante'],
                ['value' => 'aprendiz', 'label' => 'Aprendiz'],
            ];
          @endphp

          <li class="nav-item dropdown me-2">
            <a class="nav-link dropdown-toggle btn btn-light btn-sm px-3" href="#" id="roleMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #00A651; border-radius: 8px; font-weight: 600;">
              {{ $userRoleLabel }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="roleMenu">
              @foreach($roles as $role)
                <li>
                  <form action="{{ route('role.switch') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="{{ $role['value'] }}">
                    <button type="submit" class="dropdown-item {{ auth()->user()->getEffectiveRole() === $role['value'] ? 'active fw-bold' : '' }}">
                      {{ $role['label'] }}
                    </button>
                  </form>
                </li>
              @endforeach
            </ul>
          </li>

          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn nav-link text-white border-0 bg-transparent" style="cursor: pointer;">
                Cerrar sesión
              </button>
            </form>
          </li>
        @endauth

        @guest
          <li class="nav-item"><a class="nav-link btn btn-outline-light btn-sm px-3" href="{{ route('login') }}" style="color: #2fc43b;">Inicio de sesión</a></li>
        @endguest
      </ul>
    </div>
  </div>
</nav>