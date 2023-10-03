@extends("layouts.client")
@section('videoWrapper')
    <div class="videoWrapper">
        <video autoplay="" loop="" muted="" class="custom-video" poster="images/videos/bg-pic.jpg">
            <source src="images/videos/bg-video.mp4" type="video/mp4">
        </video>
    </div>
@endsection
@section('heroText')
    <h1 class=" mt-5 mb-lg-4 class-font" data-aos="zoom-in" data-aos-delay="50">
        Kingsman Watches
    </h1>
    <p class="text-secondary-white-color" data-aos="fade-up" data-aos-delay="100">
        Long-standing<strong class="custom-underline"> Legacy</strong>
    </p>
@endsection
@section("content")

    <section class="w3l-grids-hny-2">
        <!-- /content-6-section -->
        <div class="grids-hny-2-mian py-5">
            <div class="container py-lg-5">
                <h3 class="hny-title mb-0 text-center" data-aos="zoom-in" data-aos-delay="50">Shop With <span>Us</span>
                </h3>
                <p class="mb-4 text-center" data-aos="zoom-in" data-aos-delay="100">Most Popular Brands</p>
                <div class="welcome-grids row mt-5" data-aos="zoom-in" data-aos-delay="50">

                    @foreach($homeProducts as $hp)
                        <div class="col-lg-2 col-md-4 col-6 welcome-image">
                            <div class="boxhny13">
                                <a href="{{route('shop')}}">
                                    <img src="{{asset('images/'.$hp->image)}}" class="img-fluid" alt=""/>
                                    <div class="boxhny-content">
                                        <h3 class="title">{{$hp->name}}</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <section class="w3l-content-w-photo-6" data-aos="fade-in" data-aos-delay="50">
        <!-- /specification-6-->
        <div class="content-photo-6-mian py-5">
            <div class="container py-lg-5">
                <div class="align-photo-6-inf-cols row">
                    <div class="photo-6-inf-right col-lg-6">
                        <h3 class="hny-title text-left">All Rolex Men's Watches are <span>15% to 75% Discount</span>
                        </h3>
                        <p>Visit our shop to see amazing creations from our designers.</p>
                        <a href="{{route('shop')}}" class="read-more btn">
                            Shop Now
                        </a>
                    </div>
                    <div class="photo-6-inf-left col-lg-6">
                        <img src="{{asset('images/bg4.jpg')}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w3l-customers-sec-6" data-aos="fade-in" data-aos-delay="50">
        <div class="customers-sec-6-cintent py-5">
            <!-- /customers-->
            <div class="container py-lg-5">
                <h3 class="hny-title text-center mb-0 ">Customers <span>Love</span></h3>
                <p class="mb-5 text-center">What People Say</p>
                <div class="row customerhny my-lg-5 my-4">
                    <div class="owl-carousel owl-theme owl-reponsive">
                        @foreach($customers as $customer)
                            <div class="item">
                                <div class="customer-info text-center">
                                    <div class="feedback-hny">
                                        <span class="fa fa-quote-left"></span>
                                        <p class="feedback-para">{{$customer->feedback}}</p>
                                    </div>
                                    <div class="feedback-review mt-4">
                                        <img src="{{asset('images/'.$customer->image)}}" style="width: 34%;"
                                             class="img-fluid" alt="">
                                        <h5>{{$customer->name}}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
