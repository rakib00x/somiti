<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blue Star Shomithi | ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('images/logo.png') }}" rel="shortcut icon">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">

    <style>
        .ftco-section{
            padding:2em 0;
        }
        .top-header{
            background: #389382;
        }
        .ftco-navbar-light .navbar-nav > .nav-item > .nav-link::before{
            bottom:29px !important;
        }
    </style>
  </head>
  <body>

    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a style="font-size: 20px !important;" class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('assets/frontend/images/bluestar-2.png') }}" height="120px" alt=""></a>
                </div>
                <div class="col-md-9 m-auto mt-3">
                    <div class="">
                        <h3 style="font-weight: 800; letter-spacing: 3px; font-size: 48px; color:#333"><i> ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</i></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light sticky-top" id="ftco-navbar navbar_top" style="height: 60px;">
        <div class="container">
            <div action="#" class="searchform order-sm-start order-lg-last">
                <div class="form-group d-flex">
                    @auth
                    <a class="btn btn-primary" href="{{ route('dashboard') }}">Dashboard</a>
                    @else
                    <a class="btn btn-info" href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
	</nav>

    <!-- END nav -->
    <div class="hero-wrap">
	    <div class="home-slider owl-carousel">
            <div class="slider-item" style="background-image:url({{ asset('assets/frontend/images/bg_2.jpg')}});">
                <div class="overlay"></div>
                <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-8 ftco-animate">
                        <div class="text w-100 text-center">
                            <h2>We Support Business</h2>
                            <h1 class="mb-4">The Best Business Support</h1>
                            <p><a href="#contact" class="btn btn-white">Connect with us</a></p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="slider-item" style="background-image:url({{ asset('assets/frontend/images/addbg_1.jpg')}});">
                <div class="overlay"></div>
                <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-8 ftco-animate">
                        <div class="text w-100 text-center">
                            <h2>We Business Grow</h2>
                            <h1 class="mb-4">Welcome BlueStarSomithi</h1>
                            <p><a href="#contact" class="btn btn-white">Connect with us</a></p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>


            <div class="slider-item" style="background-image:url({{ asset('assets/frontend/images/bg_3.jpg')}});">
                <div class="overlay"></div>
                <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-8 ftco-animate">
                        <div class="text w-100 text-center">
                            <h2>We Give Advice</h2>
                            <h1 class="mb-4">Expert Financial Advice</h1>
                            <p><a href="#contact" class="btn btn-white">Connect with us</a></p>
                        </div>
                    </div>
                    </div>
                </div>
	      </div>
	    </div>
    </div>

    <div id="about">
        <section class="ftco-section ftco-no-pt bg-light">
            <div class="container">
                <div class="row d-flex no-gutters">
                    <div class="col-md-6 d-flex">
                        <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url({{ asset('assets/frontend/images/addabout.jpg')}});">
                        </div>
                    </div>
                    <div class="col-md-6 pl-md-5 py-md-5">
                        <div class="heading-section pl-md-4 pt-md-5">
                            <span class="subheading">Welcome to BlueStarSomithi</span>
                            <h2 class="mb-4">We Are the Best Accounting Agency</h2>
                        </div>
                        <div class="services-2 w-100 d-flex">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wealth"></span></div>
                            <div class="text pl-4">
                                <h4>Market Analysis</h4>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                            </div>
                        </div>
                        <div class="services-2 w-100 d-flex">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-accountant"></span></div>
                            <div class="text pl-4">
                                <h4>Accounting Advisor</h4>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                            </div>
                        </div>
                        <div class="services-2 w-100 d-flex">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-teamwork"></span></div>
                            <div class="text pl-4">
                                <h4>General Consultancy</h4>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                            </div>
                        </div>
                        <div class="services-2 w-100 d-flex">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-accounting"></span></div>
                            <div class="text pl-4">
                                <h4>Structured Assestment</h4>
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="ftco-counter bg-secondary ftco-no-pt" id="section-counter">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate mt-5">
                        <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="50">0</strong>
                        </div>
                        <div class="text">
                            <span>Years of Experienced</span>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate mt-5">
                        <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="8500">0</strong>
                        </div>
                        <div class="text">
                            <span>Cases Completed</span>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate mt-5">
                        <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="20">0</strong>
                        </div>
                        <div class="text">
                            <span>Awards Won</span>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate mt-5">
                        <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="50">0</strong>
                        </div>
                        <div class="text">
                            <span>Expert Consultant</span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

   <div id="services">
        <section class="ftco-section bg-light ftco-no-pt">
            <div class="text">
                <h3 class="text-center" style="font-weight: 800; padding-top: 55px; font-size: 40px;">Our Services</h3>
            </div>
        </section>
        <section class="ftco-section bg-light ftco-no-pt">
            <div class="container">
                <div class="row">
            <div class="col-md-6 col-lg-3 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block">
                <div class="icon d-flex mr-2">
                        <span class="flaticon-accounting-1"></span>
                </div>
                <div class="media-body">
                    <h3 class="heading">Accounting</h3>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block">
                <div class="icon d-flex mr-2">
                        <span class="flaticon-tax"></span>
                </div>
                <div class="media-body">
                    <h3 class="heading">Tax, Compliance &amp; Payroll</h3>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block">
                <div class="icon d-flex mr-2">
                        <span class="flaticon-loan"></span>
                </div>
                <div class="media-body">
                    <h3 class="heading">Financial Services</h3>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block">
                <div class="icon d-flex mr-2">
                        <span class="flaticon-budget"></span>
                </div>
                <div class="media-body">
                    <h3 class="heading">Growth &amp; Funding Access</h3>
                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                </div>
                </div>
            </div>
            </div>
            </div>
        </section>

        <section class="ftco-section testimony-section bg-light">
            <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section heading-section-white text-center ftco-animate">
                <span class="subheading">Testimonies</span>
                <h2>Happy Clients &amp; Feedbacks</h2>
            </div>
            </div>
            <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                <div class="item">
                    <div class="testimony-wrap py-4">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                    <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                            <div class="user-img" style="background-image: url({{ asset('assets/frontend/images/person_1.jpg')}})"></div>
                            <div class="pl-3">
                                <p class="name">Roger Scott</p>
                                <span class="position">Marketing Manager</span>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimony-wrap py-4">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                    <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                            <div class="user-img" style="background-image: url({{ asset('assets/frontend/images/person_2.jpg')}})"></div>
                            <div class="pl-3">
                                <p class="name">Roger Scott</p>
                                <span class="position">Marketing Manager</span>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimony-wrap py-4">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                    <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                            <div class="user-img" style="background-image: url({{ asset('assets/frontend/images/person_3.jpg')}})"></div>
                            <div class="pl-3">
                                <p class="name">Roger Scott</p>
                                <span class="position">Marketing Manager</span>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testimony-wrap py-4">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></span></div>
                    <div class="text">
                        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <div class="d-flex align-items-center">
                            <div class="user-img" style="background-image: url({{ asset('assets/frontend/images/person_2.jpg')}})"></div>
                            <div class="pl-3">
                                <p class="name">Roger Scott</p>
                                <span class="position">Marketing Manager</span>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
   </div>

    <div id="contact">
        <section class="ftco-section bg-light ftco-no-pt">
            <div class="text">
                <h3 class="text-center" style="font-weight: 800; padding-top: 55px; font-size: 40px;">Contact Us</h3>
            </div>
        </section>
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="wrapper">
                            <div class="row no-gutters">
                                        <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                                            <div class="contact-wrap w-100 p-md-5 p-4">
                                                <h3 class="mb-4">Get in touch</h3>
                                                <div id="form-message-warning" class="mb-4"></div>
                                                <div id="form-message-success" class="mb-4">
                                                Your message was sent, thank you!
                                                </div>
                                                <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="label" for="name">Full Name</label>
                                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="label" for="email">Email Address</label>
                                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="label" for="subject">Subject</label>
                                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="label" for="#">Message</label>
                                                                <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="submit" value="Send Message" class="btn btn-primary">
                                                                <div class="submitting"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                                                <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                                                    <h3>Let's get in touch</h3>
                                                    <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                            <div class="dbox w-100 d-flex align-items-start">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-map-marker"></span>
                                                </div>
                                                <div class="text pl-3">
                                                    <p><span>Address :</span> ৮৩৯/৩৯, লোয়ার যশোর রোড, নতুন রাস্তা, দৌলতপুর</p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-phone"></span>
                                                </div>
                                                <div class="text pl-3">
                                                    <p><span>Phone :</span> <a href="tel://1234567920">01911904312, 01701298350</a></p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-paper-plane"></span>
                                                </div>
                                                <div class="text pl-3">
                                                    <p><span>Email :</span> <a href="mailto:info@yoursite.com"> bluestar261k@gmail.com</a></p>
                                                </div>
                                            </div>
                                            <div class="dbox w-100 d-flex align-items-center">
                                                <div class="icon d-flex align-items-center justify-content-center">
                                                    <span class="fa fa-globe"></span>
                                                </div>
                                                <div class="text pl-3">
                                                <p><span>Website :</span> <a href="https://bluestarsomithi.com/">bluestarsomithi.com</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-secondary">
      <div class="container py-5">
    		<div class="row">
          <div class="col-md-7 d-flex align-items-center">
            <h2 class="mb-3 mb-sm-0" style="color:black; font-size: 22px;">Sign Up for Your Free 1st Accounting Consultation</h2>
          </div>
          <div class="col-md-5 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


    <footer class="footer">
        <div class="container-fluid px-lg-5">
            <div class="row">
                <div class="col-md-12 py-5">
                    <div class="row">
                        <div class="col-md-4 mb-md-0 mb-4">
                            <h2 class="footer-heading">About us</h2>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                            <ul class="ftco-footer-social p-0">
                            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 mb-md-0 mb-4">
                            <h2 class="footer-heading">Discover</h2>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('index') }}" class="py-1 d-block">Home</a></li>
                                <li><a href="#about" class="py-1 d-block">About us</a></li>
                                <li><a href="#services" class="py-1 d-block">Services</a></li>
                                <li><a href="#contact" class="py-1 d-block">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 mb-md-0 mb-4">
                            <h2 class="footer-heading">Resources</h2>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-1 d-block">Terms &amp; Conditions</a></li>
                                <li><a href="#" class="py-1 d-block">Policies</a></li>
                                <li><a href="#" class="py-1 d-block">Charts</a></li>
                                <li><a href="#" class="py-1 d-block">Privacy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="row" style="background-color: #262525">
        <div class="col-md-12">
            <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="http://rapiditltd.com/" target="_blank">rapiditltd.com</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
    </div>
</div>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('assets/frontend/js/google-map.js') }}"></script>
  <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
  </body>
</html>
