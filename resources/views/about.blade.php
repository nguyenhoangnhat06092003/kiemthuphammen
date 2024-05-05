@extends('templates.default-page')
@section('content')
    <section class="home-slider owl-carousel img"
        style="background-image: url({{ asset('public/front-end/images/nhahang.png') }});">

        <div class="slider-item" style="background-image: url({{ asset('public/front-end/images/nhahang.png') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">About</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span>
                            <span>About</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>


   
    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image:url({{ asset('public/front-end/images/Kientruc.jpg') }});"></div>
        <div class="one-half ftco-animate">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4">Welcome to <span class="flaticon-pizza">Shushi </span> A Restaurant</h2>
            </div>
            <div>
                <p>In Japanese, 'Sora' is sky, 'E' is direction, and 'SORAE' means towards the sky. As a strong affirmation, 
                    SORAE returns and recreates Japanese culinary experiences like shining pearls in the sky.
                    Located on the 51st Floor of Bitexco Financial Tower - the building with the most classic 
                    design in Saigon, and also the location with the first and most unique helipad in Vietnam and
                     a luxurious setting with a billion-dollar view. Overlooking the entire city center from a
                      height of 200m above the ground. Filling every corner with luxury, elegance, sophistication and warmth, 
                      SORAE is back and ready to conquer the taste buds of every culinary expert.</p>
            </div>
        </div>
    </section>
    <section class="ftco-intro">
        <div class="container-wrap">
            <div class="wrap d-md-flex">
                <div class="info">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-phone"></span></div>
                            <div class="text">
                                <h3>238272372</h3>
                                <p>Sorae – miniature Tokyo in the heart of SaiGon</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-my_location"></span></div>
                            <div class="text">
                                <h3>Tầng 51 Bitexco Financial Tower</h3>
                                <p>Bến Nghé, Bình Thạnh, TPHCM</p>
                            <br> <li><a href="https://www.facebook.com/kkieuuuu.313/"><span class="icon-facebook"></span></a> 
                                &nbsp &nbsp   <a href="https://www.instagram.com/ky2w_nee/"><span class="icon-instagram"></span></a></li>

                       
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-clock-o"></span></div>
                            <div class="text">
                                <h3>Open Monday-Sunday</h3>
                                <p>11:00am - 23:00pm</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="overlay"></div>
        <div class="container-wrap">
            <div class="row no-gutters d-md-flex align-items-center">
                <div class="col-md-6 d-flex align-self-stretch">

                </div>
                <div class="col-md-6">
                    <h3 >Contact Us</h3>
                    <form action="#" class="appointment-form">
                        <div class="d-md-flex">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="d-me-flex">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="3" class="form-control"
                                placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send" class="btn btn-primary py-3 px-4">
                        </div>
                    </form>
                </div>
            </div>
        </div>
            </div>
        </div>
    </section>

    <section class="ftco-appointment">
        
    </section>
@endsection
