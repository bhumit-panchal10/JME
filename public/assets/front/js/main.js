document.addEventListener("DOMContentLoaded", function () {

    const menuToggle =
        document.getElementById("menuToggle");

    const navigation =
        document.getElementById("jmeNavigation");

    const dropdownToggle =
        document.querySelector(".dropdown-toggle");

    const dropdownParent =
        document.querySelector(".has-dropdown");

    const header =
        document.getElementById("jmeHeader");


    /* =========================
       MOBILE MENU
    ========================= */

    if (menuToggle && navigation) {

        menuToggle.addEventListener("click", function () {

            menuToggle.classList.toggle("active");

            navigation.classList.toggle("active");

        });

    }



    /* =========================
       MOBILE DROPDOWN
    ========================= */

    if (dropdownToggle && dropdownParent) {

        dropdownToggle.addEventListener("click", function (event) {

            if (window.innerWidth <= 1050) {

                event.preventDefault();

                dropdownParent.classList.toggle("open");

            }

        });

    }



    /* =========================
       HEADER SCROLL
    ========================= */

    if (header) {

        window.addEventListener("scroll", function () {

            if (window.scrollY > 20) {

                header.classList.add("scrolled");

            } else {

                header.classList.remove("scrolled");

            }

        });

    }



    /* =========================
       WINDOW RESIZE
    ========================= */

    window.addEventListener("resize", function () {

        if (window.innerWidth > 1050) {

            if (navigation) {

                navigation.classList.remove("active");

            }

            if (menuToggle) {

                menuToggle.classList.remove("active");

            }

            if (dropdownParent) {

                dropdownParent.classList.remove("open");

            }

        }

    });

});
/* =========================================================
   JME INDUSTRIAL HERO SLIDER
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    const hero =
        document.getElementById("jmeHero");

    if (!hero) {
        return;
    }


    const slides =
        Array.from(
            hero.querySelectorAll(".hero-slide")
        );


    const nextButton =
        document.getElementById("heroNext");


    const prevButton =
        document.getElementById("heroPrev");


    const duration = 6500;

    let currentIndex = 0;

    let autoPlay = null;

    let changing = false;



    /* =========================================
       CHANGE SLIDE
    ========================================= */

    function changeSlide(nextIndex) {

        if (
            changing ||
            nextIndex === currentIndex
        ) {
            return;
        }


        changing = true;


        hero.classList.remove("switching");

        void hero.offsetWidth;

        hero.classList.add("switching");


        /*
            Change image while shutters
            completely cover the slider.
        */

        setTimeout(function () {

            slides[currentIndex]
                .classList.remove("active");


            slides[nextIndex]
                .classList.add("active");


            currentIndex =
                nextIndex;

        }, 430);


        setTimeout(function () {

            hero.classList.remove(
                "switching"
            );


            changing = false;

        }, 1150);


        restartAutoPlay();

    }



    /* =========================================
       NEXT
    ========================================= */

    function nextSlide() {

        const nextIndex =
            (currentIndex + 1)
            % slides.length;


        changeSlide(nextIndex);

    }



    /* =========================================
       PREVIOUS
    ========================================= */

    function previousSlide() {

        const nextIndex =
            (
                currentIndex
                - 1
                + slides.length
            )
            % slides.length;


        changeSlide(nextIndex);

    }



    /* =========================================
       AUTO PLAY
    ========================================= */

    function restartAutoPlay() {

        clearInterval(autoPlay);


        autoPlay =
            setInterval(
                nextSlide,
                duration
            );

    }



    /* =========================================
       BUTTONS
    ========================================= */

    if (nextButton) {

        nextButton.addEventListener(
            "click",
            nextSlide
        );

    }


    if (prevButton) {

        prevButton.addEventListener(
            "click",
            previousSlide
        );

    }



    /* =========================================
       PAUSE ON HOVER
    ========================================= */

    hero.addEventListener(
        "mouseenter",
        function () {

            clearInterval(autoPlay);

        }
    );


    hero.addEventListener(
        "mouseleave",
        function () {

            restartAutoPlay();

        }
    );



    /* =========================================
       START
    ========================================= */

    restartAutoPlay();

});/* =========================================================
   ABOUT JME REVEAL
========================================================= */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const aboutSection =
            document.getElementById(
                "jmeAboutHome"
            );


        if (!aboutSection) {
            return;
        }


        const observer =
            new IntersectionObserver(
                function (entries) {

                    entries.forEach(
                        function (entry) {

                            if (
                                entry.isIntersecting
                            ) {

                                aboutSection.classList.add(
                                    "is-visible"
                                );


                                observer.unobserve(
                                    aboutSection
                                );

                            }

                        }
                    );

                },
                {
                    threshold: 0.18
                }
            );


        observer.observe(
            aboutSection
        );

    }
);/* =========================================================
   JME CORE SERVICES
========================================================= */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const serviceRows =
            document.querySelectorAll(
                ".jme-service-row"
            );


        if (!serviceRows.length) {
            return;
        }


        serviceRows.forEach(
            function (row) {

                const trigger =
                    row.querySelector(
                        ".jme-service-trigger"
                    );


                if (!trigger) {
                    return;
                }


                trigger.addEventListener(
                    "click",
                    function () {

                        if (
                            row.classList.contains(
                                "active"
                            )
                        ) {
                            return;
                        }


                        serviceRows.forEach(
                            function (item) {

                                item.classList.remove(
                                    "active"
                                );

                            }
                        );


                        row.classList.add(
                            "active"
                        );

                    }
                );

            }
        );

    }
);
/* =========================================================
   JME INDIA NETWORK
========================================================= */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const section =
            document.getElementById(
                "jmeIndiaPresence"
            );


        if (!section) {
            return;
        }


        const currentCity =
            document.getElementById(
                "jmeIndiaCurrentCity"
            );


        const currentIndex =
            document.getElementById(
                "jmeIndiaCurrentIndex"
            );


        const activeMarker =
            document.getElementById(
                "jmeIndiaActiveMarker"
            );


        const tooltip =
            document.getElementById(
                "jmeIndiaMapTooltip"
            );


        const progress =
            document.getElementById(
                "jmeIndiaProgressBar"
            );


        const prevButton =
            document.getElementById(
                "jmeIndiaPrev"
            );


        const nextButton =
            document.getElementById(
                "jmeIndiaNext"
            );


        const coverageBars =
            Array.from(
                document.querySelectorAll(
                    "#jmeIndiaNetworkBars i"
                )
            );



        /* =============================================
           THESE ARE ACTUAL DOT POSITIONS
           FROM CURRENT MAP IMAGE
        ============================================== */

        const mapPoints = [

            { x: 24.06, y: 11.76 },
            { x: 33.44, y: 12.65 },

            { x: 28.27, y: 20.69 },

            { x: 36.20, y: 24.79 },
            { x: 28.15, y: 26.46 },

            { x: 38.37, y: 31.95 },

            { x: 87.87, y: 32.16 },

            { x: 21.32, y: 33.95 },

            { x: 67.93, y: 36.16 },
            { x: 82.31, y: 36.66 },

            { x: 46.55, y: 37.56 },

            { x: 30.23, y: 39.09 },

            { x: 85.34, y: 39.65 },

            { x: 10.85, y: 44.28 },

            { x: 64.95, y: 46.30 },

            { x: 29.85, y: 46.16 },

            { x: 5.92, y: 48.20 },

            { x: 14.56, y: 49.23 },

            { x: 67.74, y: 49.59 },

            { x: 50.62, y: 53.10 },

            { x: 16.77, y: 54.87 },

            { x: 31.56, y: 55.52 },

            { x: 33.76, y: 61.58 },

            { x: 16.57, y: 62.94 },

            { x: 46.36, y: 63.17 },

            { x: 27.14, y: 67.11 },

            { x: 27.16, y: 73.73 },

            { x: 36.52, y: 74.94 },

            { x: 22.17, y: 78.68 },

            { x: 25.86, y: 84.04 },

            { x: 34.59, y: 84.59 },

            { x: 29.96, y: 88.61 },

            { x: 25.79, y: 89.70 }

        ];



        /* =============================================
           54 JME LOCATIONS

           dot = EXISTING YELLOW POINT INDEX.
           Multiple nearby cities can use same network point.
        ============================================== */

        const locations = [

            {
                name: "Ahmedabad",
                dot: 17
            },

            {
                name: "Abu Road",
                dot: 11
            },

            {
                name: "Ankleshwar",
                dot: 20
            },

            {
                name: "Aurangabad",
                dot: 22
            },

            {
                name: "Barauni",
                dot: 14
            },

            {
                name: "Baroda (Vadodara)",
                dot: 20
            },

            {
                name: "Belgaum",
                dot: 28
            },

            {
                name: "Bengaluru",
                dot: 30
            },

            {
                name: "Bhilwara",
                dot: 11
            },

            {
                name: "Bhopal",
                dot: 10
            },

            {
                name: "Bhuj",
                dot: 16
            },

            {
                name: "Chandigarh",
                dot: 2
            },

            {
                name: "Chennai",
                dot: 30
            },

            {
                name: "Coimbatore",
                dot: 31
            },

            {
                name: "Curdapur",
                dot: 27
            },

            {
                name: "Dahej",
                dot: 20
            },

            {
                name: "Delhi",
                dot: 4
            },

            {
                name: "Dindigul",
                dot: 32
            },

            {
                name: "Diu and Daman",
                dot: 23
            },

            {
                name: "Dhule",
                dot: 21
            },

            {
                name: "Gandhinagar",
                dot: 17
            },

            {
                name: "Gandhidham",
                dot: 13
            },

            {
                name: "Goa",
                dot: 28
            },

            {
                name: "Gurgaon",
                dot: 4
            },

            {
                name: "Hyderabad",
                dot: 27
            },

            {
                name: "Jaipur",
                dot: 7
            },

            {
                name: "Jammu",
                dot: 0
            },

            {
                name: "Kolkata",
                dot: 18
            },

            {
                name: "Kolhapur",
                dot: 26
            },

            {
                name: "Kota",
                dot: 15
            },

            {
                name: "Madurai",
                dot: 32
            },

            {
                name: "Mundra",
                dot: 16
            },

            {
                name: "Mumbai",
                dot: 23
            },

            {
                name: "Mangalore",
                dot: 29
            },

            {
                name: "Morbi",
                dot: 17
            },

            {
                name: "Mysore",
                dot: 29
            },

            {
                name: "Nagpur",
                dot: 24
            },

            {
                name: "Nashik",
                dot: 21
            },

            {
                name: "Noida",
                dot: 3
            },

            {
                name: "Patna",
                dot: 14
            },

            {
                name: "Pune",
                dot: 25
            },

            {
                name: "Raipur",
                dot: 24
            },

            {
                name: "Rajkot",
                dot: 17
            },

            {
                name: "Surat",
                dot: 23
            },

            {
                name: "Sirohi",
                dot: 11
            },

            {
                name: "Sasai",
                dot: 14
            },

            {
                name: "Siliguri",
                dot: 8
            },

            {
                name: "Solapur",
                dot: 26
            },

            {
                name: "Selvasa",
                dot: 23
            },

            {
                name: "Secunderabad",
                dot: 27
            },

            {
                name: "Tiruchirappalli",
                dot: 31
            },

            {
                name: "Udaipur",
                dot: 15
            },

            {
                name: "Vapi",
                dot: 23
            },

            {
                name: "Vishakhapatnam (Vizag)",
                dot: 24
            }

        ];



        let activeIndex = 0;

        let autoTimer = null;



        /* =============================================
           PROGRESS
        ============================================== */

        function restartProgress() {

            progress.style.transition =
                "none";


            progress.style.width =
                "0";


            void progress.offsetWidth;


            progress.style.transition =
                "width 3s linear";


            progress.style.width =
                "100%";

        }



        /* =============================================
           COVERAGE BARS
        ============================================== */

        function updateCoverage() {

            coverageBars.forEach(
                function (bar) {

                    bar.classList.remove(
                        "active"
                    );

                }
            );


            const barIndex =
                Math.min(
                    coverageBars.length - 1,

                    Math.floor(
                        (
                            activeIndex /
                            locations.length
                        ) *
                        coverageBars.length
                    )
                );


            if (
                coverageBars[
                    barIndex
                ]
            ) {

                coverageBars[
                    barIndex
                ].classList.add(
                    "active"
                );

            }

        }



        /* =============================================
           SHOW LOCATION
        ============================================== */

        function showLocation(index) {

            const newIndex =
                (
                    index +
                    locations.length
                ) %
                locations.length;


            const location =
                locations[
                    newIndex
                ];


            const point =
                mapPoints[
                    location.dot
                ];


            currentCity.classList.add(
                "is-changing"
            );


            tooltip.classList.add(
                "is-changing"
            );


            setTimeout(
                function () {

                    activeIndex =
                        newIndex;


                    /* RIGHT PANEL */

                    currentCity.textContent =
                        location.name;


                    currentIndex.textContent =
                        String(
                            activeIndex + 1
                        ).padStart(
                            2,
                            "0"
                        );


                    /* =================================
                       MOVE EXACTLY ON IMAGE DOT
                    ================================== */

                    activeMarker.style.left =
                        point.x +
                        "%";


                    activeMarker.style.top =
                        point.y +
                        "%";


                    /* TOOLTIP */

                    tooltip.textContent =
                        location.name;


                    tooltip.style.left =
                        point.x +
                        "%";


                    tooltip.style.top =
                        point.y +
                        "%";


                    currentCity.classList.remove(
                        "is-changing"
                    );


                    tooltip.classList.remove(
                        "is-changing"
                    );


                    restartProgress();

                    updateCoverage();

                },
                180
            );

        }



        /* =============================================
           AUTOPLAY
        ============================================== */

        function startAutoPlay() {

            clearInterval(
                autoTimer
            );


            autoTimer =
                setInterval(
                    function () {

                        showLocation(
                            activeIndex + 1
                        );

                    },
                    3000
                );

        }



        /* =============================================
           NEXT
        ============================================== */

        nextButton.addEventListener(
            "click",
            function () {

                showLocation(
                    activeIndex + 1
                );


                startAutoPlay();

            }
        );



        /* =============================================
           PREVIOUS
        ============================================== */

        prevButton.addEventListener(
            "click",
            function () {

                showLocation(
                    activeIndex - 1
                );


                startAutoPlay();

            }
        );



        /* =============================================
           PAUSE ON HOVER
        ============================================== */

        section.addEventListener(
            "mouseenter",
            function () {

                clearInterval(
                    autoTimer
                );

            }
        );


        section.addEventListener(
            "mouseleave",
            function () {

                startAutoPlay();

            }
        );



        /* =============================================
           INITIAL
        ============================================== */

        showLocation(
            0
        );


        startAutoPlay();

    }
);
document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       SERVICE SLIDER
    ====================================================== */

    const slider =
        document.getElementById("jmeServiceSlider");

    const stage =
        document.getElementById("jmeSliderStage");

    const mainImage =
        document.getElementById("jmeSdMainImage");

    const thumbnails =
        Array.from(
            document.querySelectorAll(".jme-sd-thumb")
        );

    const prevButton =
        document.getElementById("jmeSdPrevBtn");

    const nextButton =
        document.getElementById("jmeSdNextBtn");

    const currentNumber =
        document.getElementById("jmeSdCurrent");

    const totalNumber =
        document.getElementById("jmeSdTotal");

    const progress =
        document.getElementById("jmeSdProgress");


    let currentIndex = 0;

    let sliderTimer = null;

    let paused = false;

    let changing = false;

    let touchStartX = 0;


    const slideDelay = 5000;



    /* =====================================================
       NUMBER
    ====================================================== */

    function formatNumber(number) {

        return String(number)
            .padStart(2, "0");

    }



    /* =====================================================
       TOTAL
    ====================================================== */

    if (totalNumber) {

        totalNumber.textContent =
            formatNumber(thumbnails.length);

    }



    /* =====================================================
       UI UPDATE
    ====================================================== */

    function updateSliderUI() {

        thumbnails.forEach(
            function (thumb, index) {

                thumb.classList.toggle(
                    "active",
                    index === currentIndex
                );

            }
        );


        if (currentNumber) {

            currentNumber.textContent =
                formatNumber(
                    currentIndex + 1
                );

        }


        if (
            progress &&
            thumbnails.length
        ) {

            const percentage =
                (
                    (
                        currentIndex + 1
                    )
                    /
                    thumbnails.length
                )
                *
                100;


            progress.style.width =
                percentage + "%";

        }

    }



    /* =====================================================
       SHOW IMAGE
    ====================================================== */

    function showSlide(
        index,
        restart = true
    ) {

        if (
            !mainImage ||
            !stage ||
            !thumbnails.length ||
            changing
        ) {
            return;
        }


        if (index < 0) {

            index =
                thumbnails.length - 1;

        }


        if (
            index >= thumbnails.length
        ) {

            index = 0;

        }


        if (
            index === currentIndex
        ) {

            updateSliderUI();

            return;

        }


        changing = true;

        currentIndex = index;


        const selected =
            thumbnails[currentIndex];


        const src =
            selected.dataset.image;


        const alt =
            selected.dataset.alt ||
            "Service Image";


        const preload =
            new Image();


        preload.src = src;


        stage.classList.add(
            "is-changing"
        );


        const applyImage =
            function () {

                setTimeout(
                    function () {

                        mainImage.src = src;

                        mainImage.alt = alt;


                        updateSliderUI();


                        stage.classList.remove(
                            "is-changing"
                        );


                        changing = false;

                    },
                    180
                );

            };


        if (preload.complete) {

            applyImage();

        } else {

            preload.onload =
                applyImage;

            preload.onerror =
                applyImage;

        }


        if (restart) {

            restartAutoSlide();

        }

    }



    /* =====================================================
       NEXT
    ====================================================== */

    function nextSlide() {

        if (changing) {
            return;
        }


        let next =
            currentIndex + 1;


        if (
            next >= thumbnails.length
        ) {

            next = 0;

        }


        showSlide(next);

    }



    /* =====================================================
       PREVIOUS
    ====================================================== */

    function previousSlide() {

        if (changing) {
            return;
        }


        let prev =
            currentIndex - 1;


        if (prev < 0) {

            prev =
                thumbnails.length - 1;

        }


        showSlide(prev);

    }



    /* =====================================================
       ARROWS
    ====================================================== */

    if (nextButton) {

        nextButton.addEventListener(
            "click",
            function (event) {

                event.preventDefault();

                nextSlide();

            }
        );

    }


    if (prevButton) {

        prevButton.addEventListener(
            "click",
            function (event) {

                event.preventDefault();

                previousSlide();

            }
        );

    }



    /* =====================================================
       THUMB CLICK
    ====================================================== */

    thumbnails.forEach(
        function (thumb, index) {

            thumb.addEventListener(
                "click",
                function (event) {

                    event.preventDefault();


                    if (
                        index === currentIndex
                    ) {
                        return;
                    }


                    showSlide(index);

                }
            );

        }
    );



    /* =====================================================
       AUTO PLAY
    ====================================================== */

    function stopAutoSlide() {

        if (sliderTimer) {

            clearInterval(sliderTimer);

            sliderTimer = null;

        }

    }


    function startAutoSlide() {

        stopAutoSlide();


        if (
            thumbnails.length <= 1
        ) {
            return;
        }


        sliderTimer =
            setInterval(
                function () {

                    if (
                        !paused &&
                        !changing
                    ) {

                        let next =
                            currentIndex + 1;


                        if (
                            next >=
                            thumbnails.length
                        ) {

                            next = 0;

                        }


                        showSlide(
                            next,
                            false
                        );

                    }

                },
                slideDelay
            );

    }


    function restartAutoSlide() {

        startAutoSlide();

    }



    /* =====================================================
       PAUSE ON HOVER
    ====================================================== */

    if (slider) {

        slider.addEventListener(
            "mouseenter",
            function () {

                paused = true;

            }
        );


        slider.addEventListener(
            "mouseleave",
            function () {

                paused = false;

            }
        );

    }



    /* =====================================================
       MOBILE SWIPE
    ====================================================== */

    if (stage) {

        stage.addEventListener(
            "touchstart",
            function (event) {

                touchStartX =
                    event
                        .changedTouches[0]
                        .clientX;

            },
            {
                passive: true
            }
        );


        stage.addEventListener(
            "touchend",
            function (event) {

                const touchEndX =
                    event
                        .changedTouches[0]
                        .clientX;


                const distance =
                    touchStartX -
                    touchEndX;


                if (
                    Math.abs(distance) < 45
                ) {
                    return;
                }


                if (distance > 0) {

                    nextSlide();

                } else {

                    previousSlide();

                }

            },
            {
                passive: true
            }
        );

    }



    /* =====================================================
       INITIAL
    ====================================================== */

    updateSliderUI();

    startAutoSlide();




});
/* =========================================================
   JME FAQ ACCORDION
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    const faqItems =
        Array.from(
            document.querySelectorAll(
                ".jme-faqx-item"
            )
        );


    /* =====================================================
       CLOSE ITEM
    ====================================================== */

    function closeFAQ(item) {

        const answer =
            item.querySelector(
                ".jme-faqx-answer"
            );


        item.classList.remove(
            "active"
        );


        if (answer) {

            answer.style.maxHeight =
                "0px";

        }

    }



    /* =====================================================
       OPEN ITEM
    ====================================================== */

    function openFAQ(item) {

        const answer =
            item.querySelector(
                ".jme-faqx-answer"
            );


        item.classList.add(
            "active"
        );


        if (answer) {

            answer.style.maxHeight =
                answer.scrollHeight +
                "px";

        }

    }



    /* =====================================================
       INITIAL + CLICK
    ====================================================== */

    faqItems.forEach(function (item) {

        const question =
            item.querySelector(
                ".jme-faqx-question"
            );


        if (!question) {
            return;
        }


        /* initially open */

        if (
            item.classList.contains(
                "active"
            )
        ) {

            openFAQ(item);

        }


        question.addEventListener(
            "click",
            function () {

                const isOpen =
                    item.classList.contains(
                        "active"
                    );


                /* close all */

                faqItems.forEach(
                    function (faq) {

                        closeFAQ(faq);

                    }
                );


                /* open selected */

                if (!isOpen) {

                    openFAQ(item);

                }

            }
        );

    });



    /* =====================================================
       RESIZE FIX
    ====================================================== */

    window.addEventListener(
        "resize",
        function () {

            const active =
                document.querySelector(
                    ".jme-faqx-item.active"
                );


            if (!active) {
                return;
            }


            const answer =
                active.querySelector(
                    ".jme-faqx-answer"
                );


            if (answer) {

                answer.style.maxHeight =
                    answer.scrollHeight +
                    "px";

            }

        }
    );

});document.addEventListener("DOMContentLoaded", function () {

    const galleryImages = document.querySelectorAll(
        ".jme-simple-gallery-item img"
    );

    const lightbox = document.getElementById("galleryLightbox");
    const lightboxImage = document.getElementById("lightboxImage");
    const closeBtn = document.getElementById("lightboxClose");
    const prevBtn = document.getElementById("lightboxPrev");
    const nextBtn = document.getElementById("lightboxNext");
    const counter = document.getElementById("lightboxCounter");

    if (!galleryImages.length || !lightbox) {
        return;
    }

    let currentIndex = 0;


    function updateImage() {

        const image = galleryImages[currentIndex];

        lightboxImage.src = image.src;
        lightboxImage.alt = image.alt || "Gallery Image";

        counter.textContent =
            `${currentIndex + 1} / ${galleryImages.length}`;
    }


    function openGallery(index) {

        currentIndex = index;

        updateImage();

        lightbox.showModal();

        document.body.classList.add("gallery-open");
    }


    function closeGallery() {

        lightbox.close();

        document.body.classList.remove("gallery-open");
    }


    function nextImage() {

        currentIndex =
            (currentIndex + 1) % galleryImages.length;

        updateImage();
    }


    function prevImage() {

        currentIndex =
            (currentIndex - 1 + galleryImages.length)
            % galleryImages.length;

        updateImage();
    }


    galleryImages.forEach(function (image, index) {

        image.style.cursor = "pointer";

        image.addEventListener("click", function () {

            openGallery(index);

        });

    });


    closeBtn.addEventListener("click", closeGallery);

    nextBtn.addEventListener("click", nextImage);

    prevBtn.addEventListener("click", prevImage);


    /* click outside white box */
    lightbox.addEventListener("click", function (event) {

        if (event.target === lightbox) {
            closeGallery();
        }

    });


    /* ESC */
    lightbox.addEventListener("close", function () {

        document.body.classList.remove("gallery-open");

    });


    /* Keyboard Arrow */
    document.addEventListener("keydown", function (event) {

        if (!lightbox.open) {
            return;
        }

        if (event.key === "ArrowRight") {
            nextImage();
        }

        if (event.key === "ArrowLeft") {
            prevImage();
        }

    });

});document.addEventListener("DOMContentLoaded", function () {

    const videoCards =
        document.querySelectorAll(
            ".jme-service-video-card"
        );

    const modal =
        document.getElementById(
            "jmeVideoModal"
        );

    const iframe =
        document.getElementById(
            "jmeVideoIframe"
        );

    const closeBtn =
        document.getElementById(
            "jmeVideoModalClose"
        );

    const backdrop =
        modal.querySelector(
            ".jme-video-modal-backdrop"
        );


    /* =====================================================
       CONVERT VIDEO URL TO EMBED URL
    ====================================================== */

    function getEmbedUrl(url) {

        if (!url) {
            return "";
        }


        /* =========================
           YOUTUBE NORMAL URL
        ========================== */

        if (
            url.includes(
                "youtube.com/watch"
            )
        ) {

            const videoUrl =
                new URL(url);

            const videoId =
                videoUrl.searchParams.get(
                    "v"
                );

            if (videoId) {

                return (
                    "https://www.youtube.com/embed/" +
                    videoId +
                    "?autoplay=1&rel=0"
                );

            }

        }


        /* =========================
           YOUTUBE SHORT URL
        ========================== */

        if (
            url.includes(
                "youtu.be/"
            )
        ) {

            const videoId =
                url.split(
                    "youtu.be/"
                )[1]
                .split("?")[0];


            return (
                "https://www.youtube.com/embed/" +
                videoId +
                "?autoplay=1&rel=0"
            );

        }


        /* =========================
           GOOGLE DRIVE VIDEO
        ========================== */

        if (
            url.includes(
                "drive.google.com"
            )
        ) {

            let fileId = "";


            /* /file/d/FILE_ID/view */

            if (
                url.includes(
                    "/file/d/"
                )
            ) {

                fileId =
                    url
                        .split(
                            "/file/d/"
                        )[1]
                        .split("/")[0];

            }


            /* open?id=FILE_ID */

            else if (
                url.includes(
                    "id="
                )
            ) {

                const driveUrl =
                    new URL(url);

                fileId =
                    driveUrl.searchParams.get(
                        "id"
                    );

            }


            if (fileId) {

                return (
                    "https://drive.google.com/file/d/" +
                    fileId +
                    "/preview"
                );

            }

        }


        return url;

    }



    /* =====================================================
       OPEN VIDEO
    ====================================================== */

    videoCards.forEach(function (card) {

        card.addEventListener(
            "click",
            function () {

                const videoUrl =
                    card.getAttribute(
                        "data-video-url"
                    );


                const embedUrl =
                    getEmbedUrl(
                        videoUrl
                    );


                if (!embedUrl) {
                    return;
                }


                iframe.src =
                    embedUrl;


                modal.classList.add(
                    "active"
                );


                document.body.style.overflow =
                    "hidden";

            }
        );

    });



    /* =====================================================
       CLOSE VIDEO
    ====================================================== */

    function closeVideo() {

        modal.classList.remove(
            "active"
        );


        iframe.src = "";


        document.body.style.overflow =
            "";

    }


    closeBtn.addEventListener(
        "click",
        closeVideo
    );


    backdrop.addEventListener(
        "click",
        closeVideo
    );


    document.addEventListener(
        "keydown",
        function (event) {

            if (
                event.key === "Escape"
            ) {

                closeVideo();

            }

        }
    );

});document.addEventListener(
    "DOMContentLoaded",
    function () {

        const section =
            document.getElementById(
                "jmeClientLine"
            );


        if (!section) {
            return;
        }


        const track =
            section.querySelector(
                "#jmeClientLineTrack"
            );


        const clients =
            Array.isArray(
                window.jmeClientLineData
            )
                ? window.jmeClientLineData.filter(
                    function (client) {

                        return (
                            client &&
                            client.name &&
                            client.logo
                        );

                    }
                )
                : [];


        if (!clients.length) {
            return;
        }


        /* =================================================
           INITIALS
        ================================================= */

        function getInitials(name) {

            return name
                .split(" ")
                .filter(Boolean)
                .slice(0, 2)
                .map(
                    function (word) {

                        return word
                            .charAt(0)
                            .toUpperCase();

                    }
                )
                .join("");

        }



        /* =================================================
           CREATE CARD
        ================================================= */

        function createClientCard(client) {

            const card =
                document.createElement(
                    "div"
                );


            card.className =
                "jme-clientline-card";


            /* logo wrapper */

            const logoWrap =
                document.createElement(
                    "div"
                );


            logoWrap.className =
                "jme-clientline-logo-wrap";


            /* image */

            const image =
                document.createElement(
                    "img"
                );


            image.className =
                "jme-clientline-logo";


            image.src =
                client.logo;


            image.alt =
                client.name +
                " Logo";


            image.loading =
                "lazy";


            /* fallback */

            const fallback =
                document.createElement(
                    "span"
                );


            fallback.className =
                "jme-clientline-fallback";


            fallback.textContent =
                getInitials(
                    client.name
                );


            image.addEventListener(
                "error",
                function () {

                    card.classList.add(
                        "logo-error"
                    );

                }
            );


            image.addEventListener(
                "load",
                function () {

                    card.classList.remove(
                        "logo-error"
                    );

                }
            );


            logoWrap.appendChild(
                image
            );


            logoWrap.appendChild(
                fallback
            );


            /* name */

            const name =
                document.createElement(
                    "span"
                );


            name.className =
                "jme-clientline-name";


            name.textContent =
                client.name;


            card.appendChild(
                logoWrap
            );


            card.appendChild(
                name
            );


            return card;

        }



        /* =================================================
           FIRST SET
        ================================================= */

        clients.forEach(
            function (client) {

                track.appendChild(
                    createClientCard(
                        client
                    )
                );

            }
        );



        /* =================================================
           DUPLICATE SET
           REQUIRED FOR SEAMLESS INFINITE SCROLL
        ================================================= */

        clients.forEach(
            function (client) {

                track.appendChild(
                    createClientCard(
                        client
                    )
                );

            }
        );



        /* =================================================
           AUTO SPEED BASED ON CLIENT COUNT
        ================================================= */

        const duration =
            Math.max(
                24,
                clients.length * 3.2
            );


        track.style.animationDuration =
            duration + "s";

    }
);
