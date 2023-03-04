<!DOCTYPE html>
<html>
    <head>
        <base href="/public">
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="home/images/favicon.png" type="">
        <title>Alpha Mobile</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
        <!-- font awesome style -->
        <link href="home/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="home/css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="home/css/responsive.css" rel="stylesheet" />
     </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                 <h2 style="font-size: 30px">
                    A<span style="color: brown">l</span>pha M<span style="color: brown">o</span>bile
                 </h2>         
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('allproduct')}}">Products</a>
                        </li> 
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('Order')}}">MY ORDER</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{url('show_cart')}}">CART({{$cartN}})</a>
                       </li>
                       @endauth
                       @endif 
                        @if (Route::has('login'))

                        @auth
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
            
                                <button type="submit" style="background-color:Transparent;border: none;" class="nav-link">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                         </li>
                        @else 
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Log In</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Register</a>
                         </li>
                        @endauth 
                        @endif                        
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
