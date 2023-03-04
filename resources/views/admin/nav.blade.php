<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
      <a class="navbar-brand brand-logo-mini" href=""><img src="assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-settings d-none d-lg-block">
          <a class="nav-link" href="{{url('dash')}}">
            <i class="mdi mdi-view-grid"></i>
          </a>
        </li>
        <li class="nav-item dropdown border-left">
          <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-email"></i>
            <span class="count bg-success"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
            <h6 class="p-3 mb-0">Messages</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <span alt="image" class="mdi mdi-email">
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1">No message</p>
              </div>
            </a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
            <div class="navbar-profile">
            @if ($data->profile_photo_path === null) 
            @else 
              <img class="img-xs rounded-circle" src="/storage/{{$data->profile_photo_path}}" alt="">
            @endif
             <p class="mb-0 d-none d-sm-block navbar-profile-name">{{$data->name}}</p>
              <i class="mdi mdi-menu-down d-none d-sm-block"></i>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
            <h6 class="p-3 mb-0">Profile</h6>
            <div class="dropdown-divider"></div>
            <br><i class="mdi mdi-settings text-success" style="padding-left:12px"></i><a href="{{ route('profile.show') }}" style="color:white;padding-left:25px;text-decoration: none;" class="underline text-sm text-gray-600 hover:text-gray-900">{{ __('Edit Profile') }}</a><br>
            <br><div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                  <i class="mdi mdi-logout text-danger"></i>
              </div>
              <div class="preview-item-content">
                <form method="POST" action="{{ route('logout') }}" class="inline">
                  @csrf

                  <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2" style="background-color:Transparent;border: none;color:white">
                      {{ __('Log Out') }}
                  </button>
              </form>
              </div>
            </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-format-line-spacing"></span>
      </button>
    </div>
  </nav>