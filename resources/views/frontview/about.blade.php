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

                    <h1>About Us</h1>

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
                            About Us
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

    <main class="about-profile-page">


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



                    </div>

                </div>

            </div>

        </section>



        <!-- =========================================
                                 VISION & MISSION
                            ========================================== -->
        <section class="about-profile-vm">
            <div class="container">

                <div class="about-profile-vm-grid">

                    <!-- =========================
                                             VISION
                                        ========================== -->
                    <article class="about-profile-vm-card about-profile-vision">

                        <div class="about-profile-vm-top">

                            <div class="about-profile-vm-title-wrap">

                                <span class="about-profile-vm-label">
                                    OUR PURPOSE
                                </span>

                                <div class="about-profile-vm-heading">
                                    <span class="vm-heading-line"></span>

                                    <h3>
                                        Our <strong>Vision</strong>
                                    </h3>
                                </div>

                            </div>


                            <!-- Vision Icon -->
                            <div class="about-profile-vm-icon">

                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M2.5 12s3.4-6 9.5-6 9.5 6 9.5 6-3.4 6-9.5 6-9.5-6-9.5-6z"></path>

                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>

                            </div>

                        </div>


                        <div class="about-profile-vm-content">

                            <p>
                                To be a globally recognized EPC solutions provider,
                                setting benchmarks in industrial engineering excellence,
                                innovation, sustainable execution, and client trust
                                across international markets.
                            </p>

                        </div>


                        <div class="about-profile-vm-footer">

                            <span class="vm-footer-line"></span>

                            <span>
                                Excellence • Innovation • Trust
                            </span>

                        </div>

                    </article>



                    <!-- =========================
                                             MISSION
                                        ========================== -->
                    <article class="about-profile-vm-card about-profile-mission">

                        <div class="about-profile-vm-top">

                            <div class="about-profile-vm-title-wrap">

                                <span class="about-profile-vm-label">
                                    OUR COMMITMENT
                                </span>

                                <div class="about-profile-vm-heading">
                                    <span class="vm-heading-line"></span>

                                    <h3>
                                        Our <strong>Mission</strong>
                                    </h3>
                                </div>

                            </div>


                            <!-- Mission Icon -->
                            <div class="about-profile-vm-icon">

                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <circle cx="12" cy="12" r="8"></circle>

                                    <circle cx="12" cy="12" r="4"></circle>

                                    <path d="M12 12l7-7"></path>

                                    <path d="M16.5 5H19v2.5"></path>
                                </svg>

                            </div>

                        </div>


                        <div class="about-profile-vm-content">

                            <p>
                                To deliver turnkey engineering projects with
                                uncompromising quality, strict safety adherence,
                                and timely execution, while continually adopting
                                world-class standards and technology.
                            </p>

                        </div>


                        <div class="about-profile-vm-footer">

                            <span class="vm-footer-line"></span>

                            <span>
                                Quality • Safety • Delivery
                            </span>

                        </div>

                    </article>

                </div>

            </div>
        </section>



        <!-- =========================================
                                 WHY CHOOSE US - NEW DESIGN
                            ========================================== -->
        <section class="about-strength-section">
            <div class="container">

                <!-- Heading -->
                <div class="about-strength-header">

                    <div class="about-strength-title">

                        <h2>
                            Built on Capability.
                            <strong>Driven by Trust.</strong>
                        </h2>

                    </div>

                    <div class="about-strength-intro">
                        <span class="about-strength-intro-line"></span>

                        <p>
                            From engineering and procurement to execution and
                            commissioning, our approach is built around quality,
                            safety, precision and long-term reliability.
                        </p>
                    </div>

                </div>


                <!-- Cards -->
                <div class="about-strength-grid">

                    <!-- 01 -->
                    <article class="about-strength-card">

                        <div class="about-strength-card-top">

                            <div class="about-strength-icon">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M12 2v3"></path>
                                    <path d="M12 19v3"></path>
                                    <path d="M2 12h3"></path>
                                    <path d="M19 12h3"></path>
                                    <path d="M4.9 4.9l2.1 2.1"></path>
                                    <path d="M17 17l2.1 2.1"></path>
                                    <path d="M19.1 4.9L17 7"></path>
                                    <path d="M7 17l-2.1 2.1"></path>
                                </svg>
                            </div>

                        </div>

                        <div class="about-strength-card-body">

                            <h3>End-to-End Execution</h3>

                            <p>
                                Complete lifecycle execution from turnkey Design,
                                Procurement & Supply to Installation, Testing and
                                Commissioning under one roof.
                            </p>

                        </div>

                        <div class="about-strength-card-bottom">
                            <span></span>
                            COMPLETE EPC DELIVERY
                        </div>

                    </article>


                    <!-- 02 -->
                    <article class="about-strength-card">

                        <div class="about-strength-card-top">

                            <div class="about-strength-icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M12 2l8 4v6c0 5-3.4 8-8 10-4.6-2-8-5-8-10V6z"></path>
                                    <path d="M9 12l2 2 4-4"></path>
                                </svg>
                            </div>

                        </div>

                        <div class="about-strength-card-body">

                            <h3>Work Quality &amp; Precision</h3>

                            <p>
                                Engineered with high-grade industrial components,
                                rigorous quality inspections and zero-defect
                                execution standards.
                            </p>

                        </div>

                        <div class="about-strength-card-bottom">
                            <span></span>
                            QUALITY FIRST
                        </div>

                    </article>


                    <!-- 03 -->
                    <article class="about-strength-card">

                        <div class="about-strength-card-top">

                            <div class="about-strength-icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M3 12l4-4 4 2 2-2 4 2 4 4-6 6H9z"></path>
                                    <path d="M8 13l3 3"></path>
                                    <path d="M16 13l-3 3"></path>
                                </svg>
                            </div>

                        </div>

                        <div class="about-strength-card-body">

                            <h3>Industry Goodwill &amp; Trust</h3>

                            <p>
                                Built on transparency, client satisfaction and
                                a proven track record of successful project
                                execution since 2019.
                            </p>

                        </div>

                        <div class="about-strength-card-bottom">
                            <span></span>
                            BUILT ON TRUST
                        </div>

                    </article>


                    <!-- 04 -->
                    <article class="about-strength-card">

                        <div class="about-strength-card-top">

                            <div class="about-strength-icon">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M3 12h18"></path>
                                    <path d="M12 3a15 15 0 0 1 0 18"></path>
                                    <path d="M12 3a15 15 0 0 0 0 18"></path>
                                </svg>
                            </div>


                        </div>

                        <div class="about-strength-card-body">

                            <h3>Global Standards Compliance</h3>

                            <p>
                                Strict adherence to international industrial
                                safety norms, standard protocols and technical
                                quality certifications.
                            </p>

                        </div>

                        <div class="about-strength-card-bottom">
                            <span></span>
                            GLOBAL STANDARDS
                        </div>

                    </article>


                    <!-- 05 -->
                    <article class="about-strength-card">

                        <div class="about-strength-card-top">

                            <div class="about-strength-icon">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M12 7v5l3 2"></path>
                                </svg>
                            </div>

                        </div>

                        <div class="about-strength-card-body">

                            <h3>Punctuality &amp; Timely Delivery</h3>

                            <p>
                                Structured project management ensures on-time
                                completion without compromising safety or
                                structural integrity.
                            </p>

                        </div>

                        <div class="about-strength-card-bottom">
                            <span></span>
                            ON-TIME EXECUTION
                        </div>

                    </article>


                    <!-- 06 -->
                    <article class="about-strength-card">

                        <div class="about-strength-card-top">

                            <div class="about-strength-icon">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="9" cy="8" r="3"></circle>
                                    <circle cx="17" cy="8" r="3"></circle>
                                    <path d="M2 20v-2a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v2"></path>
                                    <path d="M16 14a5 5 0 0 1 6 5v1"></path>
                                </svg>
                            </div>

                        </div>

                        <div class="about-strength-card-body">

                            <h3>Expert Technical Team</h3>

                            <p>
                                Highly skilled engineers and technicians dedicated
                                to delivering customized, cost-effective and
                                future-proof solutions.
                            </p>

                        </div>

                        <div class="about-strength-card-bottom">
                            <span></span>
                            TECHNICAL EXPERTISE
                        </div>

                    </article>

                </div>

            </div>
        </section>
    </main>
@endsection
@section('scripts')
@endsection
