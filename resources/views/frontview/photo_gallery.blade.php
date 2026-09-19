@extends('layouts.front')
@section('title', 'Photo Gallery')
@section('content')
    <style>
        .jme-blog-pagination-wrap {
            width: 100%;
            margin-top: 40px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }

        .jme-pagination-info {
            font-size: 14px;
            color: #667085;
        }

        .jme-blog-pagination {
            display: flex;
            align-items: center;
            justify-content: flex-end;

            gap: 8px;

            margin-left: auto;
        }

        .jme-pagination-btn {
            width: 42px;
            height: 42px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border: 1px solid #e2e7ef;
            border-radius: 6px;

            background: #fff;
            color: #193468;

            font-size: 14px;
            font-weight: 600;

            text-decoration: none;

            transition: all 0.3s ease;
        }

        .jme-pagination-btn:hover {
            background: #193468;
            color: #fff;
            border-color: #193468;
        }

        .jme-pagination-btn.active {
            background: #193468;
            color: #fff;
            border-color: #193468;
        }

        .jme-pagination-btn.disabled {
            opacity: 0.4;
            cursor: not-allowed;
            pointer-events: none;
        }

        @media (max-width: 767px) {

            .jme-blog-pagination-wrap {
                flex-direction: column;
                align-items: flex-start;
            }

            .jme-blog-pagination {
                margin-left: 0;
                justify-content: flex-start;
                flex-wrap: wrap;
            }
        }
    </style>
    <section class="jme-inner-hero">

        <!-- Dark overlay -->
        <div class="jme-inner-overlay"></div>


        <div class="container">
            <div class="jme-inner-content">

                <!-- =========================
                                                         WHITE CONTENT CARD
                                                    ========================== -->
                <div class="jme-inner-card">

                    <div class="jme-card-tag">
                        <span class="tag-shape"></span>
                        <span>JME GROUP</span>
                    </div>

                    <h1> Photo Gallery</h1>

                    <!-- Breadcrumb -->
                    <div class="jme-custom-breadcrumb">

                        <a href="{{ route('index') }}" class="jme-home-link">

                            <span class="jme-home-box">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M3 11.5L12 4l9 7.5"></path>
                                    <path d="M5.5 10.5V20h13v-9.5"></path>
                                    <path d="M9.5 20v-6h5v6"></path>
                                </svg>
                            </span>

                            <span>Home</span>

                        </a>

                        <span class="jme-breadcrumb-arrow">
                            <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 18l6-6-6-6"></path>
                            </svg>
                        </span>

                        <span class="jme-current-page">
                            <span class="current-dot"></span>
                            Photo Gallery
                        </span>

                    </div>

                    <!-- Bottom card detail -->
                    <div class="jme-card-bottom">

                        <span class="small-green-line"></span>

                        <span>PEOPLE</span>
                        <i></i>

                        <span>PROJECTS</span>
                        <i></i>

                        <span>PROGRESS</span>

                    </div>

                    <span class="card-green-corner"></span>

                </div>

            </div>
        </div>



        <!-- =========================
                                                 BOTTOM NAVY STRIP
                                            ========================== -->
        <div class="jme-bottom-strip">

            <span class="bottom-green-shape"></span>

            <div class="jme-bottom-strip-text">
                <span>ENGINEERING</span>
                <i></i>
                <span>PROCUREMENT</span>
                <i></i>
                <span>CONSTRUCTION</span>
            </div>

        </div>

    </section>


    <section class="jme-simple-gallery">

        <div class="jme-container">

            <div class="jme-simple-gallery-grid">
                @foreach ($photogallery as $photo)
                    <div class="jme-simple-gallery-item">
                        <img src="{{ asset('photo-gallery/' . $photo->image) }}" alt="Gallery Image">
                    </div>
                @endforeach

            </div>
            @if ($photogallery->hasPages())

                <div class="jme-blog-pagination-wrap">

                    <div class="jme-blog-pagination">

                        {{-- PREVIOUS --}}
                        @if ($photogallery->onFirstPage())
                            <button type="button" class="jme-pagination-control" disabled>

                                <svg viewBox="0 0 24 24">
                                    <path d="M19 12H5"></path>
                                    <path d="M11 18l-6-6 6-6"></path>
                                </svg>

                            </button>
                        @else
                            <a href="{{ $photogallery->previousPageUrl() }}" class="jme-pagination-control">

                                <svg viewBox="0 0 24 24">
                                    <path d="M19 12H5"></path>
                                    <path d="M11 18l-6-6 6-6"></path>
                                </svg>

                            </a>
                        @endif


                        {{-- PAGE NUMBERS --}}
                        <div class="jme-pagination-numbers">

                            @foreach ($photogallery->getUrlRange(1, $photogallery->lastPage()) as $page => $url)
                                <a href="{{ $url }}"
                                    class="jme-pagination-page
                        {{ $page == $photogallery->currentPage() ? 'active' : '' }}">
                                    {{ $page }}
                                </a>
                            @endforeach

                        </div>


                        {{-- NEXT --}}
                        @if ($photogallery->hasMorePages())
                            <a href="{{ $photogallery->nextPageUrl() }}" class="jme-pagination-control">

                                <svg viewBox="0 0 24 24">
                                    <path d="M5 12h14"></path>
                                    <path d="M13 6l6 6-6 6"></path>
                                </svg>

                            </a>
                        @else
                            <button type="button" class="jme-pagination-control" disabled>

                                <svg viewBox="0 0 24 24">
                                    <path d="M5 12h14"></path>
                                    <path d="M13 6l6 6-6 6"></path>
                                </svg>

                            </button>
                        @endif

                    </div>

                </div>

            @endif

        </div>

    </section>

{{-- =========================================
    PHOTO GALLERY LIGHTBOX
========================================= --}}

<dialog class="jme-gallery-dialog" id="galleryLightbox">

    <div class="jme-lightbox-box">

        {{-- CLOSE BUTTON --}}
        <button
            type="button"
            class="jme-lightbox-close"
            id="lightboxClose"
            aria-label="Close">

            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M6 6l12 12M18 6L6 18"></path>
            </svg>

        </button>


        <div class="jme-lightbox-image-wrapper">

            {{-- PREVIOUS --}}
            <button
                type="button"
                class="jme-lightbox-arrow jme-lightbox-prev"
                id="lightboxPrev"
                aria-label="Previous Image">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M15 18l-6-6 6-6"></path>
                </svg>

            </button>


            {{-- POPUP IMAGE --}}
            <img
                src=""
                alt="Gallery Preview"
                id="lightboxImage"
            >


            {{-- NEXT --}}
            <button
                type="button"
                class="jme-lightbox-arrow jme-lightbox-next"
                id="lightboxNext"
                aria-label="Next Image">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M9 6l6 6-6 6"></path>
                </svg>

            </button>


            {{-- COUNTER --}}
            <div
                class="jme-lightbox-counter"
                id="lightboxCounter">
            </div>

        </div>

    </div>

</dialog>
@endsection
@section('scripts')
@endsection
