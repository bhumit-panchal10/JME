@extends('layouts.front')
@section('title', 'Video Gallery')
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

                    <h1> Video Gallery</h1>

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
                            Video Gallery
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



    <!-- =====================================================
                         SIMPLE YOUTUBE VIDEO GALLERY
                    ====================================================== -->

    <section class="jme-simple-video-gallery">

        <div class="jme-container">

            @if (isset($video_gallery) && $video_gallery->isNotEmpty())

                <div class="jme-simple-video-grid">

                    @foreach ($video_gallery as $video)
                        @php
                            $videoId = null;

                            if (!empty($video->url)) {
                                if (preg_match('/[?&]v=([^&]+)/', $video->url, $matches)) {
                                    $videoId = $matches[1];
                                } elseif (preg_match('/youtu\.be\/([^?&]+)/', $video->url, $matches)) {
                                    $videoId = $matches[1];
                                } elseif (preg_match('/youtube\.com\/shorts\/([^?&]+)/', $video->url, $matches)) {
                                    $videoId = $matches[1];
                                } elseif (preg_match('/youtube\.com\/embed\/([^?&]+)/', $video->url, $matches)) {
                                    $videoId = $matches[1];
                                }
                            }
                        @endphp

                        @if ($videoId)
                            <div class="jme-simple-video-item">

                                <iframe src="https://www.youtube.com/embed/{{ $videoId }}"
                                    title="{{ $video->service->name ?? 'Service Video' }}" loading="lazy"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen>
                                </iframe>

                            </div>
                        @endif
                    @endforeach

                </div>
                
                 @if ($video_gallery->hasPages())

                <div class="jme-blog-pagination-wrap">

                    <div class="jme-blog-pagination">

                        {{-- PREVIOUS --}}
                        @if ($video_gallery->onFirstPage())
                            <button type="button" class="jme-pagination-control" disabled>

                                <svg viewBox="0 0 24 24">
                                    <path d="M19 12H5"></path>
                                    <path d="M11 18l-6-6 6-6"></path>
                                </svg>

                            </button>
                        @else
                            <a href="{{ $video_gallery->previousPageUrl() }}" class="jme-pagination-control">

                                <svg viewBox="0 0 24 24">
                                    <path d="M19 12H5"></path>
                                    <path d="M11 18l-6-6 6-6"></path>
                                </svg>

                            </a>
                        @endif


                        {{-- PAGE NUMBERS --}}
                        <div class="jme-pagination-numbers">

                            @foreach ($video_gallery->getUrlRange(1, $video_gallery->lastPage()) as $page => $url)
                                <a href="{{ $url }}"
                                    class="jme-pagination-page
                        {{ $page == $video_gallery->currentPage() ? 'active' : '' }}">
                                    {{ $page }}
                                </a>
                            @endforeach

                        </div>


                        {{-- NEXT --}}
                        @if ($video_gallery->hasMorePages())
                            <a href="{{ $video_gallery->nextPageUrl() }}" class="jme-pagination-control">

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

            @endif

        </div>

    </section>


@endsection
@section('scripts')
@endsection
