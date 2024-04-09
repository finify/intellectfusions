<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#07030c">
    <meta name="theme-color" content="#07030c">
    <link rel="apple-touch-icon" href="/homeassets/images/metrobotfavicon.png">
    <link rel="icon" href="/homeassets/images/metrobotfavicon.png">
    <title>Login | Metro Bot</title>
    <meta name="author" content="support@metrobot-ai.com">
    <meta name="description" content="MetroBOT LIMITED uses advanced Ai robots trained on extensive trading data and algorithms to analyze market trends and execute profitable trades with high precision.">
    <meta property="og:url" content="">
    <meta property="og:title" content="Login | Metro Bot">
    <meta property="og:description" content="MetroBOT LIMITED uses advanced Ai robots trained on extensive trading data and algorithms to analyze market trends and execute profitable trades with high precision.">
    <meta property="og:image" content="/homeassets/images/metrobotlogo.png">
    <meta name="robots" content="noindex">
    <style>
        .wave {
            width: 5px;
            height: 100px;
            background: linear-gradient(45deg, rgb(168, 85, 247), rgb(249, 115, 22));
            margin: 10px;
            animation: wave 1s linear infinite;
            border-radius: 20px;
        }

        .wave:nth-child(2) {
            animation-delay: 0.1s;
        }

        .wave:nth-child(3) {
            animation-delay: 0.2s;
        }

        .wave:nth-child(4) {
            animation-delay: 0.3s;
        }

        .wave:nth-child(5) {
            animation-delay: 0.4s;
        }

        .wave:nth-child(6) {
            animation-delay: 0.5s;
        }

        .wave:nth-child(7) {
            animation-delay: 0.6s;
        }

        .wave:nth-child(8) {
            animation-delay: 0.7s;
        }

        .wave:nth-child(9) {
            animation-delay: 0.8s;
        }

        .wave:nth-child(10) {
            animation-delay: 0.9s;
        }

        @keyframes wave {
            0% {
                transform: scale(0);
            }

            50% {
                transform: scale(1);
            }

            100% {
                transform: scale(0);
            }
        }
    </style>
    <link rel="stylesheet" href="/homeassets/css/gradient.css">
    <link rel="stylesheet" href="/homeassets/css/main.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

</head>
<body class="ts-gradient-dark w-screen h-screen overflow-y-hidden scrollbar">
    <div class="w-full h-full px-3">
        <div class="flex justify-center w-full h-screen items-center">
            <div class="w-full md:w-3/4 lg:w-2/6 ts-gray-2 py-3 rounded-lg shadow">
                <div class="flex justify-center items-center">
                    <a href="/">
                        <img src="/homeassets/images/metrobotfavicon.png" alt="Logo"
                        class="theme1-card-logo"></a>
                </div>
                <h3 class="text-xl text-center font-bold text-gray-300" id="page-title">
                    Sign Up
                </h3>


                <div class="px-4 lg:px-10 mt-6 space-y-6">
                    <p class="bg-green-500 text-gray-300 p-1 rounded-lg text-xs text-center hidden" id="noticeMsg"></p>
                </div>



                <form action="{{ route('register.perform') }}" method="POST" class="px-4 lg:px-10 mt-6 space-y-6" id="registerForm">
                @csrf
                    <div class="grid grid-cols-1">
                        <div class="relative">
                            <span class="theme1-input-icon material-icons">
                                person
                            </span>
                            <input type="text" id="username" name="username" placeholder="Username" class="theme1-text-input" required value="{{ old('username') }}">
                            <label for="username" class="placeholder-label text-gray-300  ts-gray-2 px-2">Username</label>
                            @if ($errors->has('username'))
                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-1">
                        <div class="relative">
                            <span class="theme1-input-icon material-icons">
                                mail
                            </span>
                            <input type="email" id="email" name="email" placeholder="Email" class="theme1-text-input" required value="{{ old('email') }}">
                            <label for="email" class="placeholder-label text-gray-300  ts-gray-2 px-2">Email</label>
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-1">
                        <div class="relative">

                            <span class="theme1-input-icon material-icons ">
                                lock
                            </span>
                            <input type="password" name="password" placeholder="Password" id="password" class="theme1-text-input"
                                required>
                            <label for="password" class="placeholder-label text-gray-300 ts-gray-2 px-2">Password</label>
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="grid grid-cols-1">
                        <div class="relative">

                            <span class="theme1-input-icon material-icons ">
                                lock
                            </span>
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" id="confirm-password"
                                class="theme1-text-input" required>
                            <label for="confirm-password" class="placeholder-label text-gray-300 ts-gray-2 px-2">Confirm
                                Password</label>
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <input type="hidden" name="referer" value="@if(isset($ref)){{$ref}}@endif">

                    <div class="grid grid-cols-1 mt-3">
                        <button type="submit" id="registerBtn"
                            class="bg-blue-500 text-gray-300 text-xs font-semibold py-2 rounded ">Register</button>
                    </div>

                    <div class="flex justify-between text-gray-300 text-xs font-semibold mt-4 px-5 lg:px-10">
                        <div>
                            <a href="/user/login" class="hover:text-purple-700">Already have account? Login</a>
                        </div>


                    </div>
                </form>


                

                <!-- <form action="https://crypto-bot.org/register-verify" method="POST" class="px-4 lg:px-10 mt-6 space-y-6 hidden"
                    id="verifyForm">
                    <input type="hidden" name="_token" value="GNeawKbvapPRJ7ReK2fE2qYL7WzWm02LsG1tTGQk">
                    <div class="grid grid-cols-1">
                        <div class="relative">

                            <span class="theme1-input-icon material-icons">
                                lock
                            </span>
                            <input type="number" name="otp" placeholder="OTP" id="otp" class="theme1-text-input" required
                                maxlength="6">
                            <label for="otp" class="placeholder-label text-gray-300 ts-gray-2 px-2">OTP</label>
                            <span>
                                                </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 mt-3">
                        <button type="submit" id="verifyBtn"
                            class="bg-blue-500 text-gray-300 text-xs font-semibold py-2 rounded ">Verify</button>
                    </div>

                    <div class="flex justify-between text-gray-300 text-xs font-semibold mt-4 px-5 lg:px-10">
                        <div>
                            <a href="register.html" class="hover:text-purple-700">Go Back</a>
                        </div>


                    </div>
                </form> -->
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script src="/homeassets/scripts/main.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var formData = form.serialize();
                console.log(formData);
                var clicked = $('#loginBtn');

                //disable the submit button
                clicked.addClass('relative disabled');
                clicked.append('<span class="button-spinner"></span>');
                clicked.prop('disabled', true);

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        var verifyText = response.message;
                        var verify = response.verify;
                        $('#noticeMsg').html(verifyText).show();

                        if (verify == 1) {
                            //hide register form and display verification form
                            $('#loginForm').hide();
                            $('#verifyForm').show();

                            //update page title
                            $('#page-title').html('Verify OTP');
                        } else {
                            var url = 'login.html';
                            window.location.href = url;
                        }




                    },
                    error: function(xhr, status, error) {
                        $('#loginBtn').show();
                        var errors = xhr.responseJSON.errors;

                        if (errors) {
                            $.each(errors, function(field, messages) {
                                var fieldErrors = '';
                                $.each(messages, function(index, message) {
                                    fieldErrors += message + '<br>';
                                });


                                Swal.fire({
                                    icon: 'error',
                                    html: fieldErrors,
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter',
                                            Swal.stopTimer);
                                        toast.addEventListener('mouseleave',
                                            Swal.resumeTimer);
                                    }
                                });
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: 'An error occured, please try again later',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer);
                                    toast.addEventListener('mouseleave',
                                        Swal.resumeTimer);
                                }
                            });
                        }


                    },
                    complete: function() {
                        clicked.removeClass('disabled');
                        clicked.find('.button-spinner').remove();
                        clicked.prop('disabled', false);

                    }

                });
            });


            //otp form
            $('#verifyForm').submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var formData = form.serialize();
                var clicked = $('#verifyBtn');

                //disable the submit button
                clicked.addClass('relative disabled');
                clicked.append('<span class="button-spinner"></span>');
                clicked.prop('disabled', true);

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        var verifyText = response.message;
                        $('#noticeMsg').html(verifyText).show();
                        var url = 'login.html';
                        window.location.href = url;

                    },
                    error: function(xhr, status, error) {
                        $('#verifyBtn').show();
                        var errors = xhr.responseJSON.errors;

                        if (errors) {
                            $.each(errors, function(field, messages) {
                                var fieldErrors = '';
                                $.each(messages, function(index, message) {
                                    fieldErrors += message + '<br>';
                                });


                                Swal.fire({
                                    icon: 'error',
                                    html: fieldErrors,
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter',
                                            Swal.stopTimer);
                                        toast.addEventListener('mouseleave',
                                            Swal.resumeTimer);
                                    }
                                });
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: 'An error occured, please try again later',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer);
                                    toast.addEventListener('mouseleave',
                                        Swal.resumeTimer);
                                }
                            });
                        }


                    },
                    complete: function() {
                        clicked.removeClass('disabled');
                        clicked.find('.button-spinner').remove();
                        clicked.prop('disabled', false);

                    }

                });
            });

        });
    </script> -->


    <!-- <script>
        const resendBtn = document.getElementById('resendBtn');
        const loginBtn = document.getElementById('loginBtn');
        let isClickable = true;
        let countdown;

        function startCountdown() {
            if (isClickable) {
                isClickable = false;
                resendBtn.disabled = true;

                let secondsLeft = 120; // 2 minutes
                countdown = setInterval(() => {
                    if (secondsLeft > 0) {
                        const minutes = Math.floor(secondsLeft / 60);
                        const seconds = secondsLeft % 60;
                        const formattedTime = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                        resendBtn.textContent = `Resend Again in ${formattedTime}`;
                        secondsLeft--;
                    } else {
                        resendBtn.textContent = 'Resend OTP';
                        resendBtn.disabled = false;
                        isClickable = true;
                        clearInterval(countdown);
                    }
                }, 1000); // Update every 1 second
            }
        }

        resendBtn.addEventListener('click', () => {
            startCountdown();
            // Define the CSRF token
            var csrfToken = 'GNeawKbvapPRJ7ReK2fE2qYL7WzWm02LsG1tTGQk';

            // Add the CSRF token to the request headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            // Send the AJAX request
            $.ajax({
                url: "https://crypto-bot.org/user/resend-otp",
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    var verifyText = response.message;
                    Swal.fire({
                        icon: 'success',
                        text: verifyText,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter',
                                Swal.stopTimer);
                            toast.addEventListener('mouseleave',
                                Swal.resumeTimer);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.errors;

                    if (errors) {
                        $.each(errors, function(field, messages) {
                            var fieldErrors = '';
                            $.each(messages, function(index, message) {
                                fieldErrors += message + '<br>';
                            });

                            Swal.fire({
                                icon: 'error',
                                html: fieldErrors,
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer);
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer);
                                }
                            });
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: 'An error occurred, please try again later',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer);
                                toast.addEventListener('mouseleave', Swal.resumeTimer);
                            }
                        });
                    }
                }
            });




        });

        loginBtn.addEventListener('click', () => {
            startCountdown();
        });
    </script> -->

    
    <script>
        window.onload = function() {
            $('.preloader').fadeOut(100);
            $('body').remove('h-screen').removeClass('overflow-hidden');
        };
    </script>

    
    <script  async></script>

    

</body>
</html>
