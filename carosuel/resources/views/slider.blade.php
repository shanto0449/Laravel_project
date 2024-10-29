<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Image Slider</title>
    <style>
        .slider {
            position: relative;
            max-width: 100%;
            margin: auto;
            overflow: hidden;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
            width: 100%;
        }

        .slides img {
            width: 100%;
            border-radius: 10px;
        }

        .slider-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .prev, .next {
            cursor: pointer;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<div class="slider">
    <div class="slides" id="slides">
        @foreach($images as $image)
            <div class="slide">
                <img src="{{asset('/images/'.$image->image)}}" alt="{{ $image->description }}">
            </div>
        @endforeach
    </div>

    <div class="slider-controls">
        <button class="prev" onclick="moveSlide(-1)">❮</button>
        <button class="next" onclick="moveSlide(1)">❯</button>
    </div>
</div>

<script>
    let currentIndex = 0;

    function moveSlide(direction) {
        const slides = document.getElementById('slides');
        const slideWidth = slides.children[0].offsetWidth;
        const totalSlides = slides.children.length;

        currentIndex = (currentIndex + direction + totalSlides) % totalSlides;
        slides.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    }
</script>

</body>
</html>
