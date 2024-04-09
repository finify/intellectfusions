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
        <p class="text-gray-500">FAQ</p>
        
    </div>
    <div class="w-full ts-gray-2 text-center">
        <div class="h-10"></div>
        <div class="w-full px-5 md:px-20 py-5 flex justify-center items-center">
            <div class="w-full md:w-3/4">
                <div class="w-full">
                    <h1 class="text-6xl font-rescron-bold">FAQ</h1>
                    <p class="text-gray-500 text-2xl rescron-font-italics mt-5">Below are some frequently asked questions from our users</p>
                </div>

                
            </div>

        </div>
        <div class="h-44"></div>
        
    </div>
    <div class="w-full -mt-12 md:-mt-32">
        <div class="w-full flex justify-center ">
            <div class="w-3/4 ">
                <img class="rounded-lg" src="/homeassets//images/breadcrumb.png" alt="">
            </div>
        </div>
    </div>

    <div class="h-24"></div>
    
</section>

<section class="w-full px-5 md:px-20 py-10 mt-10">
    <div class="w-full  flex justify-center">
        <div class="w-full flex items-center justify-center text-gray-500">
            <div class="w-full lg:w-3/4 grid grid-cols-1 gap-5 mt-10">
                                        <div class="w-full ts-gray-3 p-3 rounded-lg">
                        <h3 class="w-full text-2xl rescron-font-bold">
                            What is Metro Bot?
                        </h3>
                        <p class="w-full">
                            Metro Bot is an advanced trading platform that utilizes AI technology to analyze market trends and execute trades with high precision.
                        </p>
                    </div>
                                        <div class="w-full ts-gray-3 p-3 rounded-lg">
                        <h3 class="w-full text-2xl rescron-font-bold">
                            How can I get started with Metro Bot?
                        </h3>
                        <p class="w-full">
                            Getting started is simple. Sign up for an account, complete the verification process, and you can begin trading.
                        </p>
                    </div>
                                        <div class="w-full ts-gray-3 p-3 rounded-lg">
                        <h3 class="w-full text-2xl rescron-font-bold">
                            Is my personal information secure with Metro Bot?
                        </h3>
                        <p class="w-full">
                            Yes, we take data security seriously. We employ industry-standard measures to protect your information.
                        </p>
                    </div>
                                        <div class="w-full ts-gray-3 p-3 rounded-lg">
                        <h3 class="w-full text-2xl rescron-font-bold">
                            Can I trade on Metro Botfrom anywhere?
                        </h3>
                        <p class="w-full">
                            Absolutely Metro Botallows you to trade from anywhere with an internet connection.
                        </p>
                    </div>
                                        <div class="w-full ts-gray-3 p-3 rounded-lg">
                        <h3 class="w-full text-2xl rescron-font-bold">
                            Do I need prior trading experience to use Metro Bot?
                        </h3>
                        <p class="w-full">
                            No, Metro Botis designed for both beginners and experienced traders. We offer educational resources to help you get started.
                        </p>
                    </div>
                                        <div class="w-full ts-gray-3 p-3 rounded-lg">
                        <h3 class="w-full text-2xl rescron-font-bold">
                            What fees are associated with using Metro Bot?
                        </h3>
                        <p class="w-full">
                            We charge competitive fees, which are transparently displayed on our platform. There are no hidden charges.
                        </p>
                    </div>
                                        <div class="w-full ts-gray-3 p-3 rounded-lg">
                        <h3 class="w-full text-2xl rescron-font-bold">
                            Can I withdraw my profits easily?
                        </h3>
                        <p class="w-full">
                            Yes, withdrawing your profits is straightforward. You can initiate withdrawals through your account.
                        </p>
                    </div>
                                        <div class="w-full ts-gray-3 p-3 rounded-lg">
                        <h3 class="w-full text-2xl rescron-font-bold">
                            Is customer support available?
                        </h3>
                        <p class="w-full">
                            Absolutely. Our customer support team is here to assist you with any questions or issues you may have.
                        </p>
                    </div>
                                        <div class="w-full ts-gray-3 p-3 rounded-lg">
                        <h3 class="w-full text-2xl rescron-font-bold">
                            How often are trading signals generated?
                        </h3>
                        <p class="w-full">
                            Metro Bot generates trading signals continuously, ensuring you have access to up-to-date market information.
                        </p>
                    </div>
                                </div>


        </div>
    </div>
</section>
@endsection