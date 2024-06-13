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
        <div class="wrapper" data-aos="fade-up" data-aos-delay="50">
            <center>  <button class="banner_content-btn btn btn--yellow" id="openChatButton">Talk to an expert</button></center>
           

        </div>
    </div>
</section>
@endsection

@section('footer')
<script>
document.getElementById('openChatButton').addEventListener('click', function() {
        if (typeof Tawk_API !== 'undefined') {
            Tawk_API.maximize();
        } else {
            alert('Chat widget is not loaded yet. Please try again later.');
        }
    });
</script>
@endsection