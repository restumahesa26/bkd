<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <img alt="image" src="{{ url('logo-unib.png') }}" style="width: 50px;">
        <a href="index.html">FKIK UNIB</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <img alt="image" src="{{ url('logo-unib.png') }}" style="width: 50px;">
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown @if (Route::is('dashboard')) active @endif">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-columns"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">{{ Auth::user()->role }}</li>
        <li class="dropdown @if (Route::is('profile.*')) active @endif">
            <a href="{{ route('profile.index') }}" class="nav-link"><i class="fas fa-user   "></i><span>Profile</span></a>
        </li>
        @if (Auth::user()->role === 'ADMIN')
        <li class="dropdown @if (Route::is('mata-kuliah.*')) active @endif">
            <a href="{{ route('mata-kuliah.index') }}" class="nav-link"><i class="fas fa-book-open"></i><span>Mata Kuliah</span></a>
        </li>
        <li class="dropdown @if (Route::is('data-dosen.*')) active @endif">
            <a href="{{ route('data-dosen.index') }}" class="nav-link"><i class="fas fa-id-card"></i><span>Dosen</span></a>
        </li>
        <li class="dropdown @if (Route::is('sk.*')) active @endif">
            <a href="{{ route('sk.index') }}" class="nav-link"><i class="fas fa-newspaper"></i><span>SK</span></a>
        </li>
        <li class="dropdown @if (Route::is('data-pimpinan.*')) active @endif">
            <a href="{{ route('data-pimpinan.index') }}" class="nav-link"><i class="fas fa-user-cog"></i><span>Pimpinan</span></a>
        </li>
        @elseif (Auth::user()->role === 'DOSEN')
        <li class="dropdown @if (Route::is('kinerja.*')) active @endif">
            <a href="{{ route('kinerja.index') }}" class="nav-link"><i class="fas fa-newspaper"></i><span>Kinerja</span></a>
        </li>
        @endif
      </ul>
    </aside>
  </div>
