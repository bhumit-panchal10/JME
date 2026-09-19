@extends('layouts.front')
@section('title', config('app.name') . '' . ($meta->meta_title ?? ''))
@section('opTag')
    {{-- Meta tags --}}
    <meta name="description" content="{{ $meta->meta_description ?? '' }}">
    <meta name="keywords" content="{{ $meta->metaKeyword ?? '' }}">
    <meta name="title" content="{{ $meta->meta_title ?? '' }}">
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
                <div class="jme-inner-card">

                    <div class="jme-card-tag">
                        <span class="tag-shape"></span>
                        <span>JME GROUP</span>
                    </div>

                    <h1>Service</h1>

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
                            {{ $Category->name ?? '' }}
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

    <main class="jme-services-page">

        <section class="jme-services-listing">

            <div class="jme-services-container">

                <div class="jme-services-grid" id="jmeServicesGrid">

                    @forelse ($Services as $service)
                        <article class="jme-service-card" data-category="{{ $service->category->slugname ?? '' }}"
                            data-title="{{ $service->name }}">

                            <a href="{{ url('service-detail/' . $service->slugname) }}" class="jme-service-image">

                                @if ($service->image)
                                    <img src="{{ asset('services/' . $service->image) }}" alt="{{ $service->name }}">
                                @else
                                    <img src="{{ asset('assets/images/noimage.jpg') }}" alt="{{ $service->name }}">
                                @endif

                            </a>

                            <div class="jme-service-content">

                                <h3>
                                    <a href="{{ url('service-detail/' . $service->slugname) }}">
                                        {{ $service->name }}
                                    </a>
                                </h3>

                                <p>
                                    {{ \Illuminate\Support\Str::limit(strip_tags($service->short_description), 140) }}
                                </p>


                                <a href="{{ url('service-detail/' . $service->slugname) }}" class="jme-service-read-btn">

                                    <span class="jme-service-read-text">
                                        Read More
                                    </span>

                                    <span class="jme-service-read-arrow">

                                        <svg viewBox="0 0 24 24">
                                            <path d="M5 12h14"></path>
                                            <path d="M13 6l6 6-6 6"></path>
                                        </svg>

                                    </span>

                                </a>

                            </div>

                        </article>

                    @empty

                        <div class="jme-services-no-result">
                            No services found.
                        </div>
                    @endforelse

                </div>

            </div>

        </section>


        @if ($Services->hasPages())

            <div class="jme-service-pagination-wrap">

                {{-- RESULT INFO --}}
                <div class="jme-pagination-info">

                    Showing

                    <strong>
                        {{ $Services->firstItem() ?? 0 }}
                    </strong>

                    –

                    <strong>
                        {{ $Services->lastItem() ?? 0 }}
                    </strong>

                    of

                    <strong>
                        {{ $Services->total() }}
                    </strong>

                    Services

                </div>


                {{-- PAGINATION --}}
                <div class="jme-service-pagination">

                    {{-- PREVIOUS --}}
                    @if ($Services->onFirstPage())
                        <button type="button" class="jme-pagination-control jme-pagination-prev" disabled>
                            <svg viewBox="0 0 24 24">
                                <path d="M19 12H5"></path>
                                <path d="M11 18l-6-6 6-6"></path>
                            </svg>
                        </button>
                    @else
                        <a href="{{ $Services->previousPageUrl() }}" class="jme-pagination-control jme-pagination-prev">
                            <svg viewBox="0 0 24 24">
                                <path d="M19 12H5"></path>
                                <path d="M11 18l-6-6 6-6"></path>
                            </svg>
                        </a>
                    @endif


                    {{-- PAGE NUMBERS --}}
                    <div class="jme-pagination-numbers">

                        @foreach ($Services->links()->elements[0] ?? [] as $page => $url)
                            <a href="{{ $url }}"
                                class="jme-pagination-page
                            {{ $page == $Services->currentPage() ? 'active' : '' }}">
                                {{ $page }}
                            </a>
                        @endforeach

                    </div>


                    {{-- NEXT --}}
                    @if ($Services->hasMorePages())
                        <a href="{{ $Services->nextPageUrl() }}" class="jme-pagination-control jme-pagination-next">

                            <svg viewBox="0 0 24 24">
                                <path d="M5 12h14"></path>
                                <path d="M13 6l6 6-6 6"></path>
                            </svg>

                        </a>
                    @else
                        <button type="button" class="jme-pagination-control jme-pagination-next" disabled>

                            <svg viewBox="0 0 24 24">
                                <path d="M5 12h14"></path>
                                <path d="M13 6l6 6-6 6"></path>
                            </svg>

                        </button>
                    @endif

                </div>

            </div>

        @endif

    </main>


@endsection
@section('scripts')
@endsection
