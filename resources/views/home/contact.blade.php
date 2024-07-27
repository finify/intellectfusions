@extends('home.layout.layout')

@section('header')
<link rel="stylesheet" href="/homeassets/css/contacts.min.css" />
@endsection

@section('content')
<header class="page">
    <div class="page_breadcrumbs">
        <div class="container">
            <ul class="page_breadcrumbs-list d-flex flex-wrap align-items-center">
                <li class="list-item">
                    <a href="/" class="link">Home</a>
                </li>

                <li class="list-item">Contact Us</li>
            </ul>
        </div>
    </div>
    <div class="page_main">
        <div class="underlay"></div>
        <div class="container">
            <div class="content-wrapper">
                <h1 class="page_main-header">Contact Us</h1>
                <p class="page_main-text">
                we value open communication and are here to assist you with any questions, concerns, or feedback you may have. Whether you need support, want to learn more about our services, or have a specific inquiry, our dedicated team is ready to help. Reach out to us through any of the following channels, and we will get back to you as soon as possible:
                </p>
            </div>

            <ul class="page_main-list d-sm-flex flex-wrap justify-content-center">
                <!-- <li class="page_main-list_item" data-aos="fade-up">
                    <div class="wrapper">
                        <div class="content d-flex justify-content-sm-center">
                            <i class="icon-map-marker-alt-solid icon"></i>
                            <div class="block">
                                <span class="content_text text">61 Wood Ave. Holly Springs, NC 27540</span>
                            </div>
                        </div>
                    </div>
                </li> -->
                <li class="page_main-list_item" data-aos="fade-up" data-aos-delay="50">
                    <div class="wrapper">
                        <div class="content d-flex justify-content-sm-center">
                            <i class="icon-phone-solid icon"></i>
                            <div class="block d-flex flex-column">
                                <p>Whatsapp</p>
                                <a class="content_link text" href="tel:+447510189494">+447440348801</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="page_main-list_item" data-aos="fade-up" data-aos-delay="100">
                    <div class="wrapper">
                        <div class="content d-flex justify-content-sm-center">
                            <i class="icon-envelope icon"></i>
                            <div class="block d-flex flex-column">
                                <a class="content_link text" href="mailto:example@domain.com">info@intellectfusions.com</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>

<section class="contacts_form">
    <div class="container">
        <div class="contacts_form-header">
            <center><h2 class="contacts_form-header_title">Our experts will help you</h2> </center>

            <p class="contacts_form-header_text text">
                If you have questions about the format or do not know what to choose, leave your request: we will be happy to
                answer all your questions.
            </p>
        </div>
        <form class="contacts_form-form" action="" method="post" data-type="contacts">
            <div class="contacts_form-form_wrapper d-sm-flex justify-content-between">
                <input class="field required" type="text" data-type="email" placeholder="Email" id="contactsEmail" />
                <input class="field required" type="text" placeholder="Name" id="contactsName" />
            </div>
            <div class="contacts_form-form_wrapper d-sm-flex justify-content-between">
                <input class="field required" type="text" data-type="tel" placeholder="Phone number" id="contactsTel" />
                <input class="field required" type="text" placeholder="Subject" id="contactsSubject" />
            </div>
            <textarea
                class="field required"
                placeholder="Your message here"
                data-type="message"
                id="contactsMessage"
            ></textarea>
            <div class="contacts_form-form_footer">
                <div class="wrapper d-flex flex-wrap align-items-center justify-content-center">
                    <div class="checkbox">
                        <input type="checkbox" name="dataProcessing" id="dataProcessing" checked />
                        <label for="dataProcessing">
                            <i class="icon-check icon"></i>
                            I agree to the terms of data processing.
                        </label>
                    </div>
                    <a class="link" href="#">Terms and Conditions</a>
                </div>
                <button class="btn btn--gradient" type="submit">
                    <span class="text">Send a Message</span>
                </button>
            </div>
        </form>
    </div>
</section>
@endsection