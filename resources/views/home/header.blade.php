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
                  <a class="nav-link" href="{{url('show_cart')}}">CART({{$cartN}})</a>
               </li>
               @endauth
               @endif 

                
                @if (Route::has('login'))

                @auth
                <li class="nav-item">
                    <x-app-layout>
                    </x-app-layout>
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