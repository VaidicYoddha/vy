  <!-- BEGIN: Header-->
  <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center"
    data-nav="brand-center">
    <div class="navbar-header d-xl-block d-none">
      <ul class="nav navbar-nav">
        <li class="nav-item"><a class="navbar-brand" href="{{ url('/')}}"><span class="brand-logo">
              <!-- <img src="icon.png" alt=""> -->
              <!-- <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                  <defs>
                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                      <stop stop-color="#000000" offset="0%"></stop>
                      <stop stop-color="#FFFFFF" offset="100%"></stop>
                    </lineargradient>
                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                      <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                      <stop stop-color="#FFFFFF" offset="100%"></stop>
                    </lineargradient>
                  </defs>
                  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                      <g id="Group" transform="translate(400.000000, 178.000000)">
                        <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                        <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                        <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                        <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                      </g>
                    </g>
                  </g>
                </svg>-->
            </span>
            <h1 class="brand-text mb-0" style="font-family: 'Rozha One', serif;">वैदिक यौद्धा</h1>
          </a></li>
      </ul>
    </div>
    <div class="navbar-container d-flex content">
      <div class="bookmark-wrapper d-flex align-items-center">
        <ul class="nav navbar-nav d-xl-none">
          <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a>
          </li>
        </ul>
      </div>
      <ul class="nav navbar-nav align-items-center ms-auto">

        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
              data-feather="moon"></i></a></li>
               <!-- BEGIN: search-->
        {{-- <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon"
              data-feather="search"></i></a>
          <div class="search-input">
            <div class="search-input-icon"><i data-feather="search"></i></div>
            <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="-1"
              data-search="search">
            <div class="search-input-close"><i data-feather="x"></i></div>
            <ul class="search-list search-list-main"></ul>
          </div>
        </li> --}}
        <!-- BEGIN: notification-->
        {{-- <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#"
            data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span
              class="badge rounded-pill bg-danger badge-up">5</span></a>
          <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
            <li class="dropdown-menu-header">
              <div class="dropdown-header d-flex">
                <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                <div class="badge rounded-pill badge-light-primary">6 New</div>
              </div>
            </li>
            <li class="scrollable-container media-list"><a class="d-flex" href="#">
                <div class="list-item d-flex align-items-start">
                  <div class="me-1">
                    <div class="avatar"><img src="{{ asset('/front')}}/app-assets/images/portrait/small/avatar-s-15.jpg"
                        alt="avatar" width="32" height="32"></div>
                  </div>
                  <div class="list-item-body flex-grow-1">
                    <p class="media-heading"><span class="fw-bolder">Congratulation Sam 🎉</span>winner!</p><small
                      class="notification-text"> Won the monthly best seller badge.</small>
                  </div>
                </div>
              </a>


            </li>
            <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Read all notifications</a></li>
          </ul>
        </li> --}}
        <!-- BEGIN: notification-->
         @if (!Auth::guest())
            <!-- BEGIN: User-->
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="user-nav d-sm-flex d-none">
                  <span class="user-name fw-bolder">{{Auth::user()->name}}
                  </span>
                  <span class="user-status">{{Auth::user()->roles()->pluck('name')}}
                  </span>
                </div>
                <span class="avatar"><img class="round"
                  src="https://ui-avatars.com/api/?name={{Auth::user()->name}}&color=ff0000&bold=true" alt="avatar" height="40"
                  width="40">
                  <span class="avatar-status-online">
                  </span>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                {{-- <a class="dropdown-item"
                  href="page-profile.html"><i class="me-50 "  data-feather="user"></i>
                  Profile
                </a> --}}
                      <a class="dropdown-item nav-link-style"><i class="ficon" data-feather="moon"> </i> Dark/Light</a>
                <div class="dropdown-divider"></div>
                @if (Auth::user()->role_id == '1' || Auth::user()->role_id == '2' )

                <a class="dropdown-item" href="{{ url('/admin')}}"><i
                    class="me-50" data-feather="settings"></i>
                    Admin
                </a>
                <a class=" dropdown-item"
                    href="{{ url('/sitemap') }}">
                    <i class="me-50"  data-feather='list'></i>
                    Sitemap
                </a>

                @endif

                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="me-50" data-feather="power"></i>
                  Logout
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                </a>
              </div>
            </li>
           @else
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">Login</span><span
                    class="user-status">Register</span></div><span class="avatar"><img class="round"
                    src="{{ asset('/front/logo')}}/logo.png" alt="avatar" height="40"
                    width="40"><span class="avatar-status-offline"></span></span>
              </a>
               <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                <a class="dropdown-item"
                  href="{{ route('login') }}"><i data-feather='log-in'></i>
                  Login
                </a>
                <a class="dropdown-item"
                  href="{{ route('register') }}"><i data-feather='user-plus'></i>
                  Register
                </a>
              </div>
            </li>
          @endif
      </ul>
    </div>
  </nav>



  <!-- END: Header-->
