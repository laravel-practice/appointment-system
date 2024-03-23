<div class="nav-wrapper">
    <div class="nav-bar">
        <div class="logo-section">
            <img src="{{ asset('assets/images/appointment.png') }}" alt="Appointment System">
            <div class="logo-text">Appointment System</div>
        </div>
        <div class="slogan-section">
            Effortless scheduling, streamlined appointments.
            <a href="{{ url('/') }}">Make an Appointment</a>

            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

        </div>
    </div>
</div>
