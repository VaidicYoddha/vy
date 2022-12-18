  <!-- BEGIN: Main Menu-->
  <div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl  bg-warning fw-bolder"
      role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item me-auto"><a class="navbar-brand" href="index.html"><span class="brand-logo">
                <img src="icon.png" alt="">
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
                  </svg> -->
              </span>
              <h2 class="brand-text mb-0">Vaidik Yoddha</h2>
            </a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <!-- Horizontal menu content-->
      <div class="navbar-container main-menu-content" data-menu="menu-container">
        <!-- include {{ asset('/front')}}/includes/mixins-->
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

          <li class="nav-item {{ Request::is('/')?'active':'';}} {{ Request::is('home')?'active':'';}} ">
            <a class=" nav-link d-flex align-items-center text-dark" href="{{ url('/') }}">

                <span data-i18n="Dashboards">Home</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('sp*')?'active':'';}}" >
            <a class=" nav-link d-flex align-items-center text-dark" href="{{ url('/sp') }}">
                <span data-i18n="Dashboards">सत्यार्थप्रकाश</span>
            </a>
          </li>

          <li class="dropdown nav-item {{ Request::is('/ved')?'active':'';}} " data-menu="dropdown"><a
              class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown">
              <span >वेद</span></a>
            <ul class="dropdown-menu" data-bs-popper="none">
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://vedicscriptures.in/rigveda" target="blank"
                  data-bs-toggle="" data-i18n="Email"><span
                    data-i18n="Email">ऋग्वेद</span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://vedicscriptures.in/yajurveda" target="blank" data-bs-toggle=""
                  data-i18n="Chat"><span data-i18n="Chat">यजुर्वेद</span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://vedicscriptures.in/samveda" target="blank" data-bs-toggle=""
                  data-i18n="Todo"><span data-i18n="Todo">सामवेद</span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://vedicscriptures.in/atharvaveda" target="blank"
                  data-bs-toggle="" data-i18n="Calendar"><span
                    data-i18n="Calendar">अथर्ववेद</span></a>
              </li>

            </ul>
          </li>
{{--
          <li class="dropdown nav-item {{ Request::is('/vedang')?'active':'';}} " data-menu="dropdown"><a
              class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown">
              <span >वेदांग </span></a>
            <ul class="dropdown-menu" data-bs-popper="none">
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://vedicscriptures.in/rigveda" target="blank"
                  data-bs-toggle="" data-i18n="Email"><span
                    data-i18n="Email">शिक्षा </span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://vedicscriptures.in/yajurveda" target="blank" data-bs-toggle=""
                  data-i18n="Chat"><span data-i18n="Chat">कल्प </span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://vedicscriptures.in/samveda" target="blank" data-bs-toggle=""
                  data-i18n="Todo"><span data-i18n="Todo">व्याकरण </span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://vedicscriptures.in/atharvaveda" target="blank"
                  data-bs-toggle="" data-i18n="Calendar"><span
                    data-i18n="Calendar">निरुक्त </span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://vedicscriptures.in/samveda" target="blank" data-bs-toggle=""
                  data-i18n="Todo"><span data-i18n="Todo">ज्योतिष </span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://vedicscriptures.in/atharvaveda" target="blank"
                  data-bs-toggle="" data-i18n="Calendar"><span
                    data-i18n="Calendar">छन्द </span></a>
              </li>

            </ul>
          </li> --}}

          <li class="dropdown nav-item {{ Request::is('/darshan')?'active':'';}} " data-menu="dropdown"><a
              class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown">
              <span >दर्शन शास्त्र </span></a>
            <ul class="dropdown-menu" data-bs-popper="none">
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://darshan.vaidicyoddha.in/nyay" target="blank"
                  data-bs-toggle="" data-i18n="Email"><span
                    data-i18n="Email">न्याय दर्शन</span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://darshan.vaidicyoddha.in/sankhya" target="blank" data-bs-toggle=""
                  data-i18n="Chat"><span data-i18n="Chat">सांख्य दर्शन</span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://darshan.vaidicyoddha.in/vedant" target="blank" data-bs-toggle=""
                  data-i18n="Todo"><span data-i18n="Todo">वेदान्त दर्शन</span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://darshan.vaidicyoddha.in/vaisheshik" target="blank"
                  data-bs-toggle="" data-i18n="Calendar"><span
                    data-i18n="Calendar">वैशेषिक दर्शन</span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://darshan.vaidicyoddha.in/yog" target="blank" data-bs-toggle=""
                  data-i18n="Todo"><span data-i18n="Todo">योग दर्शन</span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://darshan.vaidicyoddha.in/mimansa" target="blank"
                  data-bs-toggle="" data-i18n="Calendar"><span
                    data-i18n="Calendar">मीमांसा दर्शन</span></a>
              </li>

            </ul>
          </li>
          <li class="dropdown nav-item {{ Request::is('/upanishad')?'active':'';}} " data-menu="dropdown"><a
              class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown">
              <span >उपनिषद  </span></a>
            <ul class="dropdown-menu" data-bs-popper="none">
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://upanishad.vaidicyoddha.in/isho" target="blank"
                  data-bs-toggle="" data-i18n="Email"><span
                    data-i18n="Email">ईशावास्योपनिषद् </span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://upanishad.vaidicyoddha.in/keno" target="blank" data-bs-toggle=""
                  data-i18n="Chat"><span data-i18n="Chat">केनोपनिषद </span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://upanishad.vaidicyoddha.in/katho" target="blank" data-bs-toggle=""
                  data-i18n="Todo"><span data-i18n="Todo">कठोपनिषद </span></a>
              </li>

              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://upanishad.vaidicyoddha.in/aitareya" target="blank" data-bs-toggle=""
                  data-i18n="Chat"><span data-i18n="Chat">ऐतरेयोपनिषद </span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://upanishad.vaidicyoddha.in/tait" target="blank" data-bs-toggle=""
                  data-i18n="Todo"><span data-i18n="Todo">तैत्तिरीयोपनिषद </span></a>
              </li>

              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://upanishad.vaidicyoddha.in/mundko" target="blank"
                  data-bs-toggle="" data-i18n="Calendar"><span
                    data-i18n="Calendar">मुण्ड़कोपनिषदस </span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://upanishad.vaidicyoddha.in/mandukya" target="blank"
                  data-bs-toggle="" data-i18n="Email"><span
                    data-i18n="Email">माण्डूक्योपनिषद </span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://upanishad.vaidicyoddha.in/prashno" target="blank" data-bs-toggle=""
                  data-i18n="Chat"><span data-i18n="Chat">प्रश्नोपनिषद </span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://upanishad.vaidicyoddha.in/shvet" target="blank" data-bs-toggle=""
                  data-i18n="Todo"><span data-i18n="Todo">श्वेताश्वतरोपनिषद </span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://upanishad.vaidicyoddha.in/chand" target="blank"
                  data-bs-toggle="" data-i18n="Calendar"><span
                    data-i18n="Calendar">छान्दोग्योपनिषद </span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://upanishad.vaidicyoddha.in/bruh" target="blank" data-bs-toggle=""
                  data-i18n="Todo"><span data-i18n="Todo">बृहदारण्यकोपनिषद </span></a>
              </li>

            </ul>
          </li>

          <li class="nav-item " >
            <a class=" nav-link d-flex align-items-center text-dark" href="https://manusmriti.vaidicyoddha.in/">
                <span data-i18n="Dashboards">मनुस्मृती</span>
            </a>
          </li>

          <li class="dropdown nav-item {{ Request::is('/itihaas')?'active':'';}} " data-menu="dropdown"><a
              class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown">
              <span >इतिहास</span></a>
            <ul class="dropdown-menu" data-bs-popper="none">
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://ramayan.vaidicyoddha.in" target="blank"
                  data-bs-toggle="" data-i18n="Email"><span
                    data-i18n="Email">रामायण</span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://mahabharat.vaidicyoddha.in" target="blank" data-bs-toggle=""
                  data-i18n="Chat"><span data-i18n="Chat">महाभारत</span></a>
              </li>
              <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="https://geeta.vaidicyoddha.in" target="blank" data-bs-toggle=""
                  data-i18n="Todo"><span data-i18n="Todo">भगवद् गीता </span></a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ Request::is('granth*')?'active':'';}}" >
            <a class=" nav-link d-flex align-items-center text-dark" href="{{ url('/granth') }}">

                <span data-i18n="Dashboards">ग्रंथ कोष</span>
            </a>
          </li>

           <li class="nav-item {{ Request::is('shanka-samadhan*')?'active':'';}}" >
            <a class=" nav-link d-flex align-items-center text-dark" href="{{ url('/shanka-samadhan') }}">

                <span data-i18n="Dashboards">शंका समाधान</span>
            </a>
          </li>

          <li class="nav-item {{ Request::is('/sp')?'active':'';}}" >
            <a class=" nav-link d-flex align-items-center text-dark" href="{{ url('/sp') }}">

                <span data-i18n="Dashboards">About Us</span>
            </a>
          </li>


          <li class="nav-item {{ Request::is('authors')?'active':'';}}" >
            <a class=" nav-link d-flex align-items-center text-dark" href="{{ url('/authors') }}">

                <span data-i18n="Dashboards">Authors List</span>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </div>
  <!-- END: Main Menu-->
