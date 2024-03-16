<div class="card form-container mt-5">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('students.add') ? 'active' : '' }}" href="{{ route('students.add') }}"><i class="fa-solid fa-graduation-cap"></i> Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('teacher.add') ? 'active' : ''}}" href="{{ route('teacher.add') }}"><i class="fa-solid fa-chalkboard-user"></i> Teacher</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('parents.add') ? 'active' : '' }}" href="{{ route('parents.add') }}" href="{{ route('parents.add') }}" tabindex="-1" aria-disabled="true"><i class="fa-solid fa-person-breastfeeding"></i> Parents</a>
        </li>
      </ul>
    </div>