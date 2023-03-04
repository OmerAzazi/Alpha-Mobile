      <!-- footer start -->
      <footer>
        <div class="container">
           <div class="row">
              <div class="col-md-4">
               <div class="widget_menu">
                  <h3>ABOUT US</h3>
               <div class="information_f">
                 <p><strong>ADDRESS:</strong> MARKA, Amman</p>
                 <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                 <p><strong>EMAIL:</strong> alphamobile290@gmail.com</p>
                     </div>
                  </div>
              </div>
              <div class="col-md-8">
                 <div class="row">
                 <div class="col-md-7">
                    <div class="row">
                       <div class="col-md-6">
                    <div class="widget_menu">
                       <h3>Quick Links</h3>
                       <ul>
                        <ul>
                           <li><a href="{{url('/')}}">Home</a></li>
                           <li><a href="{{url('allproduct')}}">Product</a></li>
                           <li><a href="{{url('#')}}">Contact us </a></li>
                        </ul>
                       </ul>
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="widget_menu">
                       <h3>Account</h3>
                       <ul>
                        @if (Route::has('login'))
                        @auth
                        <li><a href="{{route('profile.show')}}">Profile</a></li>
                        <li><a href="{{route('profile.show')}}">Change Password</a></li>
                        <li><a href="{{route('profile.show')}}">Delete Account</a></li>

                        @else 
                        <li><a href="{{route('login')}}">Login</a></li>
                        <li><a href="{{route('register')}}">Register</a></li>
                       @endauth
                       @endif 
                    </div>
                 </div>
                    </div>
                 </div>     
                 </div>
              </div>
           </div>
        </div>
     </footer>
     <!-- footer end -->
     <div class="cpy_">
        <p class="mx-auto">© 2022 All Rights Reserved By Alpha Mobile><br>
        
         Distributed By Alpha Mobile
        
        </p>
     </div>
     <!-- jQery -->
     <script src="home/js/jquery-3.4.1.min.js"></script>
     <!-- popper js -->
     <script src="home/js/popper.min.js"></script>
     <!-- bootstrap js -->
     <script src="home/js/bootstrap.js"></script>
     <!-- custom js -->
     <script src="home/js/custom.js"></script>
     <script>
      var dt = new Date();
      document.getElementById('date-time').innerHTML=dt;
      </script>
  </body>
</html>