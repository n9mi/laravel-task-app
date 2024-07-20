<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Task App</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">TA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown">
                    <i class="fas fa-table-columns"></i>
                    <span>Dashboard</span>
                </a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('tasks') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ url('/tasks') }}">Tasks</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
        </div>
    </aside>
</div>
