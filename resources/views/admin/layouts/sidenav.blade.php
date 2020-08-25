<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('dashboard') }}">
                    <h2 class="brand-text mb-0"><img src="{{ url('images/logo.png') }}" alt="" style="width: 24px"> LFC Admin</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main pb-3" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ @$sidenav['dashboard'] }} nav-item"><a href="{{ route('dashboard') }}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
            <li class=" navigation-header"><span>Administration</span></li>
            <li class="{{ @$sidenav['admin'] }}  nav-item"><a href="{{ route('admin.index') }}"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Admins">Admins</span></a></li>
            <li class="{{ @$sidenav['role'] }}  nav-item"><a href="{{ route('role.index') }}"><i class="feather icon-user-check"></i><span class="menu-title" data-i18n="Admins">Roles</span></a></li>

            <li class=" navigation-header"><span>Resource</span></li>
            <li class="{{ @$sidenav['wsf_outline'] }}  nav-item"><a href="{{ route('wsf.index') }}"><i class="fa fa-file-pdf-o"></i><span class="menu-title" data-i18n="WSF Outline">WSF Outline</span></a></li>
            <li class="{{ @$sidenav['pages'] }}  nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Pages">Pages</span></a></li>
            <li class="{{ @$sidenav['sermons'] }}  nav-item"><a href="#"><i class="feather icon-plus-circle"></i><span class="menu-title" data-i18n="Sermons">Sermons</span></a></li>
            <li class="{{ @$sidenav['service'] }}  nav-item"><a href="{{ route('service.index') }}"><i class="feather icon-cloud"></i><span class="menu-title" data-i18n="Testimony">Services</span></a></li>
            <li class="{{ @$sidenav['site_info'] }}  nav-item"><a href="{{ route('site.info') }}"><i class="feather icon-info"></i><span class="menu-title" data-i18n="Site Info">Site Info</span></a></li>
            <li class="{{ @$sidenav['slider'] }}  nav-item"><a href="{{ route('sliders') }}"><i class="feather icon-layers"></i><span class="menu-title" data-i18n="Slider">Slider</span></a></li>
            <li class="{{ @$sidenav['testimony'] }}  nav-item"><a href="#"><i class="feather icon-heart"></i><span class="menu-title" data-i18n="Testimony">Testimony</span></a></li>

            <li class=" navigation-header"><span>Utility</span></li>
            <li class="{{ @$sidenav['files'] }}  nav-item"><a href="{{ route('files') }}"><i class="feather icon-file"></i><span class="menu-title" data-i18n="Gallery">Files</span></a></li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->