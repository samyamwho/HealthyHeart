<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        .carousel-item {
            transition: opacity 0.5s ease-in-out;
            opacity: 0;
        }
        .carousel-item.active {
            opacity: 1;
        }
    </style>
</head>
<body>
    <header style="margin-top: -18px;">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                
            </ol>
            <!-- Slides -->
            <div class="carousel-inner">
                <!-- Slide One -->
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/donate.png" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <!-- Caption Content Here -->
                    </div>
                </div>
                <!-- Slide Two -->
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/mohan.png" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <!-- Caption Content Here -->
                    </div>
                </div>
            
            </div>
            <!-- Controls -->
            <a class="carousel-control-prev" href="#" role="button" data-slide="prev" onclick="prevSlide()">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#" role="button" data-slide="next" onclick="nextSlide()">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <!-- Bootstrap JS (optional if you need other Bootstrap features) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var currentSlide = 0;
        var slides = document.querySelectorAll('.carousel-item');

        function nextSlide() {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }

        function prevSlide() {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
        }
    </script>
</body>
</html>
