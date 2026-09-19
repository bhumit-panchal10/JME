@extends('layouts.front')
@section('title', config('app.name') . '' . ($meta->metaTitle ?? ''))
@section('opTag')
    {{-- Meta tags --}}
    <meta name="description" content="{{ $meta->metaDescription ?? '' }}">
    <meta name="keywords" content="{{ $meta->metaKeyword ?? '' }}">
    <meta name="title" content="{{ $meta->metaTitle ?? '' }}">
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

    <!-- =========================================
                                             JME ABOUT BREADCRUMB / INNER HERO
                                        ========================================= -->
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

                    <h1>Blog</h1>

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
                            Blog
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
                                             JME LATEST INSIGHTS
                                        ====================================================== -->

    <section class="jme-latest-insights" id="latestInsights">

        <div class="jme-container">

            <!-- =============================================
                                                     SECTION HEADER
                                                ============================================== -->
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
                            JME GROUP BLOG
                        </span>

                    </div>


                    <h2>
                        Engineering
                        <span>
                            Insights.
                        </span>
                    </h2>

                </div>


                <div class="jme-latest-head-right">

                    <p>
                        Explore engineering knowledge, project insights,
                        technical guidance and industry updates from
                        Jay Mahakal Enterprise Group.
                    </p>

                </div>

            </div>



            <!-- =============================================
                                                     BLOG GRID
                                                ============================================== -->

            <div class="jme-blog-grid">

                @forelse ($blogs as $key => $blog)
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



                                <a href="{{ url('blog-detail/' . $blog->slugname) }}" class="jme-insight-link">

                                    Read Insight

                                    <i>↗</i>

                                </a>

                            </div>

                        </div>

                    </article>

                @empty

                    <div class="jme-blog-no-result">
                        No blogs found.
                    </div>
                @endforelse

            </div>
            @if ($blogs->hasPages())

                <div class="jme-blog-pagination-wrap">

                    <div class="jme-blog-pagination">

                        {{-- PREVIOUS --}}
                        @if ($blogs->onFirstPage())
                            <button type="button" class="jme-pagination-control" disabled>

                                <svg viewBox="0 0 24 24">
                                    <path d="M19 12H5"></path>
                                    <path d="M11 18l-6-6 6-6"></path>
                                </svg>

                            </button>
                        @else
                            <a href="{{ $blogs->previousPageUrl() }}" class="jme-pagination-control">

                                <svg viewBox="0 0 24 24">
                                    <path d="M19 12H5"></path>
                                    <path d="M11 18l-6-6 6-6"></path>
                                </svg>

                            </a>
                        @endif


                        {{-- PAGE NUMBERS --}}
                        <div class="jme-pagination-numbers">

                            @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                <a href="{{ $url }}"
                                    class="jme-pagination-page
                        {{ $page == $blogs->currentPage() ? 'active' : '' }}">
                                    {{ $page }}
                                </a>
                            @endforeach

                        </div>


                        {{-- NEXT --}}
                        @if ($blogs->hasMorePages())
                            <a href="{{ $blogs->nextPageUrl() }}" class="jme-pagination-control">

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

@endsection
@section('scripts')
@endsection
