<div class="nav-wrapper">
    <div class="nav-bar">
        <div class="logo-section">
            <img src="{{ asset('assets/images/appointment.png') }}" alt="Appointment System">
            <div class="logo-text">Appointment System</div>
        </div>
        <div class="slogan-section">
            Effortless scheduling, streamlined appointments.
            @if (Auth::check())
                <a href="">Dashboard</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @else
            <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    </div>
</div>
