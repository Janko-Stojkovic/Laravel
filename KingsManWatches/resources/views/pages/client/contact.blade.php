@extends("layouts.client")
@section('videoWrapper')
    <div class="videoWrapper">
        <video autoplay="" loop="" muted="" class="custom-video" poster="images/videos/bg4.jpg">
            <source src="images/videos/bg4.jpg" type="video/mp4">
        </video>
    </div>
@endsection
@section('heroText')
    <h1 class=" mt-5 mb-lg-4 class-font" data-aos="zoom-in" data-aos-delay="50">
        Kingsman Watches
    </h1>
    <p class="text-secondary-white-color" data-aos="fade-up" data-aos-delay="100">
        Contact <strong class="custom-underline">Us</strong>
    </p>
@endsection
@section("content")
    <section class="w3l-contacts-8">
        <div class="contacts-9 section-gap py-5">
            <div class="container py-lg-5">
                <div class="row top-map">
                    <div class="col-lg-6 partners">
                        <div class="cont-details">
                            <h3 class="hny-title mb-0">Get in <span>touch</span></h3>
                                <p class="mb-5">We're ready to lead you into the future with Business Services</p>
                                <p class="margin-top"><span class="texthny">Call Us : </span> <a href="#">+(21)
                                        255 999 8899</a></p>
                                <p><span class="texthny">Email : </span> <a href="#">
                                        info@example.com</a></p>
                                <p class="margin-top"> Zdravka Celara 16, 11000 Beograd </p>
                        </div>
                        <div class="hours">
                            <h3 class="hny-title">Working <span>Hours</span></h3>
                                <h6>Business Service:</h6>
                                <p> Monday to Friday 8.00 am - 6.00 pm</p>
                                <p> Saturday and Sunday - Closed</p>
                                <h6 class="margin-top">Customer support:</h6>
                                <p> Monday to Friday 8.00 am - 6.00 pm</p>
                                <p> Saturday 10.00 am - 4.00 pm</p>
                                <p> Sunday - Closed</p>
                        </div>
                    </div>
                    <div class="col-lg-6 map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.3335125266103!2d20.4846909!3d44.8147698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7a95dfdba1fb%3A0x7dd3ed9b437a11d6!2z0JfQtNGA0LDQstC60LAg0KfQtdC70LDRgNCwIDE2LCDQkdC10L7Qs9GA0LDQtCAxMTAwMA!5e0!3m2!1ssr!2srs!4v1670775711154!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        @if(session()->has("user"))
        <div class="map-content-9 form-bg-img">
            <div class="layer section-gap py-5">
                <div class="container py-lg-5">
                    <div class="form">
                        <h3 class="hny-title two text-center">Fill out the form.</h3>

                        <form action="{{route("contact.store")}}" method="POST" id="form" class="contact-form" data-aos="fade-up">
                            @csrf
                            <div class="row">

                                <div class="col-lg-4 col-md-6 bx">
                                    <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>

                                    <input type="text" name="name" id="name" class="form-control"
                                           placeholder="Example: John Doe">

                                    <div class="errorName"></div>
                                </div>

                                <div class="col-lg-4 col-md-6 bx">
                                    <label for="email" class="form-label">Email <sup class="text-danger">*</sup></label>

                                    <input type="text" name="email" id="email" class="form-control"
                                           placeholder="Example:john.doe@gmail.com">

                                    <div class="errorEmail"></div>
                                </div>
                                <div class="col-lg-4 col-md-12 bx">
                                    <label for="number" class="form-label">Number <sup
                                            class="text-danger">*</sup></label>

                                    <input type="text" name="phoneNumber" id="number" class="form-control"
                                           placeholder="Example:060/xxxx-xxx">

                                    <div class="errorNumber"></div>
                                </div>
                                <div class="col-12 my-4">
                                    <label for="message" class="form-label">How can we help?</label>

                                    <textarea name="message" rows="6" class="form-control" id="message"
                                              placeholder="Tell us something more"></textarea>
                                    <div class="errorMsg"></div>
                                </div>


                                <div class="col-lg-3 col-md-7 col-sm-6 col-10 mx-auto mt-5 bt">

                                    <input type="submit" id="btnSubmitForm" name="btnSubmitForm" value="Send Message">

                                </div>

                            </div>
                            @include('partials.messages')
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
@endsection
