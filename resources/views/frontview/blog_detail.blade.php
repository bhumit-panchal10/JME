<style>
    .jme-bdx-content-block {
        padding: 0 !important;
    }

    .jme-bdx-recent small {
        font-size: 10px !important;
    }

    .jme-bdx-recent h4 {
        font-size: 11px !important;
    }

    .jme-bdx-recent time {
        font-size: 11px !important;
    }

    .current-dot {
        width: 10px !important;
        height: 9px !important;
    }
</style>
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

                    <h1> Blog</h1>

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
                            {{ $Blog->name ?? '' }}
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



    <!-- =========================================================
                                                                                                                                                                         JME BLOG DETAIL
                                                                                                                                                                         EXISTING HEADER / BREADCRUMB ABOVE
                                                                                                                                                                         EXISTING RELATED BLOG SECTION BELOW
                                                                                                                                                                    ========================================================== -->

    <main class="jme-blog-detail-x">

        <section class="jme-bdx-content-section">

            <div class="jme-container">

                <div class="jme-bdx-layout">
                    <article class="jme-bdx-article">

                        <div class="jme-bdx-meta-row">

                            <div class="jme-bdx-meta">

                                <span class="jme-bdx-date">

                                    <svg viewBox="0 0 24 24">
                                        <rect x="3" y="5" width="18" height="16" rx="2"></rect>
                                        <path d="M16 3v4"></path>
                                        <path d="M8 3v4"></path>
                                        <path d="M3 10h18"></path>
                                    </svg>

                                    {{ optional($Blog->created_at)->format('d F Y') }}

                                </span>

                                <i></i>




                            </div>

                            <span class="jme-bdx-category">
                                {{ $Blog->service->name ?? '' }}
                            </span>

                        </div>

                        <h1 class="jme-bdx-title">
                            {{ $Blog->name ?? '' }}
                        </h1>

                        <figure class="jme-bdx-feature-image">

                            @if (!empty($Blog->image))
                                <img src="{{ asset('blogs/' . $Blog->image) }}" alt="{{ $Blog->name }}">
                            @endif


                        </figure>


                        <div class="jme-bdx-body">
                            <section class="jme-bdx-content-block">

                                <div class="jme-bdx-block-copy">

                                    <p>
                                        {!! $Blog->description ?? '' !!}
                                    </p>

                                </div>

                            </section>
                        </div>
                    </article>

                    <!-- =================================================
                                                                                                                                                                                         RIGHT SIDEBAR
                                                                                                                                                                                    ================================================== -->
                    <aside class="jme-bdx-sidebar">

                        <div class="jme-bdx-sidebar-sticky">
                            <!-- RECENT POSTS -->
                            <div class="jme-bdx-sidebar-box">

                                <div class="jme-bdx-sidebar-title">

                                    <span></span>

                                    <div>

                                        <small>
                                            KEEP READING
                                        </small>

                                        <h3>
                                            Recent Posts
                                        </h3>

                                    </div>

                                </div>

                                <div class="jme-bdx-recent-list">

                                    @foreach ($RecentBlog as $recentblog)
                                        <a href="{{ url('blog-detail/' . $recentblog->slugname) }}" class="jme-bdx-recent">

                                            <div class="jme-bdx-recent-image">

                                                @if (!empty($recentblog->image))
                                                    <img src="{{ asset('blogs/' . $recentblog->image) }}"
                                                        alt="{{ $recentblog->name }}">
                                                @endif

                                            </div>

                                            <div>

                                                <small>
                                                    {{ $Blog->name ?? '' }}
                                                </small>

                                                <h4>
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($Blog->description), 100) }}
                                                </h4>

                                                <time>
                                                    {{ optional($Blog->created_at)->format('d F Y') }}
                                                </time>

                                            </div>

                                        </a>
                                    @endforeach

                                </div>

                            </div>



                            <!-- PROJECT CTA -->
                            <div class="jme-bdx-project-card">

                                <div class="jme-bdx-project-icon">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M4 14v-2a8 8 0 0 1 16 0v2"></path>
                                        <path d="M4 14h3v5H4z"></path>
                                        <path d="M17 14h3v5h-3z"></path>
                                        <path d="M17 20c0 1-1 2-3 2h-2"></path>
                                    </svg>

                                </div>


                                <small>
                                    HAVE A PROJECT IN MIND?
                                </small>


                                <h3>
                                    Let's Build
                                    <br>
                                    Together
                                </h3>


                                <p>
                                    Discuss your upcoming industrial,
                                    utility or EPC requirements with
                                    our engineering team.
                                </p>


                                <div class="footer-cta-content">
                                    <a href="{{ route('contactus') }}" class="jme-project-btn">
                                        <span class="jme-project-btn-text">Contact Us</span>
                                        <span class="jme-project-btn-arrow">
                                            <svg viewBox="0 0 24 24">
                                                <path d="M5 12h14"></path>
                                                <path d="M13 6l6 6-6 6"></path>
                                            </svg>
                                        </span>
                                    </a>
                                </div>

                            </div>





                        </div>

                    </aside>


                </div>

            </div>

        </section>

    </main>


@endsection
@section('scripts')
@endsection
