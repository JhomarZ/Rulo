<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Comercio Planeta</title>
    <!-- STYLES -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/icon-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- Other libraries -->
    <link rel="stylesheet" href="{{asset('css/venobox.css')}}" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}"/>
  </head>
  <body>
    @include('master.nav')
      @yield('content')
      <div class="chatFlotante " style="display:none">
          <div id="frame">
            <div class="content  p-0">
              <div class="contact-profile">
                <span class="contact-status online"></span>
                <p>Jesús Huerta</p>
                <a class="crossChat" href="#"><i class="fa fa-times"></i></a>
              </div>
              <div class="product-detail">
                <!-- <img class="hiddenxs"src="img/iconchat.png" alt="" /> -->
                <span>Auto Mazda cX-5</span>
                <!-- <p>S/. 123,000.00</p> -->
              </div>
              <div class="messages">
                <ul>
                  <li class="sent">
                    <img class="hiddenxs"src="img/iconchat.png" alt="" />
                    <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                  </li>
                  <li class="replies">
                    <p>When you're backed against the wall, break the god damn thing down.</p>
                  </li>
                  <li class="replies">
                    <p>Excuses don't win championships.</p>
                  </li>
                  <li class="sent">
                    <img class="hiddenxs" src="img/iconchat.png" alt="" />
                    <p>Oh yeah, did Michael Jordan tell you that?</p>
                  </li>
                  <li class="replies">
                    <p>No, I told him that.</p>
                  </li>
                  <li class="replies">
                    <p>What are your choices when someone puts a gun to your head?</p>
                  </li>
                  <li class="sent">
                    <img class="hiddenxs" src="img/iconchat.png" alt="" />
                    <p>What are you talking about? You do what they say or they shoot you.</p>
                  </li>
                  <li class="replies">
                    <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                  </li>
                </ul>
              </div>
              <div class="message-input">
                <div class="wrap">
                <input type="text" placeholder="Escribe tu mensaje..." />
                <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
      </div>
     @include('master.footer')
