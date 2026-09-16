@extends('layouts.front')
@section('title', 'Blog')
@section('content')

    <!-- =========================================
         JME ABOUT BREADCRUMB / INNER HERO
    ========================================= -->
    <section class="jme-inner-hero">

        <!-- Dark overlay -->
        <div class="jme-inner-overlay"></div>

        <!-- Decorative left lines -->
        <span class="jme-deco-line deco-line-1"></span>
        <span class="jme-deco-line deco-line-2"></span>

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

                        <a href="index.html" class="jme-home-link">

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


                <!-- =========================================
                     BLOG 01
                ========================================== -->

                <article class="jme-insight-card">

                    <a href="blog-detail.html" class="jme-insight-image">

                        <img src="assets/images/J.M.E. image  46.jpg" alt="Industrial Piping Material Selection">


                        <span class="jme-insight-image-cut"></span>


                        <span class="jme-insight-date">

                            <strong>
                                09
                            </strong>

                            <small>
                                SEP
                            </small>

                        </span>

                    </a>


                    <div class="jme-insight-body">

                        <div class="jme-insight-top">


                            <span class="jme-insight-category">
                                INDUSTRIAL PIPING
                            </span>

                        </div>


                        <h3>

                            <a href="blog-detail.html">
                                How to Choose the Right Industrial
                                Piping Material for Your Project
                            </a>

                        </h3>


                        <p>
                            Key factors to consider while selecting
                            piping materials for industrial utility
                            and process applications.
                        </p>


                        <div class="jme-insight-bottom">

                            <span>
                                5 MIN READ
                            </span>


                            <a href="blog-detail.html" class="jme-insight-link">

                                Read Insight

                                <i>
                                    ↗
                                </i>

                            </a>

                        </div>

                    </div>

                </article>



                <!-- =========================================
                     BLOG 02
                ========================================== -->

                <article class="jme-insight-card jme-insight-card-alt">

                    <a href="blog-detail.html" class="jme-insight-image">

                        <img src="assets/images/J.M.E. image  12.jpg" alt="Industrial Electrical Project Planning">


                        <span class="jme-insight-image-cut"></span>


                        <span class="jme-insight-date">

                            <strong>
                                06
                            </strong>

                            <small>
                                SEP
                            </small>

                        </span>

                    </a>


                    <div class="jme-insight-body">

                        <div class="jme-insight-top">



                            <span class="jme-insight-category">
                                ELECTRICAL PROJECTS
                            </span>

                        </div>


                        <h3>

                            <a href="blog-detail.html">
                                Key Factors in Industrial
                                Electrical Project Planning
                            </a>

                        </h3>


                        <p>
                            Understand the important planning factors
                            behind safe, efficient and reliable
                            industrial electrical infrastructure.
                        </p>


                        <div class="jme-insight-bottom">

                            <span>
                                6 MIN READ
                            </span>


                            <a href="blog-detail.html" class="jme-insight-link">

                                Read Insight

                                <i>
                                    ↗
                                </i>

                            </a>

                        </div>

                    </div>

                </article>



                <!-- =========================================
                     BLOG 03
                ========================================== -->

                <article class="jme-insight-card">

                    <a href="blog-detail.html" class="jme-insight-image">

                        <img src="assets/images/J.M.E. image  24.jpg" alt="Fire Protection Compliance">


                        <span class="jme-insight-image-cut"></span>


                        <span class="jme-insight-date">

                            <strong>
                                02
                            </strong>

                            <small>
                                SEP
                            </small>

                        </span>

                    </a>


                    <div class="jme-insight-body">

                        <div class="jme-insight-top">


                            <span class="jme-insight-category">
                                FIRE & SAFETY
                            </span>

                        </div>


                        <h3>

                            <a href="blog-detail.html">
                                Why Fire Protection Compliance
                                Matters in Industrial Facilities
                            </a>

                        </h3>


                        <p>
                            Learn why correctly designed fire protection
                            systems are essential for industrial safety
                            and compliance.
                        </p>


                        <div class="jme-insight-bottom">

                            <span>
                                4 MIN READ
                            </span>


                            <a href="blog-detail.html" class="jme-insight-link">

                                Read Insight

                                <i>
                                    ↗
                                </i>

                            </a>

                        </div>

                    </div>

                </article>
                <!-- =========================================
         BLOG 04
    ========================================== -->

                <article class="jme-insight-card jme-insight-card-alt">

                    <a href="blog-detail.html" class="jme-insight-image">

                        <img src="assets/images/J.M.E. image  28.jpg" alt="Industrial Utility Piping Systems">

                        <span class="jme-insight-image-cut"></span>

                        <span class="jme-insight-date">

                            <strong>
                                30
                            </strong>

                            <small>
                                AUG
                            </small>

                        </span>

                    </a>


                    <div class="jme-insight-body">

                        <div class="jme-insight-top">

                            <span class="jme-insight-category">
                                UTILITY PIPING
                            </span>

                        </div>


                        <h3>

                            <a href="blog-detail.html">
                                Essential Considerations for Industrial
                                Utility Piping Systems
                            </a>

                        </h3>


                        <p>
                            Understand the key factors behind efficient,
                            reliable and long-lasting utility piping
                            systems in industrial facilities.
                        </p>


                        <div class="jme-insight-bottom">

                            <span>
                                5 MIN READ
                            </span>


                            <a href="blog-detail.html" class="jme-insight-link">

                                Read Insight

                                <i>
                                    ↗
                                </i>

                            </a>

                        </div>

                    </div>

                </article>



                <!-- =========================================
         BLOG 05
    ========================================== -->

                <article class="jme-insight-card">

                    <a href="blog-detail.html" class="jme-insight-image">

                        <img src="assets/images/J.M.E. image  27.jpg" alt="Industrial Earthing and Lightning Protection">

                        <span class="jme-insight-image-cut"></span>

                        <span class="jme-insight-date">

                            <strong>
                                26
                            </strong>

                            <small>
                                AUG
                            </small>

                        </span>

                    </a>


                    <div class="jme-insight-body">

                        <div class="jme-insight-top">

                            <span class="jme-insight-category">
                                ELECTRICAL SAFETY
                            </span>

                        </div>


                        <h3>

                            <a href="blog-detail.html">
                                Why Proper Earthing &amp; Lightning Protection
                                Is Critical for Industries
                            </a>

                        </h3>


                        <p>
                            Discover how properly designed earthing and
                            lightning protection systems help safeguard
                            equipment, infrastructure and personnel.
                        </p>


                        <div class="jme-insight-bottom">

                            <span>
                                6 MIN READ
                            </span>


                            <a href="blog-detail.html" class="jme-insight-link">

                                Read Insight

                                <i>
                                    ↗
                                </i>

                            </a>

                        </div>

                    </div>

                </article>



                <!-- =========================================
         BLOG 06
    ========================================== -->

                <article class="jme-insight-card jme-insight-card-alt">

                    <a href="blog-detail.html" class="jme-insight-image">

                        <img src="assets/images/J.M.E. image  25.jpg" alt="EPC Project Coordination">

                        <span class="jme-insight-image-cut"></span>

                        <span class="jme-insight-date">

                            <strong>
                                21
                            </strong>

                            <small>
                                AUG
                            </small>

                        </span>

                    </a>


                    <div class="jme-insight-body">

                        <div class="jme-insight-top">

                            <span class="jme-insight-category">
                                EPC PROJECTS
                            </span>

                        </div>


                        <h3>

                            <a href="blog-detail.html">
                                How Effective EPC Coordination Improves
                                Project Execution
                            </a>

                        </h3>


                        <p>
                            Learn how engineering, procurement and construction
                            coordination can reduce delays, improve quality
                            and streamline project delivery.
                        </p>


                        <div class="jme-insight-bottom">

                            <span>
                                7 MIN READ
                            </span>


                            <a href="blog-detail.html" class="jme-insight-link">

                                Read Insight

                                <i>
                                    ↗
                                </i>

                            </a>

                        </div>

                    </div>

                </article>





            </div>

        </div>

    </section>

@endsection
@section('scripts')
@endsection
