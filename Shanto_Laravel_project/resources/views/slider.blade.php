<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/unicons.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.3/css/line.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.3/css/solid.css">


    <style>
        :root {
            --bc: #fafaff;
            --primary: #da2c4d;
            --white: #ffffff;
            --black: #000000;
            /* Colors */
            --dark-red: #6e1727;
            /* Gray Colors */
            --gray: #6c757d;
            --gray-light: #fcf1ec;
            --gray-extra-dark: #343a40;
            /* Sizes */
            --heading: 3.4rem;
            --heading-large: 7.5rem;
            --heading-medium: 2rem;
            --paragraph: 1.1rem;
            /* Fonts */
            --font-main: "Poppins";
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            font-family: var(--font-main);
            background-color: var(--bc);
        }

        main {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin: 0;
            width: 50%;
            font-weight: 500;
            line-height: 1em;
            font-size: 20px;
            text-transform: uppercase;
            color: var(--white);
            z-index: 25;
        }

        p {
            margin: 0;
            width: 60%;
            font-weight: 500;
            font-size: 15px;
            text-transform: uppercase;
            color: var(--white);
            z-index: 25;
        }

        .title {
            width: 75%;
            height: 100%;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            position: absolute;
            z-index: 25;
        }

        .overlay {
            width: 100%;
            height: 100%;
            position: absolute;
            background-color: rgba(0, 0, 0, .5);
            z-index: 4;
        }

        .space {
            min-height: 20vh;
        }

        /* Slider */
        .wrapper {
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .slides-container {
            height: 100vh;
            transition: transform .75s cubic-bezier(0.48, 0.15, 0.18, 1);
            position: relative;
        }

        .slide-image {
            height: 100%;
            width: 100%;
            position: absolute;
        }

        .slide-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .next-btn,
        .prev-btn {
            top: 50%;
            margin: 0 .25em;
            padding: .2em .3em;
            font-size: 2.22rem;
            color: var(--white);
            background: transparent;
            position: absolute;
            transform: translateY(-50%);
            transition: all .2s;
            cursor: pointer;
            z-index: 100;
        }

        .next-btn:hover,
        .prev-btn:hover {
            opacity: .8;
        }

        .prev-btn {
            left: 0;
        }

        .next-btn {
            right: 0;
        }

        /* Navigation Dots */
        .navigation-dots {
            left: 50%;
            bottom: 0;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 1em 0;
            z-index: 100;
        }

        .single-dot {
            width: .8rem;
            height: .8rem;
            margin: 0 .4em;
            border-radius: 50%;
            border: 2px solid var(--white);
            background: transparent;
            cursor: pointer;
            transition: .2s;
        }

        .single-dot.active {
            background: var(--white);
        }

        @media only screen and (max-width: 1660px) {
            :root {
                /* Sizes */
                --heading: 3.2rem;
            }
        }

        @media only screen and (max-width: 1456px) {
            :root {
                /* Sizes */
                --heading: 3rem;
            }
        }

        @media only screen and (max-width: 1024px) {
            :root {
                /* Sizes */
                --heading: 2.5rem;
            }

            h1 {
                font-size: calc(var(--heading) + 1.2rem);
            }
        }

        @media only screen and (max-width: 756px) {
            :root {
                /* Sizes */
                --heading: 2rem;
            }

            h1 {
                font-size: calc(var(--heading) + .8rem);
            }

            p {
                font-size: calc(var(--paragraph));
            }
        }

        @media only screen and (max-width: 496px) {
            :root {
                /* Sizes */
                --heading: 1.5rem;
            }

            h1 {
                font-size: calc(var(--heading) + .4rem);
            }
        }
    </style>


</head>

<body>
    <main>
        <div class="wrapper">
            <div class="prev-btn"><i class="uil uil-angle-left-b"></i></div>
            <div class="slides-container">
                @foreach ($sliders as $slider)
                    <div class="slide-image">
                        <!-- Title Box -->
                        <div class="title">
                            <h1>{{ $slider->title }}</h1>
                            <p>{{ $slider->description }}</p>
                        </div>
                        <div class="overlay"></div>
                        <img src="{{ Storage::url($slider->image) }}" alt="" />
                    </div>
                @endforeach

            </div>
            <div class="next-btn"><i class="uil uil-angle-right-b"></i></div>
            <div class="navigation-dots"></div>
        </div>

    </main>

    <script src="js/script.js"></script>



    <script>
        const slideImage = document.querySelectorAll(".slide-image");
        const slidesContainer = document.querySelector(".slides-container");
        const nextBtn = document.querySelector(".next-btn");
        const prevBtn = document.querySelector(".prev-btn");
        const navigationDots = document.querySelector(".navigation-dots");

        let numberOfImages = slideImage.length;
        let slideWidth = slideImage[0].clientWidth;
        let currentSlide = 0;

        // Set up the slider
        function init() {

            slideImage.forEach((img, i) => {
                img.style.left = i * 100 + "%";
            });

            slideImage[0].classList.add("active");

            createNavigationDots();
        }

        init();

        // Create navigation dots
        function createNavigationDots() {
            for (let i = 0; i < numberOfImages; i++) {
                const dot = document.createElement("div");
                dot.classList.add("single-dot");
                navigationDots.appendChild(dot);

                dot.addEventListener("click", () => {
                    goToSlide(i);
                });
            }

            navigationDots.children[0].classList.add("active");
        }

        // Next Button
        nextBtn.addEventListener("click", () => {
            if (currentSlide >= numberOfImages - 1) {
                goToSlide(0);
                return;
            }

            currentSlide++;
            goToSlide(currentSlide);
        });

        // Previous Button
        prevBtn.addEventListener("click", () => {
            if (currentSlide <= 0) {
                goToSlide(numberOfImages - 1);
                return;
            }

            currentSlide--;
            goToSlide(currentSlide);
        });

        // Go To Slide
        function goToSlide(slideNumber) {
            slidesContainer.style.transform =
                "translateX(-" + slideWidth * slideNumber + "px)";

            currentSlide = slideNumber;

            setActiveClass();
        }

        // Set Active Class
        function setActiveClass() {
            // Set active class for Slide Image

            let currentActive = document.querySelector(".slide-image.active");
            currentActive.classList.remove("active");
            slideImage[currentSlide].classList.add("active");

            // Set active class for navigation dots
            let currentDot = document.querySelector(".single-dot.active");
            currentDot.classList.remove("active");
            navigationDots.children[currentSlide].classList.add("active");
        }

        window.onresize = function() {
            slideWidth = slideImage[0].clientWidth;
            slidesContainer.style.transform = `translateX(-${slideWidth * currentSlide}px)`;
            console.log(slideWidth);
        }
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> --}}


</body>

</html>
