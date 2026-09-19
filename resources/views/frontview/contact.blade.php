<style>
    .jme-contact-v2-info-text small {
        font-size: 11px !important;
    }

    .jme-contact-v2-info-text p {
        font-size: 11px !important;
    }

    /* =========================================================
   CONTACT SOCIAL MEDIA
========================================================= */

    .jme-contact-v2-info-text .jme-contact-v2-socials {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        flex-wrap: nowrap;

        gap: 8px;

        margin-top: 7px;
    }


    /* IMPORTANT:
   Override normal contact link CSS
========================================================= */

    .jme-contact-v2-info-text .jme-contact-v2-socials .jme-contact-v2-social {

        position: relative;

        width: 34px;
        height: 34px;

        min-width: 34px;
        max-width: 34px;

        min-height: 34px;
        max-height: 34px;

        flex:
            0 0 34px;

        display: inline-flex !important;

        align-items: center;
        justify-content: center;

        padding: 0 !important;
        margin: 0 !important;

        color:
            var(--color-blue);

        background:
            var(--color-blue-soft);

        border:
            1px solid var(--color-border);

        border-radius: 50%;

        text-decoration: none;

        overflow: hidden;

        line-height: 1;

        transition:
            color .3s ease,
            background .3s ease,
            border-color .3s ease,
            transform .3s ease,
            box-shadow .3s ease;
    }


    /* =========================================================
   SOCIAL SVG
========================================================= */

    .jme-contact-v2-info-text .jme-contact-v2-socials .jme-contact-v2-social svg {

        width: 16px !important;
        height: 16px !important;

        min-width: 16px;
        min-height: 16px;

        display: block;

        margin: 0 !important;
        padding: 0 !important;

        fill: none !important;

        stroke:
            currentColor !important;

        stroke-width: 1.7;

        stroke-linecap: round;
        stroke-linejoin: round;

        transition:
            transform .3s ease;
    }


    /* =========================================================
   HOVER
========================================================= */

    .jme-contact-v2-info-text .jme-contact-v2-socials .jme-contact-v2-social:hover {

        color: #ffffff !important;

        background:
            var(--color-green);

        border-color:
            var(--color-green);

        transform:
            translateY(-3px);

        box-shadow:
            0 7px 16px rgba(73, 169, 66, .20);
    }


    .jme-contact-v2-info-text .jme-contact-v2-socials .jme-contact-v2-social:hover svg {

        transform:
            scale(1.08);
    }

    .jme-captcha-wrap {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 4px 0 12px;
    }


    /* Captcha Image */
    .jme-captcha-image {
        height: 46px;
        display: flex;
        align-items: center;
        border: 1px solid #e1e6ef;
        border-radius: 6px;
        background: #fff;
        overflow: hidden;
    }

    .jme-captcha-image span {
        display: flex;
        align-items: center;
    }

    .jme-captcha-image img {
        height: 46px;
        width: auto;
        display: block;
    }


    /* Red Refresh Button */
    .jme-captcha-reload {
        width: 46px;
        height: 46px;
        min-width: 46px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 0;
        outline: 0;
        border-radius: 6px;

        background: #df293d;
        color: #ffffff;

        cursor: pointer;

        transition:
            background 0.25s ease,
            transform 0.25s ease,
            box-shadow 0.25s ease;
    }

    .jme-captcha-reload svg {
        display: block;
        width: 20px;
        height: 20px;
        stroke: #ffffff;
    }


    /* Hover */
    .jme-captcha-reload:hover {
        background: #c91f32;
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 5px 12px rgba(223, 41, 61, 0.25);
    }


    /* Click */
    .jme-captcha-reload:active {
        transform: scale(0.95);
    }


    /* Error */
    .captcha-error {
        display: block;
        margin-top: 6px;
        color: #df293d;
        font-size: 12px;
    }
</style>
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
    <main class="jme-contact-v2">


        <!-- =====================================================
                                                                                                             HERO
                                                                                                        ====================================================== -->
        <section class="jme-contact-v2-hero">

            <div class="jme-contact-v2-hero-left">

                <div class="jme-contact-v2-hero-copy">

                    <div class="jme-contact-v2-kicker">
                        <span></span>
                        LET'S BUILD A STRONGER TOMORROW
                    </div>

                    <h1>
                        Get In <strong>Touch</strong>
                    </h1>

                    <p>
                        We are here to help. Reach out to our team for enquiries,
                        technical consultations, site surveys, or project estimates.
                        Let's discuss how JME Group can support your next project.
                    </p>


                    <!-- HERO FEATURES -->
                    <div class="jme-contact-v2-features">

                        <div class="jme-contact-v2-feature">

                            <div class="jme-contact-v2-feature-icon">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path d="M12 2v3M12 19v3M2 12h3M19 12h3"></path>
                                    <path d="M5 5l2 2M17 17l2 2M19 5l-2 2M7 17l-2 2"></path>
                                </svg>
                            </div>

                            <div>
                                Engineering
                                <span>Expertise</span>
                            </div>

                        </div>


                        <div class="jme-contact-v2-feature">

                            <div class="jme-contact-v2-feature-icon">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="8" cy="7" r="3"></circle>
                                    <circle cx="17" cy="7" r="3"></circle>
                                    <path d="M2 20v-2a5 5 0 0 1 5-5h2a5 5 0 0 1 5 5v2"></path>
                                    <path d="M14 14a5 5 0 0 1 8 4v2"></path>
                                </svg>
                            </div>

                            <div>
                                Trusted
                                <span>Partnership</span>
                            </div>

                        </div>


                        <div class="jme-contact-v2-feature">

                            <div class="jme-contact-v2-feature-icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 20v-5M9 20v-9M14 20v-6M19 20V4"></path>
                                </svg>
                            </div>

                            <div>
                                Sustainable
                                <span>Growth</span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- RIGHT IMAGE -->
            <div class="jme-contact-v2-hero-image">

                <img src="{{ asset('front/images/breadcrumb.png') }}" alt="JME Group Industrial EPC Plant">

                <div class="jme-contact-v2-image-shade"></div>

                <span class="jme-contact-v2-blue-shape"></span>
                <span class="jme-contact-v2-green-shape"></span>


                <div class="jme-contact-v2-image-message">

                    <span></span>

                    <p>
                        Delivering<br>
                        Integrated EPC Solutions<br>
                        for a Better Tomorrow
                    </p>

                </div>

            </div>

        </section>



        <!-- =====================================================
                                                                                                             FLOATING CONTACT BAR
                                                                                                        ====================================================== -->
        <section class="jme-contact-v2-info">

            <div class="jme-contact-v2-container">

                <div class="jme-contact-v2-info-card">


                    <div class="jme-contact-v2-info-item">

                        <div class="jme-contact-v2-info-icon">

                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M8 12h8"></path>
                                <path d="M12 8v8"></path>
                            </svg>

                        </div>


                        <div class="jme-contact-v2-info-text">

                            <small>Follow Us</small>

                            <div class="jme-contact-v2-socials">

                                <!-- Facebook -->
                                <a href="" target="_blank" class="jme-contact-v2-social" aria-label="Facebook">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M14 8h3V4h-3c-3 0-5 2-5 5v3H6v4h3v5h4v-5h3l1-4h-4V9c0-.7.3-1 1-1z"></path>
                                    </svg>

                                </a>


                                <!-- Instagram -->
                                <a href="" target="_blank" class="jme-contact-v2-social" aria-label="Instagram">

                                    <svg viewBox="0 0 24 24">

                                        <rect x="4" y="4" width="16" height="16" rx="5"></rect>

                                        <circle cx="12" cy="12" r="3.5"></circle>

                                        <circle cx="17" cy="7" r=".8"></circle>

                                    </svg>

                                </a>


                                <!-- LinkedIn -->
                                <a href="" target="_blank" class="jme-contact-v2-social" aria-label="LinkedIn">

                                    <svg viewBox="0 0 24 24">

                                        <path d="M6 9v9"></path>

                                        <path d="M6 6.5v.01"></path>

                                        <path d="M10 18v-9"></path>

                                        <path d="M10 13c0-2.2 1.4-4 3.8-4 2.2 0 4.2 1.5 4.2 4.5V18"></path>

                                    </svg>

                                </a>


                                <!-- YouTube -->
                                <a href="" target="_blank" class="jme-contact-v2-social" aria-label="YouTube">

                                    <svg viewBox="0 0 24 24">

                                        <path
                                            d="M20 8.5c-.2-1.2-.9-1.9-2.1-2.1C16 6.1 14 6 12 6s-4 .1-5.9.4C4.9 6.6 4.2 7.3 4 8.5c-.2 1.1-.3 2.3-.3 3.5s.1 2.4.3 3.5c.2 1.2.9 1.9 2.1 2.1C8 17.9 10 18 12 18s4-.1 5.9-.4c1.2-.2 1.9-.9 2.1-2.1.2-1.1.3-2.3.3-3.5s-.1-2.4-.3-3.5z">
                                        </path>

                                        <path d="M10 9l5 3-5 3z"></path>

                                    </svg>

                                </a>

                            </div>

                            <p>
                                Connect with us on social media.
                            </p>

                        </div>

                    </div>

                    <!-- EMAIL -->
                    <div class="jme-contact-v2-info-item">

                        <div class="jme-contact-v2-info-icon">

                            <svg viewBox="0 0 24 24">
                                <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                                <path d="M3 7l9 6 9-6"></path>
                            </svg>

                        </div>


                        <div class="jme-contact-v2-info-text">

                            <small>
                                General Enquiry
                            </small>

                            <a href="mailto:enquiry@jaymahakalenterprisegroup.com">
                                enquiry@jaymahakalenterprisegroup.com
                            </a>

                            <p>
                                Connect with our team for your enquiry.
                            </p>

                        </div>

                    </div>



                    <!-- PHONE -->
                    <div class="jme-contact-v2-info-item">

                        <div class="jme-contact-v2-info-icon">

                            <svg viewBox="0 0 24 24" aria-hidden="true">

                                <path d="M6.6 10.8
                   c1.4 2.8 3.8 5.1 6.6 6.6
                   l2.2-2.2
                   c.3-.3.8-.4 1.2-.2
                   1.3.5 2.6.8 4 .9
                   .5 0 .9.4 .9.9
                   V20
                   c0 .5-.2.9-.6 1.2
                   -1 .9-2.4 1.3-3.7 1.3
                   -8.8 0-16-7.2-16-16
                   0-1.3.4-2.7 1.3-3.7
                   .3-.4.7-.6 1.2-.6
                   h3.2
                   c.5 0 .9.4.9.9
                   .1 1.4.4 2.7.9 4
                   .1.4 0 .9-.3 1.2
                   z"></path>

                            </svg>

                        </div>


                        <div class="jme-contact-v2-info-text">

                            <small>
                                Call Us
                            </small>

                            <a href="tel:+919714123111">
                                +91 97141 23111
                            </a>

                            <p>
                                Speak directly with our team.
                            </p>

                        </div>

                    </div>


                </div>

            </div>

        </section>



        <!-- =====================================================
                                                                                                             OFFICE LOCATIONS
                                                                                                        ====================================================== -->
        <section class="jme-contact-v2-offices">

            <div class="jme-contact-v2-container">


                <div class="jme-contact-v2-section-head">

                    <div>

                        <div class="jme-contact-v2-kicker">
                            <span></span>
                            OUR OFFICES
                        </div>

                        <h2>
                            Office <strong>Locations</strong>
                        </h2>

                    </div>


                    <p>
                        Visit us at either of our offices. We look forward
                        to meeting you and exploring opportunities
                        to work together.
                    </p>

                </div>



                <div class="jme-contact-v2-office-grid">


                    <!-- =========================================
                                                                                                                         PRIMARY OFFICE
                                                                                                                    ========================================== -->
                    <article class="jme-contact-v2-office-card">

                        <div class="jme-contact-v2-office-detail">

                            <div class="jme-contact-v2-pin">

                                <svg viewBox="0 0 24 24">
                                    <path d="M20 10c0 6-8 11-8 11S4 16 4 10a8 8 0 1 1 16 0z"></path>
                                    <circle cx="12" cy="10" r="2.5"></circle>
                                </svg>

                            </div>


                            <div class="jme-contact-v2-office-copy">

                                <h3>
                                    Primary Office
                                    <span>(Location 1)</span>
                                </h3>

                                <p>
                                    49, Om County, Oxygen City,<br>
                                    New Geratpur Road, Vinzol,<br>
                                    Ahmedabad - 382445,<br>
                                    Gujarat, India.
                                </p>

                            </div>

                        </div>


                        <div class="jme-contact-v2-map">

                            <iframe
                                src="https://www.google.com/maps?q=49%20Om%20County%20Oxygen%20City%20New%20Geratpur%20Road%20Vinzol%20Ahmedabad%20382445%20Gujarat%20India&output=embed"
                                loading="lazy" allowfullscreen>
                            </iframe>

                        </div>

                    </article>



                    <!-- =========================================
                                                                                                                         REGISTERED OFFICE
                                                                                                                    ========================================== -->
                    <article class="jme-contact-v2-office-card">

                        <div class="jme-contact-v2-office-detail">

                            <div class="jme-contact-v2-pin jme-contact-v2-pin-green">

                                <svg viewBox="0 0 24 24">
                                    <path d="M20 10c0 6-8 11-8 11S4 16 4 10a8 8 0 1 1 16 0z"></path>
                                    <circle cx="12" cy="10" r="2.5"></circle>
                                </svg>

                            </div>


                            <div class="jme-contact-v2-office-copy">

                                <h3>
                                    Registered Office
                                    <span>(Location 2)</span>
                                </h3>

                                <p>
                                    523, Jalpari Society,<br>
                                    Sumin Nagar, Vastral,<br>
                                    Ahmedabad - 382415,<br>
                                    Gujarat, India.
                                </p>

                            </div>

                        </div>


                        <div class="jme-contact-v2-map">

                            <iframe
                                src="https://www.google.com/maps?q=523%20Jalpari%20Society%20Sumin%20Nagar%20Vastral%20Ahmedabad%20382415%20Gujarat%20India&output=embed"
                                loading="lazy" allowfullscreen>
                            </iframe>

                        </div>

                    </article>


                </div>

            </div>

        </section>



        <!-- =====================================================
                                                                                                             CONTACT FORM
                                                                                                        ====================================================== -->
        <section class="jme-contact-v2-form-section">

            <div class="jme-contact-v2-container">

                <div class="jme-contact-v2-form-card">


                    <!-- LEFT DARK AREA -->
                    <div class="jme-contact-v2-form-intro">

                        <div class="jme-contact-v2-form-bg"></div>

                        <div class="jme-contact-v2-form-intro-inner">

                            <div class="jme-contact-v2-kicker jme-contact-v2-kicker-light">
                                <span></span>
                                SEND US A MESSAGE
                            </div>


                            <h2>
                                Contact <strong>Form</strong>
                            </h2>


                            <p>
                                Have a question or a project in mind?
                                Fill out the form and our team will
                                get back to you shortly.
                            </p>


                            <div class="jme-contact-v2-benefits">


                                <div class="jme-contact-v2-benefit">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M12 2l8 4v6c0 5-3 8-8 10-5-2-8-5-8-10V6z"></path>
                                        <path d="M9 12l2 2 4-4"></path>
                                    </svg>

                                    <span>
                                        Reliable
                                        <small>Support</small>
                                    </span>

                                </div>


                                <div class="jme-contact-v2-benefit">

                                    <svg viewBox="0 0 24 24">
                                        <circle cx="8" cy="7" r="3"></circle>
                                        <circle cx="17" cy="7" r="3"></circle>
                                        <path d="M2 20v-2a5 5 0 0 1 5-5h2a5 5 0 0 1 5 5v2"></path>
                                        <path d="M14 14a5 5 0 0 1 8 4v2"></path>
                                    </svg>

                                    <span>
                                        Expert
                                        <small>Team</small>
                                    </span>

                                </div>


                                <div class="jme-contact-v2-benefit">

                                    <svg viewBox="0 0 24 24">
                                        <path d="M4 14v-2a8 8 0 0 1 16 0v2"></path>
                                        <path d="M4 14h3v5H4z"></path>
                                        <path d="M17 14h3v5h-3z"></path>
                                    </svg>

                                    <span>
                                        Quick
                                        <small>Response</small>
                                    </span>

                                </div>


                            </div>

                        </div>

                    </div>



                    <!-- FORM RIGHT -->
                    <div class="jme-contact-v2-form-area">

                        <form action="{{ route('contact_us_store') }}" method="POST">

                            @csrf

                            <div class="jme-contact-v2-field-grid">

                                <input type="text" name="full_name" placeholder="Full Name *" required>

                                <input type="email" name="email" placeholder="Email Address *" required>

                                <input type="text" name="mobile" maxlength="10" placeholder="Phone Number *"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>

                                <input type="text" name="subject" placeholder="Subject *" required>

                            </div>

                            <textarea name="message" placeholder="Your Message *" required></textarea>
                            <div class="form-group {{ $errors->has('captcha') ? 'has-error' : '' }}">

                                <div class="jme-captcha-wrap">

                                    <div class="jme-captcha-image">
                                        <span>{!! captcha_img() !!}</span>
                                    </div>

                                    <button type="button" class="jme-captcha-reload" id="reload"
                                        aria-label="Refresh captcha" title="Refresh Captcha">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                                            stroke-linecap="round" stroke-linejoin="round">

                                            <path d="M20 6v6h-6"></path>
                                            <path d="M4 18v-6h6"></path>
                                            <path d="M18.5 9a7 7 0 0 0-11.7-2.6L4 9"></path>
                                            <path d="M5.5 15a7 7 0 0 0 11.7 2.6L20 15"></path>

                                        </svg>

                                    </button>

                                </div>

                                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha"
                                    name="captcha" autocomplete="off" required>

                                @if ($errors->has('captcha'))
                                    <span class="help-block captcha-error">
                                        {{ $errors->first('captcha') }}
                                    </span>
                                @endif

                            </div>

                            <div class="jme-contact-v2-form-bottom">

                                <button type="submit" class="jme-btn">

                                    <span class="jme-btn-text">
                                        Send Message
                                    </span>

                                    <span class="jme-btn-icon">

                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" aria-hidden="true">
                                            <path d="M5 12h14"></path>
                                            <path d="M13 6l6 6-6 6"></path>
                                        </svg>

                                    </span>

                                </button>


                                <p>
                                    By submitting this form, you agree
                                    to be contacted by JME Group
                                    regarding your enquiry.
                                </p>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </section>


    </main>


@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#reload').on('click', function(e) {
                e.preventDefault();

                let button = $(this);

                button.prop('disabled', true);
                button.addClass('captcha-loading');

                $.ajax({
                    type: 'GET',
                    url: '{{ route('refresh_captcha') }}',
                    cache: false,

                    success: function(data) {

                        $('.jme-captcha-image span').html(data.captcha);

                        $('#captcha').val('');

                        button.prop('disabled', false);
                        button.removeClass('captcha-loading');
                    },

                    error: function(xhr) {

                        console.log(xhr.responseText);

                        button.prop('disabled', false);
                        button.removeClass('captcha-loading');
                    }
                });

            });

        });
    </script>
@endsection
