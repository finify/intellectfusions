<footer class="footer">
    <div class="container">
        <div class="footer_wrapper d-sm-flex flex-wrap flex-lg-nowrap justify-content-lg-between">
            <div class="footer_block col-sm-6 col-lg-auto" data-order="1">
                <div class="logo logo--footer">
                    <a class="d-inline-flex align-items-center" href="/">
                        <img src="/homeassets/img/intellectfusionlogo.png" alt="Intellectfusions" />
                    </a>
                </div>
                <!-- <p class="footer_block-text">
                    Curabitur non libero at lorem finibus lobortis. Ut auctor egestas pretium. Proin nunc ligula, venenatis tempor
                </p> -->
                <ul class="footer_block-socials d-flex align-items-center">
                    <li class="footer_block-socials_item">
                        <a class="link" href="https://www.facebook.com/profile.php?id=61560912353046&mibextid=ZbWKwL" target="_blank" rel="noopener noreferrer">
                            <i class="icon-facebook"></i>
                        </a>
                    </li>
                    <li class="footer_block-socials_item">
                        <a class="link" href="https://x.com/IntellectFusion?t=OnlcPx6OrLWlYOmDg1Cj5Q&s=09" target="_blank" rel="noopener noreferrer">
                            <i class="icon-twitter"></i>
                        </a>
                    </li>
                    <!-- <li class="footer_block-socials_item">
                        <a class="link" href="https://www.instagram.com" target="_blank" rel="noopener noreferrer">
                            <i class="icon-instagram"></i>
                        </a>
                    </li> -->
                </ul>
                <div class="wrapper d-flex flex-column">
                    <a class="link link--contacts text text--sm d-inline-flex align-items-center" href="mailto:example@domain.com">
                        <i class="icon-envelope icon"></i>
                        info@intellectfusions.com
                    </a>
                    <a class="link link--contacts text text--sm d-inline-flex align-items-center" href="tel:+447440348801">
                        <i class="icon-phone-solid icon"></i>
                        +447440348801
                    </a>
                </div>
            </div>
            <div class="footer_block col-sm-6 col-lg-auto" data-order="2">
                <h5 class="footer_block-header">Information:</h5>
                <ul class="footer_block-nav">
                    <li class="footer_block-nav_item">
                        <a class="link" href="/about">About</a>
                    </li>
                    <li class="footer_block-nav_item">
                        <a class="link" href="/contact">Contact Us</a>
                    </li>
                    <li class="footer_block-nav_item">
                        <a class="link" href="/terms">Terms and condition</a>
                    </li>
                    <li class="footer_block-nav_item">
                        <a class="link" href="/refund">Refund Policy</a>
                    </li>
                    
                </ul>
            </div>
            <div class="footer_block col-sm-6 col-lg-auto m-sm-0" data-order="3">
                <h5 class="footer_block-header">Popular Services:</h5>
                <ul class="footer_block-list">
                    @forelse ($projecttypes as $projecttype)
                        <li class="footer_block-list_item d-flex align-items-baseline mb-1">
                            <span class="marker"></span>
                            <a class="link" href="#">{{ $projecttype['type_name']}}</a>
                        </li>
                    @empty
                        <div class="alert alert-danger" role="alert">No project type</div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <div class="footer_secondary">
        <div class="container d-flex flex-column flex-sm-row align-items-center justify-content-sm-between">
            <a class="footer_secondary-scroll" id="scrollToTop" href="#">
                <i class="icon-angle-up icon"></i>
            </a>
            <p class="footer_secondary-copyright">Copyright @ <span id="currentYear"></span> Intellectfusions by Finifytech</p>
        </div>
    </div>
</footer>