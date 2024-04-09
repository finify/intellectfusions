@extends('home.layout.layout')

@section('content')
<section class="w-full relative">
    <div class="h-12"></div>
    <div class="w-full flex flex-start items-center space-x-2 px-5 md:px-20 py-5 ts-gray-3">
        <div class="flex items-center justify-start space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4" viewBox="0 0 16 16">
                <path
                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
            </svg>
            <a href="/">Home</a>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-3 h-3" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
            <path fill-rule="evenodd"
                d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
        </svg>
        <p class="text-gray-500">Terms of Service</p>
        
    </div>
    <div class="w-full ts-gray-2 text-center">
        <div class="h-10"></div>
        <div class="w-full px-5 md:px-20 py-5 flex justify-center items-center">
            <div class="w-full md:w-3/4">
                <div class="w-full">
                    <h1 class="text-6xl font-rescron-bold">Terms of Service</h1>
                    <p class="text-gray-500 text-2xl rescron-font-italics mt-5">Prior to availing any of our services, we kindly request that you review and acknowledge our Acceptable Use Terms of Service. Your utilization of our services constitutes your agreement to abide by the terms and conditions outlined therein. We appreciate your understanding and compliance.</p>
                </div>

                
            </div>

        </div>
        <div class="h-44"></div>
        
    </div>
    <div class="w-full -mt-12 md:-mt-32">
        <div class="w-full flex justify-center ">
            <div class="w-3/4 ">
                <img class="rounded-lg" src="assets/images/breadcrumb.png" alt="">
            </div>
        </div>
    </div>

    <div class="h-24"></div>
    
</section>

<section class="w-full px-5 md:px-20 py-10 mt-10">
    <div class="w-full  flex justify-center">
        <div class="w-full flex items-center justify-center text-gray-500">
            <div class="w-full lg:w-3/4 grid grid-cols-1 gap-5 mt-10">
                <h2 class="text-2xl rescron-font-bold">Acceptance of Terms</h2>
                <p>
                    Welcome to Metro Bot! By accessing or using our services, including but not limited to our
                    website,
                    trading platform, and any associated software or applications (collectively referred to as the
                    "Services"), you agree to be bound by these Terms of Service ("Terms"). If you do not agree to these
                    Terms, please do not use our Services.
                </p>


                <h2 class="text-2xl rescron-font-bold">Description of Services</h2>
                <p>
                    Metro Bot provides a trading platform that utilizes advanced AI technology to analyze market trends
                    and execute trades. Our Services are designed to facilitate trading activities, and we do not
                    provide financial advice. You are solely responsible for your trading decisions.
                </p>

                <h2 class="text-2xl rescron-font-bold">Eligibility</h2>
                <p>
                    You must be at least 18 years old and have the legal capacity to enter into this agreement to use
                    our Services. By using our Services, you represent and warrant that you meet these eligibility
                    criteria.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Registration and Account Security</h2>
                <p>
                    To access certain features of our Services, you may need to register for an account. You agree to
                    provide accurate, current, and complete information during the registration process and to keep your
                    account information updated. You are responsible for maintaining the confidentiality of your account
                    credentials and for all activities that occur under your account. You must immediately notify us of
                    any unauthorized use of your account.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Privacy Policy</h2>
                <p>
                    Your use of our Services is also governed by our Privacy Policy. Please review our Privacy Policy to
                    understand how we collect, use, and protect your personal information.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Prohibited Activities</h2>
                <div>
                    <p>You agree not to engage in any of the following prohibited activities while using our Services:
                    </p>
                    <p class="text-xs">
                        <i class="bi bi-dot"></i>Violating any applicable laws or regulations. <br>
                        <i class="bi bi-dot"></i>Impersonating any person or entity or providing false information. <br>
                        <i class="bi bi-dot"></i>Attempting to gain unauthorized access to our Services or computer
                        systems. <br>
                        <i class="bi bi-dot"></i>Interfering with the proper functioning of our Services. <br>
                        <i class="bi bi-dot"></i>Engaging in any activity that could harm, disable, or overburden our
                        infrastructure. <br>
                    </p>
                </div>

                <h2 class="text-2xl rescron-font-bold"> Termination of Services</h2>
                <p>
                    We reserve the right to terminate or suspend your access to our Services at our discretion, without
                    notice, for any reason, including if we believe you have violated these Terms. You may also
                    terminate your account at any time by discontinuing use of our Services.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Disclaimer of Warranties</h2>
                <p>
                    Our Services are provided "as is" and "as available" without warranties of any kind, either express
                    or implied. We do not guarantee the accuracy, reliability, or availability of our Services or the
                    results obtained through their use. You use our Services at your own risk.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Limitation of Liability</h2>
                <p>
                    To the fullest extent permitted by applicable law, Metro Bot and its affiliates, officers,
                    directors, employees, and agents shall not be liable for any indirect, incidental, special,
                    consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or
                    indirectly, or any loss of data, use, goodwill, or other intangible losses, resulting from (a) your
                    use or inability to use our Services, (b) any unauthorized access to or use of our servers and/or
                    any personal information stored therein, (c) any interruption or cessation of our Services, (d) any
                    bugs, viruses, or other harmful code that may be transmitted to or through our Services, or (e) any
                    errors, inaccuracies, omissions, or any other aspect of our Services.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Intellectual Property</h2>
                <p>
                    All content included in or made available through our Services, including text, graphics, logos,
                    button icons, images, audio clips, digital downloads, and data compilations, is the property of
                    Metro Bot or its content suppliers and is protected by United States and international copyright
                    laws.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Changes to Terms</h2>
                <p>
                    We reserve the right to modify or revise these Terms at any time. The most current version of these
                    Terms will be posted on our website. Your continued use of our Services following the posting of any
                    changes constitutes your acceptance of those changes.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Governing Law</h2>
                <p>
                    These Terms are governed by and construed in accordance with the laws of the State of
                    England, without regard to its conflict of law principles.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Contact Information</h2>
                <p>
                    If you have any questions about these Terms or our Services, please contact us at
                    support@Metrobot.com.
                </p>

                <h2 class="text-2xl rescron-font-bold"> User Responsibilities</h2>
                <p>
                    As a user of Metro Bot's Services, you agree to: <br>
                    <span class="text-xs">
                        <i class="bi bi-dot"></i>Comply with all applicable laws and regulations related to trading and
                        financial transactions. <br>
                        <i class="bi bi-dot"></i>Keep your account information, including passwords, secure and
                        confidential. <br>
                        <i class="bi bi-dot"></i>Use our Services only for lawful purposes. <br>
                        <i class="bi bi-dot"></i>Refrain from attempting to disrupt or interfere with the proper
                        functioning of our Services. <br>
                        <i class="bi bi-dot"></i>Report any security breaches or unauthorized access to our Services
                        promptly. <br>
                    </span>
                </p>

                <h2 class="text-2xl rescron-font-bold"> Account Suspension and Termination</h2>
                <p>
                    Metro Bot reserves the right to suspend or terminate user accounts for violations of these Terms or
                    for any other reason, at its sole discretion.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Third-Party Links and Services</h2>
                <p>
                    Our Services may contain links to third-party websites or services. Metro Bot does not endorse or
                    control these third-party websites or services and is not responsible for their content or
                    practices. Use of third-party websites or services is at your own risk.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Indemnification</h2>
                <p>
                    You agree to indemnify and hold Metro Bot, its affiliates, officers, directors, employees, and
                    agents harmless from any claims, losses, damages, liabilities, and expenses (including attorney's
                    fees) arising from or related to your use of our Services or violation of these Terms.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Dispute Resolution</h2>
                <p>
                    Any disputes arising from or relating to these Terms or your use of our Services shall be resolved
                    through arbitration in accordance with the rules of the England Arbitration
                    Association. The arbitration shall take place in , , and the
                    decision of the arbitrator shall be final and binding.
                </p>


                <h2 class="text-2xl rescron-font-bold"> Entire Agreement</h2>
                <p>
                    These Terms constitute the entire agreement between you and Metro Bot with respect to the subject
                    matter hereof and supersedes all prior or contemporaneous communications and proposals, whether oral
                    or written, between the parties.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Assignment</h2>
                <p>
                    You may not assign or transfer these Terms, in whole or in part, without the prior written consent
                    of Metro Bot. Metro Bot may freely assign these Terms without restriction.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Waiver and Severability</h2>
                <p>
                    The failure of Metro Bot to enforce any right or provision of these Terms shall not constitute a
                    waiver of such right or provision. If any provision of these Terms is found by a court of competent
                    jurisdiction to be invalid, the parties nevertheless agree that the court should endeavor to give
                    effect to the parties' intentions as reflected in the provision, and the other provisions of these
                    Terms remain in full force and effect.
                </p>

                <h2 class="text-2xl rescron-font-bold"> No Third-Party Beneficiaries</h2> 
                <p>
                    These Terms do not create any third-party beneficiary rights.
                </p>

                <h2 class="text-2xl rescron-font-bold"> Contact Us</h2>
                <p>
                    If you have any questions or concerns about these Terms, please contact us at support@metrobot.com.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection