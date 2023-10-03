<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KingsMan Watches</title>
    <!-- Template CSS -->
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}"/>

    <link rel="stylesheet" href="{{asset('css/style-starter.css')}}">
    <link rel="stylesheet" href="{{asset('css/style-liberty.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Template CSS -->
    <script src="https://kit.fontawesome.com/b246e96d93.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template CSS -->

</head>
<body>
<section class="w3l-banner-slider-main">
    <div class="top-header-content">

        <section class="hero" id="hero">
            <nav class="navbar navbar-expand-lg" id="navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{asset('home')}}">
                        <strong><span class="logo">Kingsman</span> <span class="logo2">Watches</span></strong>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
            <div class="heroText">
                <div class="container w-50">
                    <form class="loginForm" action="{{route('performLogin')}}" method="POST">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-5">
                            <input type="text" id="inputEmail" name="email" class="form-control" placeholder="Email address">
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-5">
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
                        </div>

                        <!-- 2 column grid layout for inline styling -->

                        <!-- Submit button -->
                        <input type="submit" class="btn btn-primary btn-block mb-4" value="Log in"/>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not a member? <a href="{{route('users.create')}}">Register here</a></p>
                        </div>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                    </form>
                </div>
            </div>


            <div class="videoWrapperLogin">
                <video autoplay="" loop="" muted="" class="custom-video" poster="images/videos/bg-pic.jpg">
                    <source src="images/videos/bg-video.mp4" type="video/mp4">
                </video>
            </div>

            <div class="overlay">
            </div>

        </section>
        <!--/nav-->

        <!--//nav-->
    </div>
</section>
</body>
