@extends('home.layout.layout')

@section('header')
<link rel="stylesheet" href="/homeassets/css/course.min.css" />
<link rel="stylesheet" href="/homeassets/css/about.min.css" />
<link rel="stylesheet" href="/homeassets/css/index.min.css" />
@endsection
@section('content')
<header class="page">
    <div class="page_breadcrumbs">
        <div class="container">
            <ul class="page_breadcrumbs-list d-flex flex-wrap align-items-center">
                <li class="list-item">
                    <a href="/" class="link">Home</a>
                </li>

                <li class="list-item">About</li>
            </ul>
        </div>
    </div>
    <div class="page_main">
        <div class="underlay"></div>
        <div class="container">
            <div class="content-wrapper">
                <h1 class="page_main-header">About</h1>
                <p class="page_main-text">
                At IntellectFusions, we believe in the power of knowledge and its ability to transform lives. Our platform was born from the idea of providing comprehensive assistance to students, individuals and businesses worldwide in need of academic assistance, data analysis and more. We collaborate with companies to develop customized data analysis solutions that meet their unique needs and enable them to make informed decisions based on accurate, actionable insights. Our team of dedicated experts comprises seasoned educators, researchers, and data analysts, each committed to delivering exceptional service to your unique needs and their years of experience to every project. Whether you're a student striving for academic success, a business seeking to optimize operations, or an individual looking to create effective presentations, we have the expertise and resources to help you achieve your goals.
At IntellectFusions, we're not just a service provider - we're your partner in excellence.
                </p>

            </div>
        </div>
    </div>
</header>


<!-- info blocks section start -->
<section class="infoblock d-flex flex-column flex-lg-row flex-md-wrap">
    <div class="infoblock_block col-lg-6 d-flex flex-column justify-content-center align-items-center" data-order="1">
        <div class="content">
            <h2 class="infoblock_block-header h1">How We Improve Our Quality</h2>
            <p class="infoblock_block-text">
            We constantly work on making our platform better. We take our clients’ feedback into account to provide them with high-quality services that meet their expectations and fulfill their needs.
            </p>
        </div>
    </div>
    <div class="infoblock_block col-lg-6" data-order="2">
        <div class="cover">
            <div class="cover_media">
                <picture>
                    <source data-srcset="/homeassets/img/about1.webp" srcset="/homeassets/img/about1.webp" />
                    <img class="lazy" data-src="/homeassets/img/about1.webp" src="/homeassets/img/about1.webp" alt="media" />
                </picture>
            </div>
            <a class="cover_play" href="#">
                <lottie-player
                    src="/homeassets/lottie/play.json"
                    background="transparent"
                    speed=".5"
                    style="width: 100%; height: 100%"
                    loop
                    autoplay
                ></lottie-player>
            </a>
            <span class="cover_duration">20:00</span>
        </div>
        <iframe
            src="https://www.youtube.com/embed/XHOmBV4js_E?controls=0"
            title="YouTube video player"
            allowfullscreen
        ></iframe>
    </div>
    <!-- <div class="infoblock_block col-lg-6" data-order="3">
        <div class="parallax">
            <div class="img">
                <picture>
                    <source data-srcset="/homeassets/img/heroimage.jpeg" srcset="/homeassets/img/heroimage.jpeg" />
                    <img class="lazy" data-src="i/homeassets/mg/heroimage.jpeg" src="/homeassets/img/heroimage.jpeg" alt="media" />
                </picture>
            </div>
        </div>
    </div>
    <div class="infoblock_block col-lg-6 infoblock_block--sale d-flex flex-column justify-content-center align-items-center" data-order="4">
        <div class="content d-flex flex-column flex-sm-row align-items-center align-items-sm-start">
            <span class="content_percent">50%</span>
            <div class="content_text d-flex flex-column align-items-center align-items-xl-start">
                <h3 class="title"><span class="percent">50%</span> Season sale</h3>
                <p class="text">Unlimited access to educational materials<span class="text_cut">and lectures</span></p>
            </div>
        </div>
        <form class="form d-flex flex-column flex-sm-row" action="#" method="post" data-type="subscription">
            <input class="field required" type="text" data-type="email" placeholder="Subscribe by e-mail" />
            <button class="btn btn--gradient" type="submit">
                <span class="text">Get Started Now</span>
            </button>
        </form>
    </div> -->
</section>
<!-- popular courses section start -->
<section class="popular py-5">
    <div class="container">
        <div class="popular_header">
            <h2 class="popular_header-title" data-aos="fade-up">Services</h2>
            <p class="popular_header-text" data-aos="fade-down">
               Explore the wide range of services we offer to discover how we can support your success:
            </p>
        </div>
        <ul class="popular_tags courses-tags d-flex flex-wrap align-items-center justify-content-center">
            @forelse ($projecttypes as $projecttype)
                <li class="list-item" data-aos="fade-left">
                    <a class="tag" href="#">{{ $projecttype['type_name']}}</a>
                </li>
            @empty
                <div class="alert alert-danger" role="alert">No project type</div>
            @endforelse
            
        </ul>
       
    </div>
</section>
<!-- info blocks section end -->

<!-- reviews section start -->
<!-- <section class="reviews" id="reviews">
    <div class="container">
        <h2 class="reviews_header">What our students say</h2>

        <div class="reviews_slider">
            <i class="icon-quote-left-solid icon"></i>
            <div class="swiper-wrapper">
                <div class="reviews_slider-slide swiper-slide">
                    <q class="quote">
                        “Nulla sed suscipit lectus. Phasellus rhoncus vulputate odio et placerat. Aenean ut aliquam erat.
                        Integer rutrum eleifend ante, a bibendum leo tristique id. Phasellus euismod sapien non ornare sagittis.
                        Donec molestie eros dolor. Curabitur laoreet neque at magna pulvinar cursus. Nulla euismod orci in
                        varius mollis”
                    </q>
                    <div class="author d-flex flex-column align-items-center">
                        <span class="avatar">
                            <picture>
                                <source data-srcset="img/placeholder.jpg" srcset="img/placeholder.jpg" />
                                <img class="lazy" data-src="img/placeholder.jpg" src="img/placeholder.jpg" alt="media" />
                            </picture>
                        </span>
                        <span class="name h5"> Milagros Bueno </span>
                        <ul class="rating d-flex align-items-center">
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="reviews_slider-slide swiper-slide">
                    <q class="quote">
                        “Donec molestie eros dolor. Nulla sed suscipit lectus. Phasellus rhoncus vulputate odio et placerat.
                        Aenean ut aliquam erat. Integer rutrum eleifend ante, a bibendum leo tristique id. Phasellus euismod
                        sapien non ornare sagittis. Curabitur laoreet neque at magna pulvinar cursus. Nulla euismod orci in
                        varius mollis”
                    </q>
                    <div class="author d-flex flex-column align-items-center">
                        <span class="avatar">
                            <picture>
                                <source data-srcset="img/placeholder.jpg" srcset="img/placeholder.jpg" />
                                <img class="lazy" data-src="img/placeholder.jpg" src="img/placeholder.jpg" alt="media" />
                            </picture>
                        </span>
                        <span class="name h5"> Lisa Smith </span>
                        <ul class="rating d-flex align-items-center">
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="reviews_slider-slide swiper-slide">
                    <q class="quote">
                        “Nulla sed suscipit lectus. Phasellus rhoncus vulputate odio et placerat. Aenean ut aliquam erat.
                        Integer rutrum eleifend ante, a bibendum leo tristique id. Phasellus euismod sapien non ornare sagittis.
                        Donec molestie eros dolor. Curabitur laoreet neque at magna pulvinar cursus. Nulla euismod orci in
                        varius mollis”
                    </q>
                    <div class="author d-flex flex-column align-items-center">
                        <span class="avatar">
                            <picture>
                                <source data-srcset="img/placeholder.jpg" srcset="img/placeholder.jpg" />
                                <img class="lazy" data-src="img/placeholder.jpg" src="img/placeholder.jpg" alt="media" />
                            </picture>
                        </span>
                        <span class="name h5"> Alice Miller </span>
                        <ul class="rating d-flex align-items-center">
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="reviews_slider-slide swiper-slide">
                    <q class="quote">
                        “Curabitur laoreet neque at magna pulvinar cursus. Nulla sed suscipit lectus. Phasellus rhoncus
                        vulputate odio et placerat. Aenean ut aliquam erat. Integer rutrum eleifend ante, a bibendum leo
                        tristique id. Phasellus euismod sapien non ornare sagittis. Donec molestie eros dolor. Nulla euismod
                        orci in varius mollis”
                    </q>
                    <div class="author d-flex flex-column align-items-center">
                        <span class="avatar">
                            <picture>
                                <source data-srcset="img/placeholder.jpg" srcset="img/placeholder.jpg" />
                                <img class="lazy" data-src="img/placeholder.jpg" src="img/placeholder.jpg" alt="media" />
                            </picture>
                        </span>
                        <span class="name h5"> Amanda Rendall </span>
                        <ul class="rating d-flex align-items-center">
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="reviews_slider-slide swiper-slide">
                    <q class="quote">
                        “Nulla sed suscipit lectus. Phasellus rhoncus vulputate odio et placerat. Aenean ut aliquam erat.
                        Integer rutrum eleifend ante, a bibendum leo tristique id. Phasellus euismod sapien non ornare sagittis.
                        Donec molestie eros dolor. Curabitur laoreet neque at magna pulvinar cursus. Nulla euismod orci in
                        varius mollis”
                    </q>
                    <div class="author d-flex flex-column align-items-center">
                        <span class="avatar">
                            <picture>
                                <source data-srcset="img/placeholder.jpg" srcset="img/placeholder.jpg" />
                                <img class="lazy" data-src="img/placeholder.jpg" src="img/placeholder.jpg" alt="media" />
                            </picture>
                        </span>
                        <span class="name h5"> Luke Grimes </span>
                        <ul class="rating d-flex align-items-center">
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                            <li class="rating_star">
                                <i class="icon-star icon"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="reviews_slider-controls d-flex align-items-center justify-content-between">
                <a class="swiper-button-prev" href="#">
                    <i class="icon-angle-left icon"></i>
                </a>
                <a class="swiper-button-next" href="#">
                    <i class="icon-angle-right icon"></i>
                </a>
            </div>
        </div>
    </div>
</section> -->
<!-- reviews section end -->


<!-- faq section start -->
<!-- <section class="faq">
    <div class="phone">
        <lottie-player
            src="/homeassets/lottie/phone.json"
            background="transparent"
            speed="1"
            style="width: 100%; height: 100%"
            loop
            autoplay
        ></lottie-player>
    </div>
    <div class="sphere">
        <lottie-player
            src="/homeassets/lottie/sphere.json"
            background="transparent"
            speed="1.5"
            style="width: 100%; height: 100%"
            loop
            autoplay
        ></lottie-player>
    </div>
    <div class="container d-flex flex-column align-items-center">
        <div class="faq_header">
            <h2 class="faq_header-title" data-aos="fade-down">Answering your common questions</h2>
            <p class="faq_header-text" data-aos="fade-up">
                Sed a eros sodales diam sagittis faucibus. Cras id erat nisl. Fusce faucibus nulla sed finibus egestas.
                Vestibulum purus magna, auctor consectetur sem nec, consectetur porta purus.
            </p>
        </div>
        <div class="faq_accordion" id="faq_accordion">
            <div class="faq_accordion-item">
                <div class="item-wrapper">
                    <h4
                        class="faq_accordion-item_header d-flex justify-content-between align-items-center collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#item-1"
                        aria-expanded="true"
                    >
                        <span class="text"> What ante quis tincidunt porta, neque metus dapibus velit? </span>
                        <span class="icon transform"></span>
                    </h4>
                    <div id="item-1" class="accordion-collapse collapse show">
                        <div class="faq_accordion-item_body">
                            Nam quis facilisis magna, sit amet posuere tellus. Donec imperdiet tortor vitae pharetra congue.
                            Aliquam nunc est, iaculis in erat lobortis, convallis varius mi. Orci varius natoque penatibus et
                            magnis dis parturient montes, nascetur ridiculus mus. Aliquam vel suscipit nisi, et imperdiet nulla.
                            Praesent condimentum metus aliquet venenatis feugiat. Nunc at iaculis nisl. Donec ultrices placerat
                            euismod
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq_accordion-item">
                <div class="item-wrapper">
                    <h4
                        class="faq_accordion-item_header d-flex justify-content-between align-items-center collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#item-2"
                        aria-expanded="false"
                    >
                        <span class="text"> What ante quis tincidunt porta, neque metus dapibus velit? </span>
                        <span class="icon"></span>
                    </h4>
                    <div id="item-2" class="accordion-collapse collapse">
                        <div class="faq_accordion-item_body">
                            Nam quis facilisis magna, sit amet posuere tellus. Donec imperdiet tortor vitae pharetra congue.
                            Aliquam nunc est, iaculis in erat lobortis, convallis varius mi. Orci varius natoque penatibus et
                            magnis dis parturient montes, nascetur ridiculus mus. Aliquam vel suscipit nisi, et imperdiet nulla.
                            Praesent condimentum metus aliquet venenatis feugiat. Nunc at iaculis nisl. Donec ultrices placerat
                            euismod
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq_accordion-item">
                <div class="item-wrapper">
                    <h4
                        class="faq_accordion-item_header d-flex justify-content-between align-items-center collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#item-3"
                        aria-expanded="false"
                    >
                        <span class="text"> What ante quis tincidunt porta, neque metus dapibus velit? </span>
                        <span class="icon"></span>
                    </h4>
                    <div id="item-3" class="accordion-collapse collapse">
                        <div class="faq_accordion-item_body">
                            Nam quis facilisis magna, sit amet posuere tellus. Donec imperdiet tortor vitae pharetra congue.
                            Aliquam nunc est, iaculis in erat lobortis, convallis varius mi. Orci varius natoque penatibus et
                            magnis dis parturient montes, nascetur ridiculus mus. Aliquam vel suscipit nisi, et imperdiet nulla.
                            Praesent condimentum metus aliquet venenatis feugiat. Nunc at iaculis nisl. Donec ultrices placerat
                            euismod
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="faq_btn btn--arrow" href="faq.html">View all<i class="icon-arrow-right-solid icon"></i></a>
    </div>
</section> -->

<!-- faq section end -->
@endsection