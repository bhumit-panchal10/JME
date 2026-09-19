@extends('layouts.front')
@section('title', 'Success')
@section('content')
    <main>

        <section class="jme-thankyou">

            <!-- BACKGROUND DECORATION -->
            <span class="jme-thankyou-line line-one"></span>
            <span class="jme-thankyou-line line-two"></span>
            <span class="jme-thankyou-line line-three"></span>


            <div class="container">

                <div class="jme-thankyou-wrap">


                    <!-- TOP LABEL -->

                    <div class="jme-thankyou-label">

                        <span></span>

                        <p>
                            JAY MAHAKAL ENTERPRISE GROUP
                        </p>

                        <span></span>

                    </div>


                    <!-- SUCCESS CARD -->

                    <div class="jme-thankyou-card">


                        <!-- CHECK ICON -->

                        <div class="jme-thankyou-success">

                            <div class="jme-thankyou-success-ring"></div>

                            <div class="jme-thankyou-success-icon">

                                <svg viewBox="0 0 24 24">

                                    <path d="M5 12.5l4.2 4.2L19 7"></path>

                                </svg>

                            </div>

                        </div>



                        <!-- CONTENT -->

                        <span class="jme-thankyou-small">
                            MESSAGE RECEIVED
                        </span>


                        <h1>
                            Thank You!
                        </h1>


                        <h2>
                            Your inquiry has been submitted successfully.
                        </h2>


                        <p class="jme-thankyou-description">
                            Thank you for contacting Jay Mahakal Enterprise Group.
                            Our team has received your inquiry and will connect with
                            you as soon as possible.
                        </p>



                        <!-- DIVIDER -->

                        <div class="jme-thankyou-divider">

                            <span></span>

                            <i></i>

                            <span></span>

                        </div>



                        <!-- INFO -->

                        <div class="jme-thankyou-note">

                            <div class="jme-thankyou-note-icon">

                                <svg viewBox="0 0 24 24">

                                    <circle cx="12" cy="12" r="9"></circle>

                                    <path d="M12 8v4"></path>

                                    <path d="M12 16h.01"></path>

                                </svg>

                            </div>


                            <div>

                                <strong>
                                    What happens next?
                                </strong>

                                <p>
                                    Our team will review your requirement and
                                    contact you with the appropriate assistance.
                                </p>

                            </div>

                        </div>



                        <!-- BUTTONS -->

                        <div class="jme-thankyou-actions">

                            <a href="{{ route('index') }}" class="jme-thankyou-btn primary">

                                <span>
                                    Back to Home
                                </span>

                                <svg viewBox="0 0 24 24">

                                    <path d="M5 12h14"></path>

                                    <path d="M13 6l6 6-6 6"></path>

                                </svg>

                            </a>


                            {{-- <a href="{{ url('/services') }}" class="jme-thankyou-btn secondary">

                                <span>
                                    Explore Services
                                </span>

                            </a> --}}

                        </div>


                    </div>



                    <!-- BOTTOM EPC -->

                    <div class="jme-thankyou-bottom">

                        <span>
                            ENGINEERING
                        </span>

                        <i></i>

                        <span>
                            PROCUREMENT
                        </span>

                        <i></i>

                        <span>
                            CONSTRUCTION
                        </span>

                    </div>


                </div>

            </div>

        </section>

    </main>

@endsection

@section('scripts')

@endsection
