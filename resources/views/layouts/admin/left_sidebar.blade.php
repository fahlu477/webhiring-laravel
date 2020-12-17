<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            {{-- header --}}
            <li class="header">MAIN NAVIGATION</li>

            {{-- Dashboard --}}
            <li class="{{ active('admin.home') }}">
                <a href="{{ route('admin.home') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            {{-- Management User --}}
            <li class="{{ active('admin.user.*') }}">
                <a href="{{ route('admin.user.index') }}">
                    <i class="fa fa-user-circle-o"></i> <span>Management User</span>
                </a>
            </li>

            {{-- Management Experience --}}
            <li class="{{ active('admin.experience.*') }}">
                <a href="{{ route('admin.experience.index') }}">
                    <i class="fa fa-star-half-o "></i> <span>Management Experience</span>
                </a>
            </li>

            {{-- Management Program Study --}}
            <li class="{{ active('admin.program_study.*') }}">
                <a href="{{ route('admin.program_study.index') }}">
                    <i class="fa fa-book "></i> <span>Management Program Study</span>
                </a>
            </li>

            {{-- Management Job --}}
            <li class="{{ active('admin.job.*') }}">
                <a href="{{ route('admin.job.index') }}">
                    <i class="fa fa-edit"></i> <span>Management Job</span>
                </a>
            </li>

            {{-- Management Apply --}}
            <li class="{{ active('admin.apply.*') }}">
                <a href="{{ route('admin.apply.index') }}">
                    <i class="fa fa-list"></i> <span>List User Apply</span>
                </a>
            </li>
        </ul>

    </section>
</aside>
