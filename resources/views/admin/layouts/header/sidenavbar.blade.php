<div class="sideNavBar">
    <ul>
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a> </li>
        <li><a href="{{ route('admin.appointment') }}">Appointment</a> </li>
        <li><a href="{{ route('admin.user') }}">User</a></li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>

</div>
