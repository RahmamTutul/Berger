<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
        <a class="nav-link active" href="{{ url('/') }}">
            <i class="mdi mdi-home menu-icon "></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/diary/index')}}">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Diaries</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/paint/index')}}">
            <i class="mdi mdi-emoticon menu-icon"></i>
            <span class="menu-title">Paints</span>
        </a>
        </li>
    </ul>
</nav>