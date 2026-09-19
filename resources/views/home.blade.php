<style>
     .bg-dashboard {
        background-color: #49a942 !important;
    }

/* =========================================================
   ADMIN DASHBOARD CARDS
   Existing classes only
========================================================= */

.card-animate {
    position: relative;
    overflow: hidden;

    min-height: 135px;

    border: 1px solid rgba(11, 45, 92, 0.08) !important;
    border-radius: 12px !important;

    background:
        linear-gradient(
            135deg,
            #ffffff 0%,
            #ffffff 68%,
            #f3f8fc 100%
        ) !important;

    box-shadow:
        0 6px 22px rgba(11, 45, 92, 0.055) !important;

    -webkit-transition:
        transform .35s cubic-bezier(.22, 1, .36, 1),
        box-shadow .35s ease,
        border-color .35s ease;

    transition:
        transform .35s cubic-bezier(.22, 1, .36, 1),
        box-shadow .35s ease,
        border-color .35s ease;
}


/* green + navy top accent */

.card-animate::before {
    content: "";

    position: absolute;
    left: 0;
    top: 0;

    width: 100%;
    height: 4px;

    background:
        linear-gradient(
            90deg,
            #49a942 0%,
            #49a942 30%,
            #0b2d5c 30%,
            #0b2d5c 100%
        );

    transform: scaleX(.28);
    transform-origin: left center;

    -webkit-transition:
        transform .45s cubic-bezier(.22, 1, .36, 1);

    transition:
        transform .45s cubic-bezier(.22, 1, .36, 1);
}


/* decorative circle */

.card-animate::after {
    content: "";

    position: absolute;
    right: -48px;
    top: -52px;

    width: 125px;
    height: 125px;

    border-radius: 50%;

    background:
        rgba(73, 169, 66, 0.045);

    -webkit-transition:
        transform .45s ease,
        background .45s ease;

    transition:
        transform .45s ease,
        background .45s ease;

    pointer-events: none;
}


/* =========================================================
   CARD CONTENT
========================================================= */

.card-animate .card-body {
    position: relative;
    z-index: 2;

    padding: 20px 15px 14px !important;
}


/* dashboard title */

.card-animate h5,
.card-animate .card-title {
    margin-bottom: 18px !important;

    color: #344054 !important;

    font-size: 11px !important;
    font-weight: 700 !important;

    letter-spacing: .55px;

    text-transform: uppercase;
}


/* dashboard number */

.card-animate h4,
.card-animate h3,
.card-animate .fs-22,
.card-animate .fs-24 {
    color: #0b2d5c !important;

    font-weight: 700 !important;

    letter-spacing: -.4px;
}


/* =========================================================
   LINKS
========================================================= */

.card-animate a {
    position: relative;

    color: #0b2d5c !important;

    font-size: 12px;

    font-weight: 500;

    text-decoration: none !important;

    -webkit-transition:
        color .3s ease;

    transition:
        color .3s ease;
}


.card-animate a::after {
    content: "";

    position: absolute;

    left: 0;
    bottom: -4px;

    width: 0;
    height: 2px;

    background: #49a942;

    border-radius: 20px;

    -webkit-transition:
        width .35s cubic-bezier(.22, 1, .36, 1);

    transition:
        width .35s cubic-bezier(.22, 1, .36, 1);
}


/* =========================================================
   EXISTING GREEN ICON BOX
========================================================= */

.card-primary {
    position: relative;

    color: #ffffff !important;

    background:
        linear-gradient(
            135deg,
            #49a942 0%,
            #398735 100%
        ) !important;

    border: 0 !important;

    border-radius: 10px !important;

    box-shadow:
        0 8px 20px rgba(73, 169, 66, 0.18);

    -webkit-transition:
        transform .35s cubic-bezier(.22, 1, .36, 1),
        background .35s ease,
        box-shadow .35s ease;

    transition:
        transform .35s cubic-bezier(.22, 1, .36, 1),
        background .35s ease,
        box-shadow .35s ease;
}


/* small inner shine */

.card-primary::before {
    content: "";

    position: absolute;

    left: 7px;
    top: 7px;

    width: 8px;
    height: 8px;

    border-radius: 50%;

    background:
        rgba(255, 255, 255, .30);
}


/* =========================================================
   HOVER
========================================================= */

.card-animate:hover {
    -webkit-transform:
        translateY(-6px);

    transform:
        translateY(-6px);

    border-color:
        rgba(73, 169, 66, .20) !important;

    -webkit-box-shadow:
        0 18px 38px rgba(11, 45, 92, .10) !important;

    box-shadow:
        0 18px 38px rgba(11, 45, 92, .10) !important;
}


.card-animate:hover::before {
    transform:
        scaleX(1);
}


.card-animate:hover::after {
    transform:
        scale(1.35);

    background:
        rgba(73, 169, 66, .075);
}


.card-animate:hover .card-primary {
    background:
        linear-gradient(
            135deg,
            #0b2d5c 0%,
            #071f41 100%
        ) !important;

    transform:
        rotate(-5deg)
        scale(1.06);

    box-shadow:
        0 11px 26px rgba(11, 45, 92, .20);
}


.card-animate:hover a {
    color:
        #49a942 !important;
}


.card-animate:hover a::after {
    width: 100%;
}

</style>

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col">

                        <div class="h-100">
                            <div class="row mb-3 pb-1">
                                <div class="col-12">
                                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                        <div class="flex-grow-1">
                                            {{--  <h4 class="fs-16 mb-1">Admin Login</h4>  --}}
                                        </div>

                                    </div><!-- end card header -->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->



                            <div class="row">

                                @if (Auth::user()->role_id == 1)
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate" style="background: #570f29;">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-bold  text-truncate mb-0">
                                                            Categories</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-bold ff-secondary  mb-4"><span
                                                                class="counter-value"
                                                                data-target="{{ $categoryCount }}">0</span>
                                                        </h4>
                                                        <a href="{{ route('admin.categories.index') }}"
                                                            class="text-decoration-underline -50">View
                                                            Categories</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-dashboard rounded fs-3">
                                                            <i class="fa-solid fa-box-open"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate" style="background: #570f29;">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-bold  text-truncate mb-0">
                                                            Services</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-bold ff-secondary  mb-4"><span
                                                                class="counter-value"
                                                                data-target="{{ $serviceCount }}">0</span>
                                                        </h4>
                                                        <a href="{{ route('admin.services.index') }}"
                                                            class="text-decoration-underline -50">View
                                                            Services</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-dashboard rounded fs-3">
                                                            <i class="fa-solid fa-box-open"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate" style="background: #570f29;">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-bold  text-truncate mb-0">
                                                            Photo Gallery</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-bold ff-secondary  mb-4"><span
                                                                class="counter-value"
                                                                data-target="{{ $photoGalleryCount }}">0</span>
                                                        </h4>
                                                        <a href="{{ route('admin.photo-gallery.index') }}"
                                                            class="text-decoration-underline -50">
                                                            View Photo Gallery</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-dashboard rounded fs-3">
                                                            <i class="fa-solid fa-circle-question"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate" style="background: #570f29;">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-bold  text-truncate mb-0">
                                                            Video Gallery</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-bold ff-secondary  mb-4"><span
                                                                class="counter-value"
                                                                data-target="{{ $videoGalleryCount }}">0</span>
                                                        </h4>
                                                        <a href="{{ route('admin.video-gallery.index') }}"
                                                            class="text-decoration-underline -50">
                                                            View Video Gallery</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-dashboard rounded fs-3">
                                                            <i class="fa-solid fa-circle-question"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate" style="background: #570f29;">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-bold  text-truncate mb-0">
                                                            Blog Posts</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-bold ff-secondary  mb-4"><span
                                                                class="counter-value"
                                                                data-target="{{ $blogCount }}">0</span>
                                                        </h4>
                                                        <a href="{{ route('admin.blogs.index') }}"
                                                            class="text-decoration-underline -50">
                                                            View Blog Posts</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-dashboard rounded fs-3">
                                                            <i class="fa-solid fa-circle-question"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate" style="background: #570f29;">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-bold  text-truncate mb-0">
                                                            Faq</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-bold ff-secondary  mb-4"><span
                                                                class="counter-value"
                                                                data-target="{{ $faqCount }}">0</span>
                                                        </h4>
                                                        <a href="{{ route('admin.faqs.index') }}"
                                                            class="text-decoration-underline -50">
                                                            View Faq</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-dashboard rounded fs-3">
                                                            <i class="fa-solid fa-circle-question"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate" style="background: #570f29;">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-bold  text-truncate mb-0">
                                                            Our Clients</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-bold ff-secondary  mb-4"><span
                                                                class="counter-value"
                                                                data-target="{{ $ourClientCount }}">0</span>
                                                        </h4>
                                                        <a href="{{ route('admin.our-clients.index') }}"
                                                            class="text-decoration-underline -50">
                                                            View Our Clients</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-dashboard rounded fs-3">
                                                            <i class="fa-solid fa-circle-question"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © {{ env('APP_NAME') }}
                    </div>

                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->


@endsection
