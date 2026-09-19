<style>
    .nav-item:hover {
        background: black;
        background-color: #49a942 !important;
    }
    
    .navbar-menu {
        width: 250px;
        z-index: 1002;
         background-color: #0b2d5c !important;
        /*background: -webkit-gradient(linear, left top, right top, from(#3f7c2a), to(#3f7c2a)) !important;*/
        border-right: none !important;
        bottom: 0;
        margin-top: 100px!important;
        position: fixed;
        top: 0;
        -webkit-box-shadow: 0 2px 4px rgba(15, 34, 58, .12);
        box-shadow: 0 2px 4px rgba(15, 34, 58, .12);
        padding: 0 0 calc(70px + 25px) 0;
        -webkit-transition: all .1s ease-out;
        transition: all .1s ease-out
    }
     [data-layout=horizontal] .menu-dropdown {
        position: absolute;
        min-width: 12rem;
        padding: .5rem 0;
        -webkit-box-shadow: 0 0 5px rgba(15, 34, 58, .15);
        box-shadow: 0 0 5px rgba(15, 34, 58, .15);
        -webkit-animation-name: DropDownSlide;
        animation-name: DropDownSlide;
        -webkit-animation-duration: .3s;
        animation-duration: .3s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        margin: 0;
        z-index: 1000;
        background-color: #0b2d5c;
          /* background: -webkit-gradient(linear, left top, right top, from(#3f7c2a), to(#3f7c2a)) !important; */
        background-clip: padding-box;
        border: 0 solid var(--vz-border-color);
        border-radius: .3rem;
        display: none
    }
       h1,h2,h3, h4, h5  {
     color: #398735 !important; 
    font-family: Nunito, sans-serif;
}
 .btn-primary {

        --vz-btn-color: #fff !important;
         --vz-btn-bg: #0b2d5c;

         --vz-btn-border-color: #1596cd;
            /*background: -webkit-gradient(linear, left top, right top, from(#3f7c2a), to(#3f7c2a)) !important;*/
        --vz-btn-hover-color: #fff;
        --vz-btn-hover-bg: #0b2d5c !important;
        --vz-btn-hover-border-color: #0b2d5c !important;
        /*--vz-btn-focus-shadow-rgb: 90, 140, 231;*/
        /*--vz-btn-active-color: #fff;*/
        /*--vz-btn-active-bg: #3f7c2a;*/
        /*--vz-btn-active-border-color: #3f7c2a;*/
        --vz-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        /*--vz-btn-disabled-color: #fff;*/
        /*--vz-btn-disabled-bg: #3f7c2a;*/
        /*--vz-btn-disabled-border-color: #3f7c2a;*/

        transition: all 0.4s;
        transition-timing-function: cubic-bezier(0.5, 3, 0, 1);
    }
    .btn:hover {
        color: #fff ;
        background-color: #398735 !important;
    }
    
    
   
    
    thead tr {
         background-color: #0b2d5c  !important;
           /*background: -webkit-gradient(linear, left top, right top, from(#3f7c2a), to(#3f7c2a)) !important;*/
        color: white;
        text-align: center;
    }

</style>

<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">

                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{ route('home') }}" class="logo logo-dark">
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="" height="80">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('assets/images/users/undraw_profile.webp') }}" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                    @auth
                                        <span>Welcome, {{ auth()->user()->full_name }}</span>
                                    @else
                                        <span>Welcome, Guest</span>
                                    @endauth
                                </span>


                                @auth
                                    @php
                                        $role = App\Models\User::select('users.id', 'roles.name')
                                            ->join('roles', 'users.role_id', '=', 'roles.id')
                                            ->where('users.id', auth()->id())
                                            ->first();
                                    @endphp
                                    <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">
                                        {{ $role->name ?? 'User' }}
                                    </span>
                                @endauth

                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">
                            Welcome
                            @auth
                                {{ auth()->user()->full_name }}
                            @else
                                Guest
                            @endauth
                        </h6>
                        <a class="dropdown-item" href="{{ route('profile.detail') }}"><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Profile</span></a>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}"><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle" data-key="t-logout">Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
