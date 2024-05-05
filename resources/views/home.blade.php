 

@extends('templates.default-page')

<style type="text/css">
    .avaUser {
        padding: 0.25rem;
        background-color: #fff;
        border: 0px solid #dee2e6;
        border-radius: 75.25rem;
        /* max-width: 8%; */
        width: 88px;
        height: 88px;
    }

    div.stars {}

    a.star span.vote-hover {
        color: #fffb1f;
    }

    a.star span:active {
        color: #ffd000;
    }

    a.star span.vote-active {
        color: #ffd000;
    }

    .blue {
        color: #ffd000;
    }
    div.pststars{
        position: relative;
        left: -450px;
        top: -35px;
    }
    div.diachi{
        position: relative;
        top: 100px;
    }
    * {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
.monan {
  position: relative;
  width: 15%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.monan:hover .image {
  opacity: -10;
}

.monan:hover .middle {
  opacity: 1;
}

.text {
  background-color: #ee9e0b;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}

<style>/*<![CDATA[*/
.chatbot-toggler{position:fixed;font-size:25px;bottom:30px;left:35px;outline:none;border:none;height:50px;width:50px;display:flex;cursor:pointer;align-items:center;justify-content:center;z-index:2;border-radius:50%;background:#e0ac33;transition:all .2s ease}
body.show-chatbot .chatbot-toggler{transform:rotate(90deg)}
.chatbot-toggler span{color:#fff;position:absolute}
.chatbot-toggler span:last-child,body.show-chatbot .chatbot-toggler span:first-child{opacity:0;display:flex}
body.show-chatbot .chatbot-toggler span:last-child{opacity:1}
.chatbot{position:fixed;left:35px;bottom:90px;width:350px;background:#fff;z-index:999;border-radius:15px;overflow:hidden;opacity:0;pointer-events:none;transform:scale(0.5);transform-origin:bottom right;box-shadow:0 0 128px 0 rgba(0,0,0,0.1),0 32px 64px -48px rgba(0,0,0,0.5);transition:all .1s ease}
body.show-chatbot .chatbot{opacity:1;pointer-events:auto;transform:scale(1)}
.chatbot header{padding:10px 0;position:relative;text-align:center;color:#fff;background:#e0ac33;box-shadow:0 2px 10px rgba(0,0,0,0.1)}
.chatbot header span{position:absolute;right:15px;top:50%;cursor:pointer;transform:translateY(-50%)}
header h2{font-size:1.4rem}
.chatbot .chatbox{overflow-y:auto;height:450px;padding:30px 20px 100px}
.chatbot :where(.chatbox,textarea)::-webkit-scrollbar{width:6px}
.chatbot :where(.chatbox,textarea)::-webkit-scrollbar-track{background:#fff;border-radius:25px}
.chatbot :where(.chatbox,textarea)::-webkit-scrollbar-thumb{background:#ccc;border-radius:25px}
.chatbox .chat{display:flex;list-style:none}
.chatbox .outgoing{margin:20px 0;justify-content:flex-end}
.chatbox .incoming span{width:32px;height:32px;color:#fff;cursor:default;text-align:center;line-height:32px;align-self:flex-end;background:#e0ac33;border-radius:4px;margin:0 10px 7px 0}
.chatbox .chat p{white-space:pre-wrap;padding:12px 16px;border-radius:10px 10px 0 10px;max-width:75%;color:#fff;font-size:.95rem;background:#e0ac33}
.chatbox .incoming p{border-radius:10px 10px 10px 0}
.chatbox .chat p.error{color:#721c24;background:#f8d7da}
.chatbox .incoming p{color:#000;background:#f2f2f2}
.chatbot .chat-input{display:flex;gap:5px;position:absolute;bottom:0;width:100%;background:#fff;padding:3px 20px;border-top:1px solid #ddd}
.chat-input textarea{height:55px;width:100%;border:none;outline:none;resize:none;max-height:180px;padding:15px 15px 15px 0;font-size:.95rem}
.chat-input span{align-self:flex-end;color:#e0ac33;cursor:pointer;height:55px;display:flex;align-items:center;visibility:hidden;font-size:1.35rem}
.chat-input textarea:valid ~ span{visibility:visible}
@media (max-width: 490px) {
.chatbot-toggler{right:20px;bottom:20px}
.chatbot{left:0;bottom:0;height:100%;border-radius:0;width:100%}
.chatbot .chatbox{height:90%;padding:25px 15px 100px}
.chatbot .chat-input{padding:5px 15px}
.chatbot header span{display:block}
}
/*]]>*/</style>
</style>
@section('content')
@section('content')
    <section class="home-slider owl-carousel img"
        style="background: linear-gradient(rgba(17, 30, 63, 0.9), rgba(112, 83, 15, 0.9)),
                                                                                                            url({{ asset('public/front-end/images/anhFood1.jpg') }});
                                                                                                            background-position: center center;
                                                                                                            background-repeat: no-repeat;
                                                                                                            background-size: cover;">
        <div class="slider-item">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text align-items-center" data-scrollax-parent="true">

                    <div class="col-md-5 col-sm-12 ftco-animate">
                        <span class="subheading">Delicious</span>
                        <h1 class="mb-8">SORAE JAPANESE RESTAURANT</h1>
                        <p class="mb-4 mb-md-5">Menu đa dạng với những món ăn ngon nhất từ các đầu bếp hàng đầu thế giới.
                        </p>
                        <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Đặt Ngay</a> <a href="#"
                                class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Xem Menu</a></p>
                    </div>
                    <div class="col-md-7 ftco-animate hero text-center text-lg-end overflow-hidden">
                        <img src="{{ asset($restaurant->food_banner) }}" class="img-fluid" alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>
    <body>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="{{ asset('public/front-end/images/Kientruc.jpg') }}" style ="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="{{ asset('public/front-end/images/SORAE1546-copy.jpg') }}" style ="width:100%">
 
</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="{{ asset('public/front-end/images/Phong rieng.jpg') }}" style ="width:100%">

</div>


</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
</body>
    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url({{ asset('public/front-end/images/Welcomemain.jpg') }});">
        </div>
        <div class="one-half ftco-animate">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4">WELCOME TO SORAE RESTAURANT</h2>
            </div>
            <div>
                <p>Đội ngũ đầu bếp tại Sorae sáng tạo ra những thực đơn phù hợp với mọi dịp. Các cặp đôi có thể lựa chọn thực
                    đơn riêng hoặc buffet phong phú với phong cách Nhật Bản. Đối với các cặp đôi tìm kiếm đám cưới mang phong
                     cách ấm cúng, Sorae sẵn sàng để biến giấc mơ của bạn trở thành hiện thực với khung cảnh ngoạn mục cho đám cưới
                   thơ mộng cùng phong cách vô cùng sang trọng.</p>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-services">
        <div class="overlay" ></div>
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4" style="font-size: 35px">DỊCH VỤ CỦA CHÚNG TÔI</h2>
                    <p style="font-size: 22px">Hãy để Sorae Japanese Restaurant đáp ứng yêu cầu và hiện thực hóa ý tưởng của
                        bạn về một buổi tiệc,
                        một đám cưới,....</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                            <span class="flaticon-diet"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading" style="font-size: 22px">CƯỚI HỎI</h3>
                            <p style="font-size: 20px">Không gian tiệc cưới thật đẹp với vòng hoa và lễ đường, để tạo ra
                                những trải nghiệm sâu sắc
                                khó quên nhất.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                            <span class="flaticon-bicycle"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading" style="font-size: 22px">SINH NHẬT - THÔI NÔI</h3>
                            <p style="font-size: 20px">Không gian ấm cúng phù hợp cho những tiệc sinh nhật dành cho các bé,
                                cho gia đình và các cặp
                                đôi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5"><span
                                class="flaticon-pizza-1"></span></div>
                        <div class="media-body">
                            <h3 class="heading" style="font-size: 22px">TIỆC THEO CHỦ ĐỀ</h3>
                            <p style="font-size: 20px">Hãy nói lên ý tưởng của bạn, Sorae sẽ hiện thực hóa điều ước
                                đó thành một không gian
                                tuyệt đẹp.</p>middle
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">MENU ĐA DẠNG</h2>
                    <p style="font-size: 22px">Hãy để Sorae Restaurant đánh thức vị giác của bạn!</p>
                </div>
            </div>
        </div>
        <div class="container-wrap">
            <div class="row no-gutters d-flex">
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img"
                            style="background-image: url({{ asset('public/front-end/images/anhDrink2.jpg') }});"></a>
                            
                        <div class="text p-4">
                            <h3>Cocktail dâu tây</h3>
                            <p>Sự kết hợp hoàn hảo giữa Cocktail mát lạnh và dâu tây được nhập từ Mỹ
                            </p>
                            <p class="price"><span>90.000 VNĐ</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img"
                            style="background-image: url({{ asset('public/front-end/images/anhFood6.jpg') }});"></a>
                        <div class="text p-4">
                            <h3>Cá ngừ phi lê</h3>
                            <p>Món ngon nhất tại cửa hàng chính là cá ngừ phi lê ăn kết hợp với nướt sốt
                            </p>
                            <p class="price"><span>190.000 VNĐ</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img"
                            style="background-image: url({{ asset('public/front-end/images/anhDrink3.jpg') }});"></a>
                        <div class="text p-4">
                            <h3>Smoothies dứa</h3>
                            <p>Smoothies dứa là sự kết hợp giữa chút rượu và dứa thơm từ Tây Ban Nha
                            </p>
                            <p class="price"><span>120.000 VNĐ</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img order-lg-last"
                            style="background-image: url({{ asset('public/front-end/images/anhFood3.jpg') }});"></a>
                        <div class="text p-4">
                            <h3>Salad củ quả</h3>
                            <p>Món ăn healthy nhất của nhà hàng Rice Bowl sẽ phù hợp với vị khách hàng khó tính nhất</p>
                            <p class="price"><span>123.000 VNĐ</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img order-lg-last"
                            style="background-image: url({{ asset('public/front-end/images/anhFood7.jpg') }});"></a>
                        <div class="text p-4">
                            <h3>Trà táo bạc hà</h3>
                            <p>Trà thanh lọc được chiết xuất từ lá trà thiên nhiên, thêm chút bạc hà the the và vị táo
                                nguyên chất</p>
                            <p class="price"><span>77.000 VNĐ</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex ftco-animate">
                    <div class="services-wrap d-flex">
                        <a href="#" class="img order-lg-last"
                            style="background-image: url({{ asset('public/front-end/images/anhFood8.jpg') }});"></a>
                        <div class="text p-4">
                            <h3>Súp bò hầm</h3>
                            <p>Súp nóng hổi được hầm với thịt bò Mỹ sẽ để lại cho bạn cảm giác khó quên và muốn thử lại
                            </p>
                            <p class="price"><span>299.000 VNĐ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-gallery">
            <div class="container-wrap">
                <div class="row no-gutters">
                    <div class="col-md-3 ftco-animate">
                        <a href="#" class="gallery img d-flex align-items-center"
                            style="background-image: url({{ asset('public/front-end/images/anhGDV5.jpg') }});">
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                <span class="icon-search"></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 ftco-animate">
                        <a href="#" class="gallery img d-flex align-items-center"
                            style="background-image: url({{ asset('public/front-end/images/anhGDV9.jpg') }});">
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                <span class="icon-search"></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 ftco-animate">
                        <a href="#" class="gallery img d-flex align-items-center"
                            style="background-image: url({{ asset('public/front-end/images/anhGDV10.jpg') }});">
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                <span class="icon-search"></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 ftco-animate">
                        <a href="#" class="gallery img d-flex align-items-center"
                            style="background-image: url({{ asset('public/front-end/images/anhGDV13.jpg') }});">
                            <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                <span class="icon-search"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>


        

        @if ($statusReview == 1)
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 heading-section ftco-animate text-center row">
                            <h2 class="mb-4 col-12" style="color: #FEB700">ĐÁNH GIÁ TỪ PHÍA KHÁCH HÀNG</h2>
                            @foreach ($list_evas as $eva)
                                <div class="media col-12" style="margin-top: 50px">
                                    <img src="{{ asset('public/front-end/images/' . $eva->avatarUrl) }}" alt="Avatar"
                                        class="avaUser">
                                    {{-- <img class="avaUser" src="{{asset('public/front-end/images/'.$eva->avatarUrl)}}" alt="..." class="img-thumbnail"> --}}
                                    <div class="media-body" style="margin-left: 25px">
                                        <h1
                                            style="font-size: 20px; font-weight: bold; color: rgb(255, 237, 75); text-align:left">
                                            {{ $eva->fullName }}</h1>
                                        <p style="font-size: 16px; text-align:left">{{ $eva->createdDate }}</p>
                                        <p style="font-size: 16px; text-align:left">{{ $eva->numberStar }} 
                                         <div class ="pststars">
                                         <div class="stars"  >
                                            <a id="star-1" class="star">
                                                <span class="glyphicon glyphicon-star"></span>
                                            </a>
                                        </div>
                                         </div>
                                        </p>
                                        <p style="font-size: 20px; text-align:left; color: rgb(255, 252, 225)">
                                            {{ $eva->content }}</p>
                                    </div>
                                </div>
                            @endforeach

                            <div class="d-flex justify-content-center col-12">
                                {{ $list_evas->links() }}
                            </div>

                            <form action="{{ route('send_comment') }}" method="post" class="col-12">
                                @csrf
                                <div class="form-group shadow-textarea">
                                    <h2 for="exampleFormControlTextarea1" style="margin-top: 30px; color: #FEB700">NHẬP ĐÁNH
                                        GIÁ CỦA BẠN:</h2>
                                    <p style="color: #FFE39C; font-size:22px">Những đóng góp quý giá của quý khách là động
                                        lực để chúng tôi cố gắng hoàn thiện hơn!
                                    </p>
                                    <textarea style="color: #fff !important; font-size: 20px; margin-top: 50px"
                                        class="form-control" name="comment_content"
                                        placeholder="Nhập đánh giá của bạn để có trải nghiệm tốt hơn..."
                                        rows="2"></textarea>
                                    <div id="cate-rating" class="cate-rating"
                                        style="text-align: left; margin-top: 20px">
                                        <div class="stars">
                                            <a id="star-1" class="star">
                                                <span class="glyphicon glyphicon-star"></span>
                                            </a>
                                            <a id="star-2" class="star"><span
                                                    class="glyphicon glyphicon-star"></span></a>
                                            <a id="star-3" class="star"><span
                                                    class="glyphicon glyphicon-star"></span></a>
                                            <a id="star-4" class="star"><span
                                                    class="glyphicon glyphicon-star"></span></a>
                                            <a id="star-5" class="star"><span
                                                    class="glyphicon glyphicon-star"></span></a>
                                            <input type="hidden" name="numberStar" id="numberStar">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning send-comment"
                                    style="width: 150px; height: 40px; font-size : 18px">Gửi đánh giá</button>
                                <div id="notify_comment"></div>
                            </form>
                        </div>

                    </div>

                </div>
            </section>
        @else

        @endif



        <section class="ftco-appointment">
            <div class="overlay"></div>
            <div class="container-wrap">
                <div class="row no-gutters d-md-flex align-items-center">
                    
                  
                    <div class="col-md-6 appointment ftco-animate">
                        <h3 class="mb-3">Liên hệ với chúng tôi</h3>
                        <form  class="appointment-form" method="post" action="http://localhost/Sorae/resources/views/sent_t.php">
                            <div class="d-md-flex">
                                <div class="form-group">
                                    <input style="text-size: 20px" name="Name1" type="text" class="form-control"
                                        placeholder="Họ và tên">
                                </div>
                            </div>
                            <div class="d-me-flex">
                                <div class="form-group">
                                    <input type="text" name="Contact1" class="form-control" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="Notes1" id="" cols="30" rows="3" class="form-control"
                                    placeholder="Lời nhắn nhủ"></textarea>
                            </div>
                              <input type="submit" name="Send1" class="btn btn-success" value="Gửi" />
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    @endsection
    @section('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                /*
                 * Hiệu ứng khi rê chuột lên ngôi sao
                 */
                $('a.star').mouseenter(function() {
                    if ($('#cate-rating').hasClass('rating-ok') == false) {
                        var eID = $(this).attr('id');
                        eID = eID.split('-').splice(-1);
                        $('a.star').removeClass('vote-active');
                        for (var i = 1; i <= eID; i++) {
                            $('#star-' + i + ' span').addClass('vote-hover');
                        }
                    }
                }).mouseleave(function() {
                    if ($('#cate-rating').hasClass('rating-ok') == false) {
                        $('span').removeClass('vote-hover');
                    }
                });

                /*
                 * Sự kiện khi cho điểm
                 */
                $('a.star').click(function() {
                    if ($('#cate-rating').hasClass('rating-ok') == false) {
                        var eID = $(this).attr('id');
                        eID = eID.split('-').splice(-1).toString();
                        for (var i = 1; i <= eID; i++) {
                            $('#star-' + i).addClass('vote-active');
                        }
                        //$('p#vote-desc').html('<span class="blue">' + eID + '</span>');
                        $('#numberStar').val(eID);
                        $('#cate-rating').addClass('rating-ok');
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.send-comment').click(function() {
                    var numberStar = $('#numberStar').val();
                    var comment_content = $('.comment_content').val();
                    //var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('send_comment') }}",
                        method: "POST",
                        data: {
                            comment_content: comment_content,
                            numberStar: numberStar
                        },
                        success: function(data) {
                            $('#notifiy_comment').html(
                                '<p class="text text-success">Thêm bình luận thành công!</p>')
                        }
                    })
                })
            });
        </script>
            <!-- Messenger Plugin chat Code -->
            <div id="fb-root"></div>

            <!-- Your Plugin chat code -->
            <div id="fb-customer-chat" class="fb-customerchat">
            </div>

            <script>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "109572828265035");
            chatbox.setAttribute("attribution", "biz_inbox");
            </script>

            <!-- Your SDK code -->
            <script>
            window.fbAsyncInit = function() {
                FB.init({
                xfbml            : true,
                version          : 'v12.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            </script>


        

<button class="chatbot-toggler">
    <span class="material-symbols-rounded"><i class="fas fa-comment-alt"></i></span>
    <span class="material-symbols-outlined"><i class="fas fa-times"></i></span>
</button>
<div class="chatbot">
    <header>
        <h2>Chatbot</h2>
        <span class="close-btn material-symbols-outlined"><i class="fas fa-times"></i></span>
    </header>
    <ul class="chatbox">
        <li class="chat incoming">
            <span class="material-symbols-outlined"><i class="fas fa-robot"></i></span>
            <p>Hi there 👋<br />How can I help you today?</p>
        </li>
    </ul>
    <div class="chat-input">
        <textarea placeholder="Enter a message..." required="required" spellcheck="false"></textarea>
        <span class="material-symbols-rounded" id="send-btn"><i class="fas fa-share"></i></span>
    </div>
</div>
<script>/*<![CDATA[*/
const chatbotToggler = document.querySelector(".chatbot-toggler");
const closeBtn = document.querySelector(".close-btn");
const chatbox = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");

let userMessage = null; // Variable to store user's message
const API_KEY = "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"; // Paste your API key here
const inputInitHeight = chatInput.scrollHeight;

const createChatLi = (message, className) => {
    // Create a chat <li> element with passed message and className
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", `${className}`);
    let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined"><i class="fas fa-robot"></i></span><p></p>`;
    chatLi.innerHTML = chatContent;
    chatLi.querySelector("p").textContent = message;
    return chatLi; // return chat <li> element
}

const generateResponse = (chatElement) => {
    const API_URL = "https://api.openai.com/v1/chat/completions";
    const messageElement = chatElement.querySelector("p");

    // Define the properties and message for the API request
    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Authorization": `Bearer ${API_KEY}`
        },
        body: JSON.stringify({
            model: "gpt-3.5-turbo",
            messages: [{role: "user", content: userMessage}],
        })
    }

    // Send POST request to API, get response and set the reponse as paragraph text
    fetch(API_URL, requestOptions).then(res => res.json()).then(data => {
        messageElement.textContent = data.choices[0].message.content.trim();
    }).catch(() => {
        messageElement.classList.add("error");
        messageElement.textContent = "Oops! Something went wrong. Please try again.";
    }).finally(() => chatbox.scrollTo(0, chatbox.scrollHeight));
}

const handleChat = () => {
    userMessage = chatInput.value.trim(); // Get user entered message and remove extra whitespace
    if(!userMessage) return;

    // Clear the input textarea and set its height to default
    chatInput.value = "";
    chatInput.style.height = `${inputInitHeight}px`;

    // Append the user's message to the chatbox
    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatbox.scrollTo(0, chatbox.scrollHeight);
    
    setTimeout(() => {
        // Display "Thinking..." message while waiting for the response
        const incomingChatLi = createChatLi("Thinking...", "incoming");
        chatbox.appendChild(incomingChatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
        generateResponse(incomingChatLi);
    }, 600);
}

chatInput.addEventListener("input", () => {
    // Adjust the height of the input textarea based on its content
    chatInput.style.height = `${inputInitHeight}px`;
    chatInput.style.height = `${chatInput.scrollHeight}px`;
});

chatInput.addEventListener("keydown", (e) => {
    // If Enter key is pressed without Shift key and the window 
    // width is greater than 800px, handle the chat
    if(e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
        e.preventDefault();
        handleChat();
    }
});

sendChatBtn.addEventListener("click", handleChat);
closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
/*]]>*/</script>
@endsection

    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "109572828265035");
    chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
    window.fbAsyncInit = function() {
        FB.init({
        xfbml            : true,
        version          : 'v12.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

@endsection
