<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/images/favicon.ico">
        <title>Karnataka State Pollution Control board</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background: url("/images/bg-page.jpg") no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #ff7529;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }div.wastemangement {
                 border: 1px solid rgba(255,255,255,.1);
                 width: 10em;
                 height: 10em;
                 transform: rotate(45deg);
                 margin: 2em;
                 float: left;
                 background: linear-gradient(135deg, rgba(255,255,255,0.05) 0%,rgba(0,0,0,0.05) 100%);
             }


            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-left">
                    <img src="images/logo.png" width="150px" height="auto" alt="kspcb">
                </div>
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{--Laravel--}}
                </div>
                {{--<button onclick="myFunction()">Try it</button>--}}
                <div class="links">
                    {{--<a href="https://laravel.com/docs">Docs</a>--}}
                    {{--<a href="https://laracasts.com">Laracasts</a>--}}
                    {{--<a href="https://laravel-news.com">News</a>--}}
                    {{--<a href="https://blog.laravel.com">Blog</a>--}}
                    {{--<a href="https://nova.laravel.com">Nova</a>--}}
                    {{--<a href="https://forge.laravel.com">Forge</a>--}}
                    {{--<a href="https://vapor.laravel.com">Vapor</a>--}}
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                </div>
            </div>
        </div>
        <footer class="footer" style="position: fixed;">
            &copy; All rights reserved
        </footer>
    </body>
    <script src='{{ URL::to('/') }}/js/widget.js'></script>
    <script src='{{ URL::to('/') }}/css/chat.min.css'></script>
    <script>

        var botmanWidget = {

            aboutText: 'Waste Mangement',

            introMessage: '<img height="70px" src="/images/robot/hirobot.png" id="image" width="auto"><br> Hi! I\'m WM <br>How can i help you'

        };
        function myFunction() {
            var iframe = document.getElementById("chatBotManFrame");
            var elmnt =iframe.contentWindow.document.getElementsByTagName("BODY")[0];
            iframe.contentWindow.document.getElementsByTagName("HTML")[0].firstElementChild.innerHTML="<head><link rel='stylesheet' type='text/css' href='/css/chat.min.css'></head>";
            elmnt.style.backgroundImage= 'none';
            elmnt.style.background="linear-gradient(135deg, #708090 21px, #d9ecff 22px, #d9ecff 24px, transparent 24px, transparent 67px, #d9ecff 67px, #d9ecff 69px, transparent 69px),linear-gradient(225deg, #708090 21px, #d9ecff 22px, #d9ecff 24px, transparent 24px, transparent 67px, #d9ecff 67px, #d9ecff 69px, transparent 69px)0 64px";
            elmnt.style.backgroundSize= "64px 128px";
            elmnt.style.backgroundColor="#708090";
        }
    </script>




</html>
