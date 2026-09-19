@extends('layouts.front')
@section('title', config('app.name') . '' . ($meta->meta_tittle ?? ''))
@section('opTag')
    {{-- Meta tags --}}
    <meta name="description" content="{{ $meta->meta_description ?? '' }}">
    <meta name="keywords" content="{{ $meta->metaKeyword ?? '' }}">
    <meta name="title" content="{{ $meta->meta_tittle ?? '' }}">
@endsection

@section('head')
    {!! $meta->head ?? '' !!}
@endsection

@section('body')
    @if (!empty($meta->body))
        <script type="text/javascript">
            {!! $meta->body !!}
        </script>
    @endif
@endsection
@section('content')
    <style>
        .jme-service-video-card {
            position: relative;
        }

        .jme-service-video-preview {
            position: relative;

            width: 100%;

            aspect-ratio: 16 / 9;

            overflow: hidden;

            background: #000;
        }

        .jme-service-video-preview>img {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;
        }

        .jme-service-inline-video {
            position: absolute;

            inset: 0;

            width: 100%;
            height: 100%;

            display: block;

            border: 0;

            background: #000;
        }

        .jme-service-video-card.is-playing .jme-service-video-preview {
            background: #000;
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

                    <h1>Service Detail</h1>

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
                            {{ $service->name ?? '' }}
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


    <main class="jme-sd-page">

        <section class="jme-sd-main">

            <div class="jme-sd-container">
                <div class="jme-sd-top-grid">

                    @php
                        $mainImage = $service->image
                            ? asset('services/' . $service->image)
                            : asset('assets/images/no-image.jpg');
                    @endphp


                    <div class="jme-sd-slider" id="jmeServiceSlider">

                        {{-- LEFT THUMBNAILS --}}
                        <div class="jme-sd-thumbs" id="jmeSdThumbRow">

                            {{-- MAIN SERVICE IMAGE --}}
                            <button type="button" class="jme-sd-thumb active" data-image="{{ $mainImage }}"
                                data-alt="{{ $service->name }}">

                                <img src="{{ $mainImage }}" alt="{{ $service->name }}">

                            </button>


                            {{-- PHOTO GALLERY IMAGES --}}
                            @foreach ($service->photoGalleries as $gallery)
                                @php
                                    $galleryImage = asset('photo-gallery/' . $gallery->image);
                                @endphp

                                <button type="button" class="jme-sd-thumb" data-image="{{ $galleryImage }}"
                                    data-alt="{{ $service->name }}">

                                    <img src="{{ $galleryImage }}" alt="{{ $service->name }}">

                                </button>
                            @endforeach

                        </div>


                        {{-- MAIN IMAGE --}}
                        <div class="jme-sd-slider-stage" id="jmeSliderStage">

                            <img id="jmeSdMainImage" class="jme-sd-slider-image" src="{{ $mainImage }}"
                                alt="{{ $service->name }}">


                            <div class="jme-sd-image-tag">

                                <span></span>

                                PROJECT VIEW

                            </div>


                            {{-- Show arrows when there is at least one gallery image --}}
                            @if ($service->photoGalleries->count() > 0)
                                {{-- PREVIOUS --}}
                                <button type="button" class="jme-sd-slider-arrow jme-sd-slider-prev" id="jmeSdPrevBtn"
                                    aria-label="Previous Image">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M19 12H5"></path>
                                        <path d="M11 18l-6-6 6-6"></path>
                                    </svg>

                                </button>


                                {{-- NEXT --}}
                                <button type="button" class="jme-sd-slider-arrow jme-sd-slider-next" id="jmeSdNextBtn"
                                    aria-label="Next Image">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M5 12h14"></path>
                                        <path d="M13 6l6 6-6 6"></path>
                                    </svg>

                                </button>
                            @endif

                        </div>

                    </div>



                    <!-- =================================================
                                                                                                                                                                                                                                         RIGHT : SERVICE DETAILS
                                                                                                                                                                                                                                    ================================================== -->

                    <div class="jme-sd-summary">


                        <div class="jme-sd-eyebrow">

                            <span></span>

                            CONSTRUCTION SERVICES

                        </div>


                        <h2>
                            Industrial Equipment Installation
                        </h2>


                        <div class="jme-sd-summary-accent">

                            <span></span>

                            <i></i>

                        </div>


                        <p class="jme-sd-summary-desc">

                            We provide end-to-end industrial equipment
                            installation services with precision, safety
                            and efficiency.

                            Our experienced team ensures seamless setup,
                            reduced downtime and dependable operational
                            performance.

                        </p>



                        <!-- =========================================
                                                                                                                                                                                                                                             SERVICE META
                                                                                                                                                                                                                                        ========================================== -->

                        <div class="jme-sd-meta">


                            <div class="jme-sd-meta-item">

                                <small>
                                    Service Type
                                </small>

                                <strong>
                                    Installation
                                </strong>

                            </div>


                            <div class="jme-sd-meta-item">

                                <small>
                                    Industry
                                </small>

                                <strong>
                                    Industrial
                                </strong>

                            </div>


                            <div class="jme-sd-meta-item">

                                <small>
                                    Service Location
                                </small>

                                <strong>
                                    Pan India
                                </strong>

                            </div>


                            <div class="jme-sd-meta-item">

                                <small>
                                    Support
                                </small>

                                <strong>
                                    24/7 Available
                                </strong>

                            </div>


                        </div>





                    </div>

                </div>
            </div>

        </section>

        <!-- =========================================================
                                                                                                                                                                                                                         SERVICE DETAIL CONTENT
                                                                                                                                                                                                                    ========================================================= -->

        <section class="jme-service-detail-content">

            <div class="jme-sd-container">

                <div class="jme-service-detail-content-wrap">

                    <div class="jme-service-detail-content-intro">

                        <span class="jme-service-detail-content-label">
                            SERVICE DESCRIPTION
                        </span>

                        <p>
                            {!! $service->brief_description !!} </p>

                    </div>
                </div>

            </div>

        </section>

        @if ($faqs->count() > 0)
            <section class="jme-faqx-section">

                <div class="jme-sd-container">

                    <div class="jme-faqx-grid">

                        <div class="jme-faqx-left">

                            <div class="jme-faqx-left-overlay"></div>


                            <div class="jme-faqx-left-content">


                                <div class="jme-faqx-label">

                                    <span></span>

                                    <p>
                                        FREQUENTLY ASKED QUESTIONS
                                    </p>

                                </div>


                                <h2>

                                    Have Questions?

                                    <strong>
                                        We’re Here to Help.
                                    </strong>

                                </h2>


                                <p class="jme-faqx-intro">

                                    Find answers to common questions about our
                                    industrial equipment installation services.

                                </p>


                                <!-- CONTACT BOX -->

                                <a href="{{ route('contactus') }}" class="jme-faqx-contact">

                                    <span class="jme-faqx-contact-icon">

                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M4 13v-2a8 8 0 0 1 16 0v2"></path>

                                            <path d="M4 13H3a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h2v-7Z"></path>

                                            <path d="M20 13h1a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-2v-7Z"></path>

                                            <path d="M19 20c-1 1-2 2-5 2"></path>
                                        </svg>

                                    </span>


                                    <span class="jme-faqx-contact-text">

                                        <strong>
                                            Still have questions?
                                        </strong>

                                        <small>
                                            Talk to our experts today.
                                        </small>

                                    </span>


                                    <span class="jme-faqx-contact-arrow">

                                        <svg viewBox="0 0 24 24">
                                            <path d="M5 12h14"></path>
                                            <path d="M13 6l6 6-6 6"></path>
                                        </svg>

                                    </span>

                                </a>


                            </div>

                        </div>

                        <div class="jme-faqx-right">

                            <div class="jme-faqx-list">

                                @foreach ($faqs as $faq)
                                    <div class="jme-faqx-item {{ $loop->first ? 'active' : '' }}">

                                        <button type="button" class="jme-faqx-question">

                                            <span>
                                                {{ $faq->question ?? '' }}
                                            </span>

                                            <span class="jme-faqx-toggle"></span>

                                        </button>


                                        <div class="jme-faqx-answer">

                                            <div class="jme-faqx-answer-inner">

                                                <p>

                                                    {{ $faq->answer ?? '' }}

                                                </p>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach


                            </div>

                        </div>

                    </div>

                </div>

            </section>
        @endif


        @if ($blogs->count() > 0)
            <section class="jme-latest-insights" id="latestInsights">

                <div class="jme-container">

                    <div class="jme-latest-head">

                        <div>

                            <div class="jme-latest-kicker">

                                <span class="jme-latest-kicker-icon">

                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M5 4h14v16H5z"></path>
                                        <path d="M8 8h8"></path>
                                        <path d="M8 12h8"></path>
                                        <path d="M8 16h5"></path>
                                    </svg>

                                </span>

                                <span>
                                    SERVICE INSIGHTS
                                </span>

                            </div>


                            <h2>
                                Explore More About
                                <span>
                                    Our Services.
                                </span>
                            </h2>

                        </div>


                        <div class="jme-latest-head-right">

                            <p>
                                Discover practical insights, technical guidance
                                and useful information related to our industrial
                                engineering and service solutions.
                            </p>


                            <a href="{{ route('blog') }}" class="jme-btn">

                                <span class="jme-btn-text">
                                    View All Blogs
                                </span>

                                <span class="jme-btn-icon">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="M5 12h14"></path>
                                        <path d="M13 6l6 6-6 6"></path>
                                    </svg>
                                </span>

                            </a>

                        </div>

                    </div>



                    <div class="jme-blog-grid">

                        @foreach ($blogs as $key => $blog)
                            @php

                                $wordCount = str_word_count(strip_tags($blog->description ?? ''));

                                $readTime = max(1, ceil($wordCount / 200));

                            @endphp

                            <article class="jme-insight-card {{ $key == 1 ? 'jme-insight-card-alt' : '' }}">

                                <a href="{{ url('blog-detail/' . $blog->slugname) }}" class="jme-insight-image">

                                    @if (!empty($blog->image))
                                        <img src="{{ asset('blogs/' . $blog->image) }}" alt="{{ $blog->name }}">
                                    @endif

                                    <span class="jme-insight-image-cut"></span>

                                    <span class="jme-insight-date">

                                        <strong>
                                            {{ $blog->created_at->format('d') }}
                                        </strong>

                                        <small>
                                            {{ strtoupper($blog->created_at->format('M')) }}
                                        </small>

                                    </span>

                                </a>


                                <div class="jme-insight-body">

                                    <div class="jme-insight-top">

                                        <span class="jme-insight-category">

                                            {{ strtoupper($blog->category->name ?? '') }}

                                        </span>

                                    </div>


                                    <h3>

                                        <a href="{{ url('blog-detail/' . $blog->slugname) }}">

                                            {{ $blog->name }}

                                        </a>

                                    </h3>


                                    <p>

                                        {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 150) }}

                                    </p>


                                    <div class="jme-insight-bottom">

                                        <span>

                                            {{ $readTime }} MIN READ

                                        </span>


                                        <a href="{{ url('blog-detail/' . $blog->slugname) }}" class="jme-insight-link">

                                            Read Insight

                                            <i>
                                                ↗
                                            </i>

                                        </a>

                                    </div>

                                </div>

                            </article>
                        @endforeach

                    </div>


                </div>

            </section>

        @endif

        @if ($videos->count() > 0)
            <section class="jme-service-videos">

                <div class="jme-sd-container">

                    <!-- HEADER -->
                    <div class="jme-service-video-head">

                        <div>

                            <div class="jme-service-video-kicker">
                                <span></span>
                                SERVICE VIDEOS
                            </div>

                            <h2>
                                See Our Work
                                <span>In Action.</span>
                            </h2>

                        </div>

                        <p>
                            Explore videos related to industrial equipment
                            installation, project execution and technical
                            installation processes.
                        </p>

                    </div>


                    <!-- VIDEO GRID -->
                    <div class="jme-service-video-grid">

                        @forelse ($videos as $video)
                            @php

                                $url = $video->url;

                                $videoId = null;

                                // Normal YouTube URL
                                if (preg_match('/[?&]v=([^&]+)/', $url, $matches)) {
                                    $videoId = $matches[1];
                                }

                                // Short YouTube URL
                                elseif (preg_match('/youtu\.be\/([^?&]+)/', $url, $matches)) {
                                    $videoId = $matches[1];
                                }

                                // Shorts
                                elseif (preg_match('/youtube\.com\/shorts\/([^?&]+)/', $url, $matches)) {
                                    $videoId = $matches[1];
                                }

                                // Embed
                                elseif (preg_match('/youtube\.com\/embed\/([^?&]+)/', $url, $matches)) {
                                    $videoId = $matches[1];
                                }

                                /*
                                 * If actual YouTube video:
                                 * use YouTube thumbnail.
                                 *
                                 * Otherwise:
                                 * use service image.
                                 */
                                if ($videoId) {
                                    $thumbnail = "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
                                } else {
                                    $thumbnail = $service->image
                                        ? asset('uploads/services/' . $service->image)
                                        : asset('assets/images/no-image.jpg');
                                }

                            @endphp


                            <div class="jme-service-video-card" data-video-url="{{ $url }}"
                                data-video-id="{{ $videoId ?? '' }}">

                                <div class="jme-service-video-preview">

                                    <img src="{{ $thumbnail }}" alt="{{ $service->name }}">

                                    <div class="jme-service-video-overlay"></div>

                                    <button type="button" class="jme-service-video-play" aria-label="Play Video">

                                        <svg viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"></path>
                                        </svg>

                                    </button>

                                </div>

                            </div>

                        @empty

                            <p>No videos found.</p>
                        @endforelse

                    </div>
                </div>

            </section>
            <!--<div class="jme-video-modal" id="jmeVideoModal">-->

            <!--    <div class="jme-video-modal-backdrop"></div>-->

            <!--    <div class="jme-video-modal-dialog">-->

            <!--        <button type="button" class="jme-video-modal-close" id="jmeVideoModalClose"-->
            <!--            aria-label="Close Video">-->
            <!--            <span></span>-->
            <!--            <span></span>-->
            <!--        </button>-->

            <!--        <div class="jme-video-modal-frame">-->

            <!--            <iframe id="jmeVideoIframe" src="" title="Service Video"-->
            <!--                allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>-->

            <!--        </div>-->

            <!--    </div>-->

            <!--</div>-->
        @endif
    </main>
@endsection
@section('scripts')
    <script>
        /* =========================================================
                                   SERVICE VIDEO - PLAY INSIDE CARD
                                ========================================================= */

        document.addEventListener("DOMContentLoaded", function() {

            const cards =
                document.querySelectorAll(".jme-service-video-card");

            if (!cards.length) {
                return;
            }


            /* =====================================================
               GET YOUTUBE ID
            ====================================================== */

            function getYoutubeId(url) {

                if (!url) {
                    return "";
                }

                try {

                    /* youtube.com/watch?v= */

                    if (url.includes("youtube.com/watch")) {

                        const parsedUrl = new URL(url);

                        return parsedUrl.searchParams.get("v") || "";

                    }


                    /* youtu.be */

                    if (url.includes("youtu.be/")) {

                        return url
                            .split("youtu.be/")[1]
                            .split("?")[0]
                            .split("&")[0];

                    }


                    /* youtube shorts */

                    if (url.includes("youtube.com/shorts/")) {

                        return url
                            .split("youtube.com/shorts/")[1]
                            .split("?")[0]
                            .split("/")[0];

                    }


                    /* youtube embed */

                    if (url.includes("youtube.com/embed/")) {

                        return url
                            .split("youtube.com/embed/")[1]
                            .split("?")[0]
                            .split("/")[0];

                    }

                } catch (error) {

                    console.log("Video URL Error:", error);

                }

                return "";
            }



            /* =====================================================
               GOOGLE DRIVE EMBED
            ====================================================== */

            function getGoogleDriveEmbed(url) {

                if (!url || !url.includes("drive.google.com")) {
                    return "";
                }


                let fileId = "";


                /* /file/d/FILE_ID/view */

                if (url.includes("/file/d/")) {

                    fileId =
                        url
                        .split("/file/d/")[1]
                        .split("/")[0];

                }


                /* open?id=FILE_ID */
                else {

                    try {

                        const parsedUrl =
                            new URL(url);

                        fileId =
                            parsedUrl.searchParams.get("id") || "";

                    } catch (error) {

                        fileId = "";

                    }

                }


                if (!fileId) {
                    return "";
                }


                return (
                    "https://drive.google.com/file/d/" +
                    fileId +
                    "/preview"
                );

            }



            /* =====================================================
               STOP OTHER VIDEOS
            ====================================================== */

            function stopOtherVideos(activeCard) {

                cards.forEach(function(card) {

                    if (card === activeCard) {
                        return;
                    }


                    const preview =
                        card.querySelector(
                            ".jme-service-video-preview"
                        );


                    if (!preview) {
                        return;
                    }


                    const originalHtml =
                        preview.dataset.originalHtml;


                    if (originalHtml) {

                        preview.innerHTML =
                            originalHtml;

                    }


                    card.classList.remove(
                        "is-playing"
                    );

                });


                bindPlayButtons();

            }



            /* =====================================================
               PLAY VIDEO
            ====================================================== */

            function playVideo(card) {

                const preview =
                    card.querySelector(
                        ".jme-service-video-preview"
                    );


                if (!preview) {
                    return;
                }


                /* store original thumbnail html */

                if (!preview.dataset.originalHtml) {

                    preview.dataset.originalHtml =
                        preview.innerHTML;

                }


                const url =
                    card.dataset.videoUrl || "";


                const directVideoId =
                    card.dataset.videoId || "";


                let embedUrl = "";


                /* =============================================
                   YOUTUBE
                ============================================== */

                const youtubeId =
                    directVideoId ||
                    getYoutubeId(url);


                if (youtubeId) {

                    embedUrl =
                        "https://www.youtube.com/embed/" +
                        youtubeId +
                        "?autoplay=1&rel=0&playsinline=1";

                }


                /* =============================================
                   GOOGLE DRIVE
                ============================================== */
                else if (
                    url.includes("drive.google.com")
                ) {

                    embedUrl =
                        getGoogleDriveEmbed(url);

                }


                /* =============================================
                   INVALID
                ============================================== */

                if (!embedUrl) {

                    console.log(
                        "Unable to play video:",
                        url
                    );

                    return;
                }


                stopOtherVideos(card);


                preview.innerHTML = `

            <iframe
                class="jme-service-inline-video"
                src="${embedUrl}"
                title="Service Video"
                frameborder="0"
                allow="autoplay; encrypted-media; picture-in-picture"
                allowfullscreen>
            </iframe>

        `;


                card.classList.add(
                    "is-playing"
                );

            }



            /* =====================================================
               BIND BUTTON
            ====================================================== */

            function bindPlayButtons() {

                cards.forEach(function(card) {

                    const playButton =
                        card.querySelector(
                            ".jme-service-video-play"
                        );


                    if (!playButton) {
                        return;
                    }


                    if (
                        playButton.dataset.bound === "1"
                    ) {
                        return;
                    }


                    playButton.dataset.bound =
                        "1";


                    playButton.addEventListener(
                        "click",
                        function(event) {

                            event.preventDefault();

                            event.stopPropagation();

                            playVideo(card);

                        }
                    );

                });

            }


            bindPlayButtons();

        });
    </script>
@endsection
