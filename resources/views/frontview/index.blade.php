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
    <!-- =====================================================
                                                                                                                                                                                                 JME HERO SLIDER
                                                                                                                                                                                            ====================================================== -->

    <section class="jme-hero" id="jmeHero">

        <span class="hero-transition-panel"></span>

        <div class="hero-slides">


            <!-- =============================================
                                                                                                                                                                                                         SLIDE 01
                                                                                                                                                                                                    ============================================== -->

            <div class="hero-slide active">

                <img src="{{ asset('front/images/slide-epc.jpg') }}" alt="JME Industrial EPC and Piping Solutions">

                <div class="hero-overlay"></div>


                <div class="jme-container hero-container">

                    <div class="hero-content">

                        <div class="hero-kicker">

                            <span class="hero-kicker-mark"></span>

                            <span>
                                COMPLETE EPC SOLUTIONS
                            </span>

                        </div>


                        <h1>
                            Engineering Built
                            <span>
                                for Industrial Performance.
                            </span>
                        </h1>


                        <p>
                            From engineering and procurement to
                            execution and commissioning, JME delivers
                            dependable turnkey industrial solutions.
                        </p>


                        <div class="hero-actions">

                            <a href="{{ route('service', 'turnkey-epc-project-solutions') }}" class="jme-btn">

                                <span class="jme-btn-text">
                                    Explore Services
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


                            <a href="{{ route('contactus') }}" class="hero-text-link">

                                Discuss Your Project

                                <span>
                                    ↗
                                </span>

                            </a>

                        </div>

                    </div>

                </div>

            </div>



            <!-- =============================================
                                                                                                                                                                                                         SLIDE 02
                                                                                                                                                                                                    ============================================== -->

            <div class="hero-slide">

                <img src="{{ asset('front/images/slide-fire.jpg') }}" alt="JME Fire Protection Systems">

                <div class="hero-overlay"></div>


                <div class="jme-container hero-container">

                    <div class="hero-content">

                        <div class="hero-kicker">

                            <span class="hero-kicker-mark"></span>

                            <span>
                                FIRE & SAFETY SYSTEMS
                            </span>

                        </div>


                        <h2>
                            Protection Engineered
                            <span>
                                Into Every Detail.
                            </span>
                        </h2>


                        <p>
                            Complete fire protection systems designed
                            for industrial facilities with reliable
                            execution, testing and compliance.
                        </p>


                        <div class="hero-actions">

                            <a href="{{ route('service', 'fire-protection-safety-solutions') }}" class="jme-btn">

                                <span class="jme-btn-text">
                                    Fire Solutions
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


                            <a href="{{ route('contactus') }}" class="hero-text-link">

                                Talk to Our Team

                                <span>
                                    ↗
                                </span>

                            </a>

                        </div>

                    </div>

                </div>

            </div>



            <!-- =============================================
                                                                                                                                                                                                         SLIDE 03
                                                                                                                                                                                                    ============================================== -->

            <div class="hero-slide">

                <img src="{{ asset('front/images/slide-network.jpg') }}" alt="JME Passive Network Solutions">

                <div class="hero-overlay"></div>


                <div class="jme-container hero-container">

                    <div class="hero-content">

                        <div class="hero-kicker">

                            <span class="hero-kicker-mark"></span>

                            <span>
                                PASSIVE NETWORK SOLUTIONS
                            </span>

                        </div>


                        <h2>
                            Structured Networks.
                            <span>
                                Built to Stay Connected.
                            </span>
                        </h2>


                        <p>
                            Structured cabling, server rooms,
                            network infrastructure and professional
                            cable management for modern facilities.
                        </p>


                        <div class="hero-actions">

                            <a href="{{ route('service', 'data-passive-network-solutions') }}" class="jme-btn">

                                <span class="jme-btn-text">
                                    Network Solutions
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


                            <a href="{{ route('photogallery') }}" class="hero-text-link">

                                View Projects

                                <span>
                                    ↗
                                </span>

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- =================================================
                                                                                                                                                                                                     SLIDER CONTROLS
                                                                                                                                                                                                ================================================== -->

        <div class="jme-container hero-control-container">

            <div class="hero-controls">


                <!-- NUMBERS -->

                <div class="jme-container hero-control-container">

                    <div class="hero-controls">

                        <div class="hero-progress">

                            <span class="hero-progress-fill" id="heroProgress"></span>

                        </div>


                        <div class="hero-arrows">

                            <button type="button" class="hero-arrow hero-prev" id="heroPrev" aria-label="Previous Slide">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M19 12H5"></path>
                                    <path d="M11 18l-6-6 6-6"></path>
                                </svg>
                            </button>


                            <button type="button" class="hero-arrow hero-next" id="heroNext" aria-label="Next Slide">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true">
                                    <path d="M5 12h14"></path>
                                    <path d="M13 6l6 6-6 6"></path>
                                </svg>
                            </button>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </section>



    <!-- =====================================================
                                                                                                                                                                                                 ABOUT JME - ENGINEERING CROSS SECTION
                                                                                                                                                                                            ====================================================== -->

    <section class="jme-about-x" id="jmeAboutX">

        <div class="jme-container">

            <div class="about-x-shell">

                <!-- =============================================
                                                                                                                                                                                                             IMAGE ZONE
                                                                                                                                                                                                        ============================================== -->

                <div class="about-x-visual">

                    <div class="about-x-image-main">

                        <img src="{{ asset('front/images/about.jpg') }}" alt="JME Industrial EPC Project">

                    </div>


                    <!-- BLUE CUT -->

                    <span class="about-x-blue-cut"></span>


                    <!-- GREEN CUT -->

                    <span class="about-x-green-cut"></span>


                </div>



                <!-- =============================================
                                                                                                                                                                                                             CONTENT
                                                                                                                                                                                                        ============================================== -->

                <div class="about-x-content">

                    <div class="about-x-kicker">

                        <span class="about-x-kicker-mark"></span>

                        <span>
                            BUILT FOR INDUSTRIAL EXECUTION
                        </span>

                    </div>

                    <p class="about-x-lead">
                        Established in <strong>2019</strong>,
                        <strong>Jay Mahakal Enterprise Group (JME Group)</strong>
                        has evolved into a premier Engineering, Procurement, and
                        Construction (EPC) leader. We specialize in providing complete
                        end-to-end industrial solutions—seamlessly integrating engineering
                        design, procurement, supply, precision installation, testing, and
                        commissioning across multi-disciplinary industrial setups.
                    </p>


                    <p class="about-x-text">
                        Driven by technical excellence and industrial innovation, we partner
                        with clients to execute complex industrial infrastructure and utility
                        frameworks with absolute reliability, uncompromising safety
                        compliance, and robust operational efficiency.
                    </p>



                    <!-- =========================================
                                                                                                                                                                                                                 ENGINEERING RAIL
                                                                                                                                                                                                            ========================================== -->


                    <div class="about-x-rail">

                        <div class="about-x-stat">
                            <strong>2019</strong>
                            <span>ESTABLISHED</span>
                        </div>

                        <div class="about-x-stat-divider"></div>

                        <div class="about-x-stat">
                            <strong>Turnkey</strong>
                            <span>EPC CAPABILITY</span>
                        </div>

                        <div class="about-x-stat-divider"></div>

                        <div class="about-x-stat">
                            <strong>100%</strong>
                            <span>SAFETY & QUALITY STANDARD</span>
                        </div>

                    </div>

                    <!-- =========================================
                                                                                                                                                                                                                 BOTTOM
                                                                                                                                                                                                            ========================================== -->

                    <div class="about-x-bottom">

                        <a href="{{ route('about') }}" class="jme-btn">

                            <span class="jme-btn-text">
                                Know More About JME
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


                        <div class="about-x-signature">

                            <span class="about-x-signature-line"></span>

                            <div>

                                <small>
                                    OUR APPROACH
                                </small>

                                <strong>
                                    Concept <svg viewBox="0 0 24 24" width="15" height="11" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" aria-hidden="true">
                                        <path d="M5 12h14"></path>
                                        <path d="M13 6l6 6-6 6"></path>
                                    </svg> Execution
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
                                                                                                                                                                                                 JME CORE SERVICES
                                                                                                                                                                                                 5 SERVICE EPC HUB
                                                                                                                                                                                            ====================================================== -->

    <section class="jme-service-hub">

        <div class="jme-container">

            <!-- =============================================
                                                                                                                                                                                                         SECTION HEADING
                                                                                                                                                                                                    ============================================== -->

            <div class="service-hub-head">

                <div>

                    <div class="service-hub-kicker">


                        <span class="service-hub-kicker-icon">

                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M14.7 6.3a4 4 0 0 0-5 5L4.5 16.5a1.8 1.8 0 0 0 0 2.5l.5.5a1.8 1.8 0 0 0 2.5 0l5.2-5.2a4 4 0 0 0 5-5l-2.5 2.5-3-3 2.5-2.5Z" />

                                <path d="M17 16.5h2.2M18.1 15.4v2.2" />
                            </svg>

                        </span>

                        <span>
                            CORE SERVICES
                        </span>

                    </div>

                    <h2>
                        Engineering
                        <span>
                            Solutions.
                        </span>
                    </h2>

                </div>


                <div class="service-hub-head-right">

                    <p>
                        From specialized industrial systems to complete
                        turnkey EPC execution, JME Group delivers
                        coordinated solutions across five core service areas.
                    </p>

                    <!--<a href="services.html" class="jme-btn">-->

                    <!--    <span class="jme-btn-text">-->
                    <!--        Explore All Services-->
                    <!--    </span>-->

                    <!--    <span class="jme-btn-icon">-->
                    <!--        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"-->
                    <!--            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">-->
                    <!--            <path d="M5 12h14"></path>-->
                    <!--            <path d="M13 6l6 6-6 6"></path>-->
                    <!--        </svg>-->
                    <!--    </span>-->

                    <!--</a>-->

                </div>

            </div>



            <!-- =============================================
                                                                                                                                                                                                         SERVICE HUB
                                                                                                                                                                                                    ============================================== -->

            <div class="service-hub-layout">

                @php
                    $cardClasses = [
                        'service-hub-piping',
                        'service-hub-electrical',
                        'service-hub-turnkey',
                        'service-hub-network',
                        'service-hub-fire',
                    ];
                @endphp

                @foreach ($categories as $key => $category)
                    @php
                        $currentClass = $cardClasses[$key] ?? 'service-hub-piping';

                        $categoryCode = strtoupper(substr($category->name, 0, 3));
                    @endphp

                    <a href="{{ url('service/' . $category->slugname) }}" class="service-hub-item {{ $currentClass }}">

                        <div class="service-hub-image">

                            @if (!empty($category->image))
                                <img src="{{ asset('categories/' . $category->image) }}" alt="{{ $category->name }}">
                            @endif

                        </div>

                        <div class="service-hub-overlay"></div>


                        @if ($key == 2)
                            <div class="service-hub-turnkey-badge">

                                <span>
                                    JME
                                </span>

                                <strong>
                                    {{ $categoryCode }}
                                </strong>

                            </div>
                        @endif


                        <div class="service-hub-content">

                            <span class="service-hub-code">
                                {{ $categoryCode }}
                            </span>

                            <div>

                                <small>
                                    JME GROUP SERVICES
                                </small>

                                <h3>
                                    {{ $category->name }}
                                </h3>

                                <p>
                                    {{ $category->sort_desicription }}
                                </p>

                            </div>

                        </div>


                        <span class="service-hub-arrow">
                            ↗
                        </span>

                    </a>
                @endforeach

            </div>

        </div>

    </section>

    <!-- =====================================================
                                                                                                                                                                                                 JME CORE WORK SECTORS
                                                                                                                                                                                            ====================================================== -->

    <section class="jme-sector-showcase" id="coreWorkSectors">

        <div class="jme-container">

            <!-- =============================================
                                                                                                                                                                                                         SECTION HEADING
                                                                                                                                                                                                    ============================================== -->

            <div class="jme-sector-showcase-head">

                <div class="jme-sector-showcase-kicker">

                    <span class="jme-sector-showcase-kicker-line"></span>

                    <span class="jme-sector-showcase-kicker-icon">

                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M9.5 3h5l.7 2.1 2 .8 2-1 2.5 4.3-1.6 1.5.2 2.2 1.8 1.3-2.5 4.3-2.1-.6-1.8 1.3-.4 2.2h-5l-.7-2.1-2-.8-2 1L2.1 15l1.6-1.5-.2-2.2-1.8-1.3 2.5-4.3 2.1.6 1.8-1.3.4-2Z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>

                    </span>

                    <span>
                        OUR CORE WORK SECTORS
                    </span>

                    <span class="jme-sector-showcase-kicker-line"></span>

                </div>


                <h2>
                    Engineering
                    <span>Capabilities</span>
                </h2>


                <p>
                    Integrated solutions across industrial infrastructure,
                    utilities, power, networks and safety systems.
                </p>

            </div>

            <div class="jme-sector-showcase-grid">
                <article class="jme-sector-card">

                    <div class="jme-sector-card-media">

                        <img src="{{ asset('front/images/service-piping.jpg') }}" alt="Industrial Piping">

                        <div class="jme-sector-card-shape jme-sector-card-shape-blue">

                            <span class="jme-sector-card-main-icon">

                                <svg viewBox="0 0 24 24">
                                    <path d="M3 9h5v6H3z" />
                                    <path d="M16 9h5v6h-5z" />
                                    <path d="M8 11h8" />
                                    <path d="M8 13h8" />
                                    <path d="M1 12h2" />
                                    <path d="M21 12h2" />
                                </svg>

                            </span>

                        </div>

                    </div>


                    <div class="jme-sector-card-body">
                        <h3>
                            Industrial Piping
                        </h3>

                        <div class="jme-sector-card-divider"></div>


                        <ul class="jme-sector-card-list">

                            <li>
                                <strong>Specialization:</strong>
                                PPRC, HDPE, PVDF, FRP, PVC &
                                Electrofusion Welding.
                            </li>

                            <li>
                                <strong>Utility Piping:</strong>
                                Industrial chemical, water, steam,
                                and compressed air lines.
                            </li>

                            <li>
                                <strong>Airjet Looms:</strong>
                                High-efficiency piping networks
                                for textile industries.
                            </li>

                            <li>
                                <strong>Cooling Systems:</strong>
                                Chilling plants & cooling tower
                                water line setups.
                            </li>

                            <li>
                                <strong>E.T.P. & S.T.P.:</strong>
                                Effluent & Sewage Treatment Plant
                                design, execution & O&M.
                            </li>

                            <li>
                                <strong>Compliance:</strong>
                                Color coding, safety compliance &
                                Techno-Legal approvals (CTE/CCA).
                            </li>

                        </ul>

                    </div>

                </article>



                <!-- =========================================
                                                                                                                                                                                                             02 ELECTRICAL
                                                                                                                                                                                                        ========================================== -->

                <article class="jme-sector-card">

                    <div class="jme-sector-card-media">

                        <img src="{{ asset('front/images/service-electrical.jpg') }}" alt="Electrical Projects">

                        <div class="jme-sector-card-shape jme-sector-card-shape-green">

                            <span class="jme-sector-card-main-icon">

                                <svg viewBox="0 0 24 24">
                                    <path d="M13 2 5 13h6l-1 9 9-13h-6z" />
                                </svg>

                            </span>

                        </div>

                    </div>


                    <div class="jme-sector-card-body">
                        <h3>
                            Electrical Projects
                        </h3>


                        <div class="jme-sector-card-divider"></div>


                        <ul class="jme-sector-card-list">

                            <li>
                                <strong>HT / LT Networks:</strong>
                                High Tension & Low Tension power
                                distribution systems.
                            </li>

                            <li>
                                <strong>Turnkey Solutions:</strong>
                                Complete electrical design,
                                execution and commissioning.
                            </li>

                            <li>
                                <strong>Control Panels:</strong>
                                Custom design & installation of
                                MDB, SDB, APFC and PLC panels.
                            </li>

                            <li>
                                <strong>Power Cabling:</strong>
                                Transformer setups, main power
                                cabling & structured tray laying.
                            </li>

                            <li>
                                <strong>Safety & Protection:</strong>
                                Chemical earthing systems,
                                lightning arresters & maintenance.
                            </li>

                        </ul>

                    </div>

                </article>



                <!-- =========================================
                                                                                                                                                                                                             03 PASSIVE NETWORK
                                                                                                                                                                                                        ========================================== -->

                <article class="jme-sector-card">

                    <div class="jme-sector-card-media">

                        <img src="{{ asset('front/images/service-network.jpg') }}" alt="Data and Passive Network">

                        <div class="jme-sector-card-shape jme-sector-card-shape-blue">

                            <span class="jme-sector-card-main-icon">

                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="5" r="2" />
                                    <path d="M12 7v5" />
                                    <path d="M5 12h14" />
                                    <path d="M5 12v5" />
                                    <path d="M12 12v5" />
                                    <path d="M19 12v5" />
                                    <rect x="3" y="17" width="4" height="4" />
                                    <rect x="10" y="17" width="4" height="4" />
                                    <rect x="17" y="17" width="4" height="4" />
                                </svg>

                            </span>

                        </div>

                    </div>


                    <div class="jme-sector-card-body">
                        <h3>
                            Data & Passive Network
                        </h3>

                        <div class="jme-sector-card-divider"></div>


                        <ul class="jme-sector-card-list">

                            <li>
                                <strong>Structured Cabling:</strong>
                                Cat6/Cat6A copper cabling &
                                Fiber Optic (OFC) backbones.
                            </li>

                            <li>
                                <strong>Server Room Setup:</strong>
                                Rack dressing, patch panels,
                                cable management & labeling.
                            </li>

                            <li>
                                <strong>Industrial Networking:</strong>
                                Passive network design for plants,
                                offices & warehouses.
                            </li>

                            <li>
                                <strong>Network Testing:</strong>
                                Fluke testing, OTDR fiber testing
                                & link certification.
                            </li>

                            <li>
                                <strong>Infrastructure:</strong>
                                Cable tray routing, conduit
                                management & fiber splicing.
                            </li>

                        </ul>


                    </div>

                </article>



                <!-- =========================================
                                                                                                                                                                                                             04 FIRE & SAFETY
                                                                                                                                                                                                        ========================================== -->

                <article class="jme-sector-card">

                    <div class="jme-sector-card-media">

                        <img src="{{ asset('front/images/service-fire.jpg') }}" alt="Fireline and Safety Projects">

                        <div class="jme-sector-card-shape jme-sector-card-shape-green">

                            <span class="jme-sector-card-main-icon">

                                <svg viewBox="0 0 24 24">
                                    <path
                                        d="M12 2c2 4-3 6-3 10a3 3 0 0 0 6 0c0-2-1-3-1-5 3 2 5 5 5 9a7 7 0 0 1-14 0c0-4 2-8 7-14Z" />
                                </svg>

                            </span>

                        </div>

                    </div>


                    <div class="jme-sector-card-body">



                        <h3>
                            Fireline & Safety Projects
                        </h3>

                        <div class="jme-sector-card-divider"></div>


                        <ul class="jme-sector-card-list">

                            <li>
                                <strong>Fire Hydrant Systems:</strong>
                                High-pressure fire piping,
                                underground/above-ground hydrants & pumps.
                            </li>

                            <li>
                                <strong>Sprinkler Networks:</strong>
                                Automatic wet & dry fire sprinkler
                                systems for industrial plants.
                            </li>

                            <li>
                                <strong>Detection & Alarms:</strong>
                                Smoke/heat detectors, addressable
                                panels & emergency alarms.
                            </li>

                            <li>
                                <strong>Fire Piping & Valves:</strong>
                                CS, GI, and HDPE fire fighting
                                pipe lines with valves.
                            </li>

                            <li>
                                <strong>Audits & Compliance:</strong>
                                Fire NOC clearances, safety audits
                                & NBC/NFPA compliance.
                            </li>

                        </ul>

                    </div>

                </article>


            </div>



            <!-- =============================================
                                                                                                                                                                                                         KEY MATERIALS
                                                                                                                                                                                                    ============================================== -->

            <div class="jme-standard-strip">




                <div class="jme-standard-items">

                    <!-- PPRC -->

                    <div class="jme-standard-item">

                        <span class="jme-standard-item-icon">

                            <svg viewBox="0 0 24 24">
                                <path d="M3 9h5v6H3z"></path>
                                <path d="M16 9h5v6h-5z"></path>
                                <path d="M8 11h8"></path>
                                <path d="M8 13h8"></path>
                                <path d="M1 12h2"></path>
                                <path d="M21 12h2"></path>
                            </svg>

                        </span>

                        <span>
                            PPRC<br>
                            Piping
                        </span>

                    </div>


                    <!-- HDPE -->

                    <div class="jme-standard-item">

                        <span class="jme-standard-item-icon">

                            <svg viewBox="0 0 24 24">
                                <path d="M4 8h7v8H4z"></path>
                                <path d="M13 8h7v8h-7z"></path>
                                <path d="M11 10h2"></path>
                                <path d="M11 14h2"></path>
                                <path d="M2 12h2"></path>
                                <path d="M20 12h2"></path>
                            </svg>

                        </span>

                        <span>
                            HDPE<br>
                            Piping
                        </span>

                    </div>


                    <!-- PVDF -->

                    <div class="jme-standard-item">

                        <span class="jme-standard-item-icon">

                            <svg viewBox="0 0 24 24">
                                <path d="M12 3c3 4 5 6.5 5 9a5 5 0 0 1-10 0c0-2.5 2-5 5-9Z"></path>
                                <path d="M9.5 13.5c.8 1.3 2 2 3.5 2"></path>
                            </svg>

                        </span>

                        <span>
                            PVDF<br>
                            Piping
                        </span>

                    </div>


                    <!-- FRP -->

                    <div class="jme-standard-item">

                        <span class="jme-standard-item-icon">

                            <svg viewBox="0 0 24 24">
                                <path d="M4 6h16"></path>
                                <path d="M4 10h16"></path>
                                <path d="M4 14h16"></path>
                                <path d="M4 18h16"></path>
                                <path d="M7 4v16"></path>
                                <path d="M17 4v16"></path>
                            </svg>

                        </span>

                        <span>
                            FRP<br>
                            Piping
                        </span>

                    </div>


                    <!-- PVC / ELECTROFUSION -->

                    <div class="jme-standard-item">

                        <span class="jme-standard-item-icon">

                            <svg viewBox="0 0 24 24">
                                <path d="M3 10h6v4H3z"></path>
                                <path d="M15 10h6v4h-6z"></path>
                                <path d="M9 9h6v6H9z"></path>
                                <path d="m11 6 2 3"></path>
                                <path d="m13 15-2 3"></path>
                            </svg>

                        </span>

                        <span>
                            PVC &<br>
                            Electrofusion
                        </span>

                    </div>


                    <!-- HT / LT -->

                    <div class="jme-standard-item">

                        <span class="jme-standard-item-icon">

                            <svg viewBox="0 0 24 24">
                                <path d="M13 2 5 13h6l-1 9 9-13h-6z"></path>
                            </svg>

                        </span>

                        <span>
                            HT / LT<br>
                            Distribution
                        </span>

                    </div>


                    <!-- NETWORK -->

                    <div class="jme-standard-item">

                        <span class="jme-standard-item-icon">

                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="5" r="2"></circle>
                                <path d="M12 7v5"></path>
                                <path d="M5 12h14"></path>
                                <path d="M5 12v5"></path>
                                <path d="M12 12v5"></path>
                                <path d="M19 12v5"></path>
                                <rect x="3" y="17" width="4" height="4"></rect>
                                <rect x="10" y="17" width="4" height="4"></rect>
                                <rect x="17" y="17" width="4" height="4"></rect>
                            </svg>

                        </span>

                        <span>
                            Cat6 / Cat6A<br>
                            / Fiber Optic
                        </span>

                    </div>


                    <!-- PLC / APFC -->

                    <div class="jme-standard-item">

                        <span class="jme-standard-item-icon">

                            <svg viewBox="0 0 24 24">
                                <rect x="5" y="3" width="14" height="18" rx="1"></rect>
                                <path d="M8 7h8"></path>
                                <circle cx="9" cy="12" r="1"></circle>
                                <circle cx="15" cy="12" r="1"></circle>
                                <path d="M8 16h8"></path>
                            </svg>

                        </span>

                        <span>
                            PLC &<br>
                            APFC Panels
                        </span>

                    </div>


                    <!-- HYDRANT -->

                    <div class="jme-standard-item">

                        <span class="jme-standard-item-icon">

                            <svg viewBox="0 0 24 24">
                                <path d="M8 21v-9a4 4 0 0 1 8 0v9"></path>
                                <path d="M6 21h12"></path>
                                <path d="M7 8h10"></path>
                                <path d="M9 4h6"></path>
                                <path d="M12 4v4"></path>
                                <path d="M5 13h3"></path>
                                <path d="M16 13h3"></path>
                            </svg>

                        </span>

                        <span>
                            Hydrant &<br>
                            Sprinklers
                        </span>

                    </div>


                    <!-- FIRE ALARM -->

                    <div class="jme-standard-item">

                        <span class="jme-standard-item-icon">

                            <svg viewBox="0 0 24 24">
                                <path d="M7 17h10"></path>
                                <path d="M9 17v2h6v-2"></path>
                                <path d="M6 17c1-1 2-3 2-6a4 4 0 0 1 8 0c0 3 1 5 2 6"></path>
                                <path d="M12 3v2"></path>
                                <path d="M5 6 3.5 4.5"></path>
                                <path d="m19 6 1.5-1.5"></path>
                            </svg>

                        </span>

                        <span>
                            Fire Alarms<br>
                            & NOC
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
                                                                                                                                                                                                 JME INDIA NETWORK
                                                                                                                                                                                            ====================================================== -->

    <section class="jme-india-network" id="jmeIndiaPresence">

        <div class="jme-container">


            <!-- =============================================
                                                                                                                                                                                                         SECTION HEADER
                                                                                                                                                                                                    ============================================== -->

            <div class="jme-india-network-head">

                <div>

                    <div class="jme-india-network-kicker">

                        <span class="jme-india-network-kicker-icon">

                            <svg viewBox="0 0 24 24">
                                <path d="M12 21s7-6.1 7-12a7 7 0 1 0-14 0c0 5.9 7 12 7 12Z"></path>
                                <circle cx="12" cy="9" r="2.5"></circle>
                            </svg>

                        </span>

                        <span>
                            OUR NETWORK
                        </span>

                    </div>


                    <h2>
                        Connected
                        <span>
                            Across India.
                        </span>
                    </h2>

                </div>


                <div class="jme-india-network-head-copy">

                    <p>
                        With a strong presence across India, we are committed
                        to delivering quality, reliability and excellence.
                        Our network enables us to stay closer to our clients
                        and serve them better, every day.
                    </p>

                </div>

            </div>



            <!-- =============================================
                                                                                                                                                                                                         MAIN NETWORK BOARD
                                                                                                                                                                                                    ============================================== -->

            <div class="jme-india-network-board">


                <!-- =========================================
                                                                                                                                                                                                             LEFT PANEL
                                                                                                                                                                                                        ========================================== -->

                <aside class="jme-india-network-proof">


                    <div class="jme-india-network-proof-label">

                        <i></i>

                        <span>
                            NATIONWIDE PRESENCE
                        </span>

                    </div>


                    <div class="jme-india-network-count">

                        <strong>
                            54
                        </strong>


                        <div>

                            <span>
                                LOCATIONS
                            </span>

                            <small>
                                ACROSS INDIA
                            </small>

                        </div>

                    </div>


                    <p class="jme-india-network-proof-copy">
                        Our growing network enables coordinated
                        project execution and dependable service
                        across major industrial regions.
                    </p>



                    <!-- PROOF LIST -->

                    <div class="jme-india-network-proof-list">


                        <!-- 01 -->

                        <div class="jme-india-network-proof-item">

                            <span class="jme-india-network-proof-icon">

                                <svg viewBox="0 0 24 24">

                                    <path d="M12 21s6-5.4 6-11a6 6 0 1 0-12 0c0 5.6 6 11 6 11Z"></path>

                                    <circle cx="12" cy="10" r="2"></circle>

                                </svg>

                            </span>


                            <div>

                                <strong>
                                    Widespread Presence
                                </strong>

                                <small>
                                    Across major cities and industrial hubs
                                </small>

                            </div>

                        </div>



                        <!-- 02 -->

                        <div class="jme-india-network-proof-item">

                            <span class="jme-india-network-proof-icon">

                                <svg viewBox="0 0 24 24">

                                    <path d="M8 12 4 9l3-3 5 3"></path>

                                    <path d="m16 12 4-3-3-3-5 3"></path>

                                    <path d="m8 12 3 3c.7.7 1.8.7 2.5 0L16 12"></path>

                                </svg>

                            </span>


                            <div>

                                <strong>
                                    Strong Connect
                                </strong>

                                <small>
                                    Building reliable relationships nationwide
                                </small>

                            </div>

                        </div>



                        <!-- 03 -->

                        <div class="jme-india-network-proof-item">

                            <span class="jme-india-network-proof-icon">

                                <svg viewBox="0 0 24 24">

                                    <path d="M12 3 19 6v5c0 4.7-2.9 8-7 10-4.1-2-7-5.3-7-10V6l7-3Z"></path>

                                    <path d="m9 12 2 2 4-5"></path>

                                </svg>

                            </span>


                            <div>

                                <strong>
                                    Committed Service
                                </strong>

                                <small>
                                    Delivering excellence wherever we operate
                                </small>

                            </div>

                        </div>

                    </div>

                </aside>



                <!-- =========================================
                                                                                                                                                                                                             CENTER MAP
                                                                                                                                                                                                        ========================================== -->

                <div class="jme-india-network-map-panel">


                    <!-- MAP TOP -->

                    <div class="jme-india-network-map-head">

                        <span>
                            JME / INDIA NETWORK
                        </span>


                        <span class="jme-india-network-live">

                            <i></i>

                            ACTIVE NETWORK

                        </span>

                    </div>



                    <!-- MAP AREA -->

                    <div class="jme-india-network-map-canvas">


                        <span class="jme-india-map-corner corner-one"></span>

                        <span class="jme-india-map-corner corner-two"></span>



                        <!-- =================================
                                                                                                                                                                                                                     IMPORTANT:
                                                                                                                                                                                                                     OVERLAY PARENT + IMAGE SAME SIZE
                                                                                                                                                                                                                ================================== -->

                        <div class="jme-india-map-image-box">

                            <!-- BROCHURE MAP IMAGE -->

                            <img src="{{ asset('front/images/jme-network-map.jpg') }}"
                                alt="JME Group Network Across India" class="jme-india-map-image">



                            <!-- =================================
                                                                                                                                                                                                                         ACTIVE MARKER ONLY
                                                                                                                                                                                                                         NO EXTRA STATIC DOTS
                                                                                                                                                                                                                    ================================== -->

                            <div class="jme-india-map-active" id="jmeIndiaActiveMarker">

                                <span class="jme-india-map-active-wave"></span>

                                <span class="jme-india-map-active-core"></span>

                            </div>



                            <!-- CITY NAME ON IMAGE -->

                            <div class="jme-india-map-tooltip" id="jmeIndiaMapTooltip">
                                Ahmedabad
                            </div>

                        </div>



                        <!-- MAP BOTTOM LABEL -->

                        <div class="jme-india-map-points-label">

                            <i></i>

                            <span>
                                Nationwide Network
                            </span>

                        </div>

                    </div>

                </div>



                <!-- =========================================
                                                                                                                                                                                                             RIGHT PANEL
                                                                                                                                                                                                        ========================================== -->

                <div class="jme-india-network-monitor">


                    <!-- STATUS -->

                    <div class="jme-india-monitor-head">

                        <span>
                            NETWORK STATUS
                        </span>

                        <i></i>

                        <strong>
                            LIVE
                        </strong>

                    </div>



                    <!-- ACTIVE LOCATION -->

                    <div class="jme-india-current">


                        <span class="jme-india-current-icon">

                            <svg viewBox="0 0 24 24">

                                <path d="M12 21s6-5.4 6-11a6 6 0 1 0-12 0c0 5.6 6 11 6 11Z"></path>

                                <circle cx="12" cy="10" r="2"></circle>

                            </svg>

                        </span>


                        <span class="jme-india-current-label">
                            CURRENT PRESENCE
                        </span>


                        <h3 id="jmeIndiaCurrentCity">
                            Ahmedabad
                        </h3>


                        <div class="jme-india-current-counter">

                            <span id="jmeIndiaCurrentIndex">
                                01
                            </span>

                            <i></i>

                            <span>
                                54
                            </span>

                        </div>


                        <div class="jme-india-current-progress">

                            <span id="jmeIndiaProgressBar"></span>

                        </div>

                    </div>



                    <!-- CONTROLS -->

                    <div class="jme-india-network-controls">

                        <button type="button" id="jmeIndiaPrev" aria-label="Previous Location">
                            ←
                        </button>


                        <span>
                            Explore Network
                        </span>


                        <button type="button" id="jmeIndiaNext" aria-label="Next Location">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M5 12h14"></path>
                                <path d="M13 6l6 6-6 6"></path>
                            </svg>
                        </button>

                    </div>



                    <!-- INFO -->

                    <div class="jme-india-network-details">


                        <div>

                            <small>
                                PRESENCE TYPE
                            </small>

                            <strong>
                                Industrial Network
                            </strong>

                        </div>


                        <div>

                            <small>
                                COVERAGE
                            </small>

                            <strong>
                                Pan India
                            </strong>

                        </div>


                        <div>

                            <small>
                                SERVICE
                            </small>

                            <strong>
                                EPC Support
                            </strong>

                        </div>

                    </div>



                    <!-- BUTTON -->

                    <a href="{{ route('contactus') }}" class="jme-btn">

                        <span class="jme-btn-text">
                            Connect With JME
                        </span>

                        <span class="jme-btn-icon">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M5 12h14"></path>
                                <path d="M13 6l6 6-6 6"></path>
                            </svg>
                        </span>

                    </a>

                </div>

            </div>



            <!-- =============================================
                                                                                                                                                                                                         BOTTOM RAIL
                                                                                                                                                                                                    ============================================== -->

            <div class="jme-india-network-bottom">


                <div>

                    <span>
                        NETWORK COVERAGE
                    </span>

                    <strong>
                        Serving Industrial India
                    </strong>

                </div>


                <div class="jme-india-network-bars" id="jmeIndiaNetworkBars">

                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>
                    <i></i>

                </div>


                <div class="jme-india-network-bottom-count">

                    <strong>
                        54
                    </strong>

                    <span>
                        Locations
                    </span>

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================================
                                                                 OUR CLIENTS - CLEAN LOGO AUTO SLIDER
                                                            ========================================================= -->

    <section class="jme-clients-strip">

        <div class="container">

            <div class="jme-clients-strip-wrap">


                <!-- LEFT FADE -->
                <span class="jme-clients-strip-fade jme-clients-strip-fade-left"></span>


                <!-- RIGHT FADE -->
                <span class="jme-clients-strip-fade jme-clients-strip-fade-right"></span>


                <!-- =================================================
                                                                             AUTO SCROLL TRACK
                                                                        ================================================== -->

                <div class="jme-clients-strip-track">


                    <!-- =============================================
                                                                                 GROUP 01
                                                                            ============================================== -->

                    <div class="jme-clients-strip-group">


                        <!-- CLIENT 01 -->
                        @foreach ($ourclients as $ourclient)
                            <div class="jme-clients-strip-card">

                                <div class="jme-clients-strip-image">

                                    <img src="{{ asset('/our-client/' . $ourclient->image) }}" alt="Client Logo">

                                </div>

                            </div>
                        @endforeach



                    </div>

                </div>

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
                            LATEST INSIGHTS
                        </span>
                    </div>

                    <h2>
                        Industry
                        <span>
                            Insights.
                        </span>
                    </h2>

                </div>

                <div class="jme-latest-head-right">
                    <p>
                        Explore practical engineering knowledge,
                        technical insights and industry updates
                        from JME Group.
                    </p>

                    <a href="{{ route('blog') }}" class="jme-btn">

                        <span class="jme-btn-text">
                            View All Blogs
                        </span>

                        <span class="jme-btn-icon">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
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

                                <!--<span>-->

                                <!--    {{ $readTime }} MIN READ-->

                                <!--</span>-->


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


@endsection
@section('scripts')
@endsection
