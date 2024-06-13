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

                <li class="list-item">Data Analytics</li>
            </ul>
        </div>
    </div>
    <div class="page_main">
        <div class="underlay"></div>
        <div class="container">
            <div class="content-wrapper">
                <h1 class="page_main-header">Data Analysis</h1>
                <p class="page_main-text">
                Our data analysis services enable businesses to efficiently gather, process, and convert their data into valuable insights, eliminating the need for substantial investments in developing and managing an in-house analytics system.At IntellectFusions, we are dedicated to providing swift, reliable, and adaptable analytical insights, empowering companies to make data-driven decisions and achieve their goals.
                </p>

            </div>
        </div>
    </div>
</header>


<!-- info blocks section start -->
<section class="infoblock d-flex flex-column flex-lg-row flex-md-wrap">
    <div class="infoblock_block col-lg-6 d-flex flex-column justify-content-center align-items-center" data-order="1">
        <div class="content">
            <h2 class="infoblock_block-header h1">Industries We Serve </h2>
            <p class="infoblock_block-text">
            Our data analysis services cater to a wide range of industries, including:
            </p>
            <ul class="popular_tags courses-tags d-flex flex-wrap align-items-start justify-content-start">
                <li class="list-item" data-aos="fade-left">
                    <a class="tag" href="#">Finance</a>
                </li>
                <li class="list-item" data-aos="fade-left" data-aos-delay="50">
                    <a class="tag" href="#">Academic</a>
                </li>
                <li class="list-item" data-aos="fade-left" data-aos-delay="100">
                    <a class="tag" href="#">Healthcare</a>
                </li>
                <li class="list-item" data-aos="fade-left" data-aos-delay="150">
                    <a class="tag" href="#">Sales</a>
                </li>
                <li class="list-item" data-aos="fade-left" data-aos-delay="200">
                    <a class="tag" href="#">HR</a>
                </li>
                <li class="list-item" data-aos="fade-left" data-aos-delay="250">
                    <a class="tag" href="#">Assets</a>
                </li>
                <li class="list-item" data-aos="fade-left" data-aos-delay="250">
                    <a class="tag" href="#">Brands and products</a>
                </li>
                <li class="list-item" data-aos="fade-left" data-aos-delay="250">
                    <a class="tag" href="#">Others</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="infoblock_block col-lg-6" data-order="2">
        <div class="cover">
            <div class="cover_media">
                <picture>
                    <source data-srcset="/homeassets/img/data2.jpeg" srcset="/homeassets/img/data2.jpeg" />
                    <img class="lazy" data-src="/homeassets/img/data2.jpeg" src="/homeassets/img/data2.jpeg" alt="media" />
                </picture>
            </div>
            
        </div>
    </div>
    <div class="infoblock_block col-lg-6" data-order="3">
        <div class="parallax">
            <div class="img">
                <picture>
                    <source data-srcset="/homeassets/img/data1.jpeg" srcset="/homeassets/img/data1.jpeg" />
                    <img class="lazy" data-src="i/homeassets/mg/data1.jpeg" src="/homeassets/img/data1.jpeg" alt="media" />
                </picture>
            </div>
        </div>
    </div>
    <div class="infoblock_block col-lg-6 infoblock_block--sale d-flex flex-column justify-content-center align-items-center" data-order="4">
        <div class="content d-flex flex-column flex-sm-row align-items-start align-items-sm-start">
          
            <div class="content_text d-flex flex-column align-items-left align-items-xl-start">
                <h3 class="title">Why Choose Us?                </h3>
                <p class="text text-left" style="text-align:left;">Expert Team: Our team consists of highly skilled analysts with extensive industry experience.</br></br>
                    Tailored Solutions: We provide customized services to meet your unique needs. </br></br>
                    Collaboration: We establish effective collaboration by ensuring that IntellectFusions analysts achieve comprehensive and accurate data interpretation. This is accomplished by gathering information from both data sources and key stakeholders.</br></br>
                    Quality Assurance: We adhere to rigorous quality control standards. </br></br>
                    Data Security: We maintain strict protocols to ensure data confidentiality and security</br></br>
                   
                </p>
            </div>
        </div>
        
    </div>
</section>

<!-- features section start -->
<div class="features py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title py-4" style="text-align:center;">Our Services</h3>
            </div>
        </div>
        <ul class="features_list d-md-flex flex-wrap row">
            <li class="features_list-item col-md-3" data-order="1" data-aos="fade-up">
                <div class="card">
                    <div class="content">
                        <div class="card_main">
                            <h5 class="card_main-title display-6">⁠Descriptive Analysis </h5>
                            <p class="card_main-text">
                            Summarizing data  </br>
                            Visual data representation </br>
                            Identifying trends </br>

                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="features_list-item col-md-3" data-order="2" data-aos="fade-up">
                <div class="card">
                    <div class="content">
                        <div class="card_main">
                            <h5 class="card_main-title">Inferential Analysis </h5>
                            <p class="card_main-text">
                            Testing hypotheses  </br>
                            Conducting regression analysis </br>
                            Performing ANOVA tests </br>

                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="features_list-item col-md-3" data-order="3" data-aos="fade-up">
                <div class="card">
                    <div class="content">
                        <div class="card_main">
                            <h5 class="card_main-title">Predictive Analysis</h5>
                            <p class="card_main-text">
                                Developing machine learning models </br>
                                Forecasting future trends </br>
                                Building predictive models </br>

                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="features_list-item col-md-3" data-order="3" data-aos="fade-up">
                <div class="card">
                    <div class="content">
                        <div class="card_main">
                            <h5 class="card_main-title">Prescriptive Analysis </h5>
                            <p class="card_main-text">
                                Optimization techniques </br>
                                Decision analysis </br>
                                Simulation models </br>
                            </p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- features section end -->


<!-- popular courses section start -->
<section class="popular py-5">
    <div class="container">
        <div class="popular_header">
            <h2 class="popular_header-title" data-aos="fade-up">How Much Will It Cost?</h2>
            <p class="popular_header-text" data-aos="fade-down">
            The final cost of our data analysis services is determined by several factors, including the number of data sources, the initial quality and structure of the data, the number and complexity of the required reports, and the type of alerting needed. We tailor our pricing to fit the specific needs and scope of each project, ensuring that you receive the most value for your investment.
            </p>
        </div>
       
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