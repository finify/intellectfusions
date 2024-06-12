<div class="promobar d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <ul class="promobar_socials d-flex align-items-center">
            <!-- <li class="promobar_socials-item">
                <a class="link" href="#" target="_blank" rel="noopener noreferrer">
                    <i class="icon-facebook"></i>
                </a>
            </li> -->
            <!-- <li class="promobar_socials-item">
                <a class="link" href="https://x.com/IntellectFusion?t=OnlcPx6OrLWlYOmDg1Cj5Q&s=09" target="_blank" rel="noopener noreferrer">
                    <i class="icon-twitter"></i>
                </a>
            </li> -->
            <!-- <li class="promobar_socials-item">
                <a class="link" href="#" target="_blank" rel="noopener noreferrer">
                    <i class="icon-instagram"></i>
                </a>
            </li> -->
        </ul>
        <div class="promobar_main d-flex align-items-center">
            <!-- <p class="promobar_main-text">Try for free! <span class="hide">30 day Trial and Free Lectures</span></p> -->
            <a class="btn btn--yellow mr-2" href="/user/login" style="background: linear-gradient(180deg, #6a11cb 1.26%, #2575fc 100%); margin-right:10px; color:white;">
                <span>Login</span>
            </a>
            <a class="btn btn--yellow" href="/user/register">
                <span>Sign Up</span>
            </a>
        </div>
    </div>
</div>
<header class="header" data-page="home">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
        <div class="logo header_logo">
            <a class="d-inline-flex align-items-center" href="/">
                <span class="logo_picture">
                    <img src="/homeassets/img/intellectfusionlogo.png" width="200px" style="width:200px!important;" alt="Edison" />
                </span>
                
            </a>
        </div>
        <button
            class="header_trigger"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#headerMenu"
            aria-controls="headerMenu"
        >
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </button>
        <nav class="header_nav collapse" id="headerMenu">
            <ul class="header_nav-list">
                <li class="header_nav-list_item">
                    <a @if (Request::path()=='/' ) class="nav-item current" @else class="nav-item"  @endif href="/" data-page="home">Home</a>
                </li>
                <!-- <li class="header_nav-list_item dropdown">
                    <a
                        class="nav-link nav-item dropdown-toggle d-inline-flex align-items-center"
                        href="#"
                        data-bs-toggle="collapse"
                        data-bs-target="#coursesMenu"
                        data-trigger="dropdown"
                        aria-expanded="false"
                        aria-controls="coursesMenu"
                        data-page="courses"
                    >
                        Services
                        <i class="icon-angle-down icon"></i>
                    </a>
                    <div class="dropdown-menu collapse" id="coursesMenu">
                        <ul class="dropdown-list">
                            <li class="list-item" data-main="true">
                                <a class="dropdown-item nav-item" data-page="services" href="#" data-main="true">
                                    Services
                                </a>
                            </li>
                            <li class="list-item">
                                <a class="dropdown-item nav-item" data-page="course" href="">Essay</a>
                            </li>
                            <li class="list-item">
                                <a class="dropdown-item nav-item" data-page="course" href="">Admissions Essay</a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <li class="header_nav-list_item">
                    <a @if (Request::path()=='about' ) class="nav-item current" @else class="nav-item" @endif  href="/about" data-page="about">About Us</a>
                </li>
                <li class="header_nav-list_item">
                    <a @if (Request::path()=='contact' ) class="nav-item current" @else class="nav-item" @endif  href="/contact" data-page="pricing">Contact Us</a>
                </li>
                <li class="header_nav-list_item">
                    <a @if (Request::path()=='plagiarism' ) class="nav-item current" @else class="nav-item" @endif  href="/plagiarism" data-page="pricing">Plagiarism</a>
                </li>
            </ul>
            <ul class="promobar_socials d-flex align-items-center justify-content-center">
                <li class="promobar_socials-item">
                    <a class="link" href="#" target="_blank" rel="noopener noreferrer">
                        <i class="icon-facebook"></i>
                    </a>
                </li>
                <li class="promobar_socials-item">
                    <a class="link" href="#" target="_blank" rel="noopener noreferrer">
                        <i class="icon-twitter"></i>
                    </a>
                </li>
                <li class="promobar_socials-item">
                    <a class="link" href="#" target="_blank" rel="noopener noreferrer">
                        <i class="icon-instagram"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>


