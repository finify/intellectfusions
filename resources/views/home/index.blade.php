@extends('home.layout.layout')

@section('header')
<link rel="stylesheet" href="/homeassets/css/index.min.css" />
@endsection

@section('content')
 <!-- hero section start -->
 <div class="underlay"></div>
<section class="hero">
    <div class="container d-lg-flex align-items-center">
        <div class="hero_content">
            <h3 class="hero_content-header" data-aos="fade-up">Homework Assistance Excellence for Everyone</h3>
            <div class="hero_content-rating d-flex flex-column flex-sm-row align-items-center">
                <p class="text" data-aos="fade-left">Hundreds of students trust us </p>
                <div class="wrapper" data-aos="fade-left" data-aos-delay="50">
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
            <p class="hero_content-text" data-aos="fade-up" data-aos-delay="50">
            Receive tailored expert support across a spectrum of academic disciplines. We cover over 100 courses and programs to cater to your needs.
            </p>
            
        </div>
        <div class="hero_media col-lg-6">
            <lottie-player
                src="/homeassets/lottie/hero.json"
                background="transparent"
                speed="1"
                style="width: 100%; height: 100%"
                loop
                autoplay
            ></lottie-player>
        </div>
    </div>
</section>
<!-- hero section end -->
<!-- features section start -->
<div class="features">
    <div class="container">
        <ul class="features_list d-md-flex flex-wrap">
            <li class="features_list-item col-md-4" data-order="1" data-aos="fade-up">
                <div class="card">
                    <div class="content">
                        <div class="card_media">
                            <i class="icon-user-graduate-solid icon"></i>
                        </div>
                        <div class="card_main">
                            <h5 class="card_main-title">Huge Community of Experts</h5>
                            <p class="card_main-text">
                                We bring together verified college professors, practicing scientist.
                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="features_list-item col-md-4" data-order="2" data-aos="fade-up">
                <div class="card">
                    <div class="content">
                        <div class="card_media">
                            <i class="icon-gem-solid icon"></i>
                        </div>
                        <div class="card_main">
                            <h5 class="card_main-title">Affordable Prices</h5>
                            <p class="card_main-text">
                                We use high-tech solutions such as AI-based tools to cover various parts of the process of each project. 
                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="features_list-item col-md-4" data-order="3" data-aos="fade-up">
                <div class="card">
                    <div class="content">
                        <div class="card_media">
                            <i class="icon-headset-solid icon"></i>
                        </div>
                        <div class="card_main">
                            <h5 class="card_main-title">24/7 Support</h5>
                            <p class="card_main-text">
                            Our support team is here for you 24/7 to answer any questions and resolve any issues you might have
                            </p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- features section end -->
<!-- promo section start -->
<section class="promo">
    <div class="container d-flex flex-column-reverse flex-lg-row justify-content-lg-end">
        <div class="promo_media">
            <lottie-player
                src="/homeassets/lottie/scene.json"
                background="transparent"
                speed="1"
                style="width: 100%; height: 100%"
                loop
                autoplay
            ></lottie-player>
        </div>
        <div class="promo_content">
            <h2 class="promo_content-header" data-aos="fade-left">We Have Data Scientics Available</h2>
            <p class="promo_content-text" data-aos="fade-up" data-aos-delay="50">
            Unlock the power of data with our cutting-edge solutions and expertise. Whether you're a seasoned data scientist or just starting your journey, we've got you covered. Our team of experienced professionals offers a wide range of services, from data analysis and visualization to machine learning and predictive modeling.
            </p>
            <a class="promo_content-btn btn btn--gradient" href="#" data-aos="fade-up" data-aos-delay="100">
                <span class="text">Talk to an Expert</span>
            </a>
        </div>
    </div>
</section>
<!-- promo section end -->
<!-- about section start -->
<section class="about">
    <div class="container">
        <div class="about_deco">
            <lottie-player
                src="/homeassets/lottie/wave.json"
                background="transparent"
                speed="1"
                style="width: 100%; height: 100%"
                loop
                autoplay
            ></lottie-player>
        </div>
        <div class="about_main">
            <div class="content">
                <h2 class="about_main-header" data-aos="fade-in">How does it work?</h2>
                <ul class="about_main-list">
                    <li class="about_main-list_item" data-aos="fade-up">
                        <i class="icon-check icon"></i>
                        <div class="content">
                            <h5 class="title">Fill in a brief</h5>
                            <p class="text">Tell us what you need help with, describe your project requirements, and set the deadline.</p>
                        </div>
                    </li>
                    <li class="about_main-list_item" data-aos="fade-up" data-aos-delay="50">
                        <i class="icon-check icon"></i>
                        <div class="content">
                            <h5 class="title">We provide you with expert</h5>
                            <p class="text">Receive offers from those who can help with assignments, compare their ratings, and pick the best one for your task.</p>
                        </div>
                    </li>
                    <li class="about_main-list_item" data-aos="fade-up" data-aos-delay="100">
                        <i class="icon-check icon"></i>
                        <div class="content">
                            <h5 class="title">
                                Get it done on time
                            </h5>
                            <p class="text">Chat with our expert directly, discuss your project in detail, and get professional academic assistance by the deadline.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="about_review" data-aos="zoom-in">
            <div class="about_review-wrapper">
                <div class="media">
                    <picture>
                        <source data-srcset="/homeassets/img/placeholder.jpg" srcset="/homeassets/img/placeholder.jpg" />
                        <img class="lazy" data-src="/homeassets/img/placeholder.jpg" src="/homeassets/img/placeholder.jpg" alt="media" />
                    </picture>
                </div>
                <div class="main">
                    <h5 class="main_name">Diana Gloster</h5>
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
                    <q class="main_review quote">
                        “Mauris tellus lorem, tempus sed nibh at, varius convallis mi. sed scelerisque odio neque a lacus. Ut
                        consectetur ligula. ed rhoncus sapien eget feugiat.”
                    </q>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about section end -->
<!-- popular courses section start -->
<section class="popular">
    <div class="container">
        <div class="popular_header">
            <h2 class="popular_header-title" data-aos="fade-up">Popular Services</h2>
            <p class="popular_header-text" data-aos="fade-down">
                Sed a eros sodales diam sagittis faucibus. Cras id erat nisl. Fusce faucibus nulla sed finibus egestas.
                Vestibulum purus magna.
            </p>
        </div>
        <ul class="popular_tags courses-tags d-flex flex-wrap align-items-center justify-content-center">
            <li class="list-item" data-aos="fade-left">
                <a class="tag" href="#">programming</a>
            </li>
            <li class="list-item" data-aos="fade-left" data-aos-delay="50">
                <a class="tag" href="#">management</a>
            </li>
            <li class="list-item" data-aos="fade-left" data-aos-delay="100">
                <a class="tag" href="#">art</a>
            </li>
            <li class="list-item" data-aos="fade-left" data-aos-delay="150">
                <a class="tag" href="#">digital marketing</a>
            </li>
            <li class="list-item" data-aos="fade-left" data-aos-delay="200">
                <a class="tag" href="#">game development</a>
            </li>
            <li class="list-item" data-aos="fade-left" data-aos-delay="250">
                <a class="tag" href="#">smm</a>
            </li>
        </ul>
       
    </div>
</section>
<!-- popular courses section end -->
<!-- banner section start -->
<div class="banner">
    <div class="underlay"></div>
    <div class="container d-lg-flex align-items-center">
        <div class="banner_content">
            <h4 class="banner_content-title" data-aos="fade-up">
                Unlimited access to educational materials and lectures for subscribers
            </h4>
            <div class="wrapper" data-aos="fade-up" data-aos-delay="50">
                <a class="banner_content-btn btn btn--yellow" href="pricing.html">See pricing plans</a>
            </div>
        </div>
        <div class="banner_media">
            <picture>
                <source data-srcset="/homeassets/img/action.webp" srcset="/homeassets/img/action.webp" />
                <img class="lazy" data-src="/homeassets/img/action.webp" src="/homeassets/img/action.webp" alt="media" />
            </picture>
        </div>
    </div>
</div>
<!-- banner section end -->

 
@endsection