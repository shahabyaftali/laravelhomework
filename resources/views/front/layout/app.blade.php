<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="keywords" content="Afghan Women Journalist Union">
    <meta name="description"
        content="Afghan Women Journalist Union's website, with news, events, trainings, and others.">
    <meta name="author" content="DepressedPsychiatrist"><!-- Favicon -->
    <link rel="icon" href="img/favicon.png')}}" sizes="32x32">
    <link rel="icon" href="img/favicon.png')}}" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="img/favicon.png')}}">
    <meta name="msapplication-TileImage" content="img/favicon.png')}}"><!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width,initial-scale=1"><!-- Vendor CSS -->
    <link href="{{asset('front/css/vendors.css')}}" rel="stylesheet"><!-- Theme CSS -->
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet"><!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('front/css/custom.css')}}"><!-- Web Fonts  -->
    <!-- Google Font Persian -->
    <link href="https://fonts.googleapis.com/css?family=Amiri&display=swap" rel="stylesheet">
    <!-- Google Font English -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
    
    <style>
      *{
        font-family: 'Raleway', sans-serif;
        font-weight: 700 !important;
      }
    </style>
    @if(\Session::get('locale') == 'fa' or \Session::get('locale') == 'ps')
      <style>
          *:not(.fa):not(.mdicon) {
              font-family: 'Amiri', serif !important;
          }
          
          .af-rtl {
            direction: rtl;
          }
          .af-tr {
            text-align: right;
          }
          .af-tr-rtl, .af-tr-rtl > * {
            text-align: right !important;
            direction: rtl !important;
          }
          .af-tl {
            text-align: left !important;
          }
          .af-fs, .af-fs > *, #menu-offcanvas-menu a, #menu-main-menu a {
            font-size: 1.18em !important;
          }
          .af-fs-md > * {
            font-size: 1.2em !important;
          }
          .af-fs-sm {
            font-size: 1.1em !important;
          }
          .af-fs-h {
            font-size: 1.8em !important;
          }
          .af-fl {
            float: left;
          }
          .af-fl {
            float: right;
          }
          .af-b {
            font-weight: bold;
          }
          .af-mr0 {
            margin-right: 0px;
          }
          
      </style>
    @endif
    <script>
        WebFontConfig = {
            google: {
                families: ['Libre Franklin:300,400,700', 'Roboto:300,400,700']
            },
            active: function () {
                $(window).trigger('webfontLoaded');
            }
        };

        (function (d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = "{{asset('front/js/webfont.js')}}";
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);

    </script>
</head>

<body class="home home-7 af-rtl">
    <!-- .site-wrapper -->
    <div class="site-wrapper">
        <!-- Site header -->
        <header class="site-header site-header--skin-5">
            <!-- Header content -->
            <div class="header-main hidden-xs hidden-sm">
                <div class="container">
                    <div class="row row--flex row--vertical-center">
                        <div class="col-xs-3"><a href="#subscribe-modal" class="btn btn-default" data-toggle="modal" data-target="#subscribe-modal"><i class="mdicon mdicon-mail_outline mdicon--first"></i><span class="af-b">{{ __('text.subscribe')}}</span></a>
                        </div>
                        <div class="col-xs-6">
                            <div class="header-logo text-center"><a href="{{route('home')}}"><img src="{{asset('front/img/logo.png')}}" alt="logo" width="200"></a>
                            </div>
                        </div>
                        <div class="col-xs-3 text-right af-tl"><a href="{{$info->facebook}}" class="btn btn-default"><i class="mdicon mdicon-facebook mdicon--first"></i><span class="af-b">{{ __('text.follow') }}</span></a></div>
                    </div>
                </div>
            </div><!-- Header content -->
            <!-- Mobile header -->
            <div id="mnmd-mobile-header" class="mobile-header visible-xs visible-sm">
                <div class="mobile-header__inner mobile-header__inner--flex">
                    <div class="header-branding header-branding--mobile mobile-header__section text-left">
                        <div class="header-logo header-logo--mobile flexbox__item text-left"><a href="{{route('home')}}"><img
                                    src="{{asset('front/img/logo.png')}}" alt="logo"></a></div>
                    </div>
                    <div class="mobile-header__section text-right">
                        <button type="submit" class="mobile-header-btn">
                                <a href="{{url('locale/en')}}"><img src="{{asset('front/img/uk.png')}}" alt="English"
                                        title="English"></a>
                                <a href="{{url('locale/ps')}}"><img src="{{asset('front/img/af.png')}}" alt="Pashto"
                                        title="Pashto"></a>
                                <a href="{{url('locale/fa')}}"><img src="{{asset('front/img/af.png')}}" alt="Dari"
                                        title="Dari"></a>
                        </button> <a href="#mnmd-offcanvas-primary"
                            class="offcanvas-menu-toggle mobile-header-btn js-mnmd-offcanvas-toggle">
                            <span class="hidden-xs">Menu</span>
                            <i class="mdicon mdicon-menu mdicon--last hidden-xs"></i>
                            <i class="mdicon mdicon-menu visible-xs-inline-block"></i></a>
                    </div>
                </div>
            </div><!-- Mobile header -->
            <!-- Navigation bar -->
            <nav class="navigation-bar navigation-bar--fullwidth hidden-xs hidden-sm js-sticky-header-holder">
                <div class="container">
                    <div class="navigation-bar__inner">
                        <div class="navigation-bar__section"><a href="#mnmd-offcanvas-primary"
                                class="offcanvas-menu-toggle navigation-bar-btn js-mnmd-offcanvas-toggle"><i
                                    class="mdicon mdicon-menu"></i></a></div>
                        <div class="navigation-wrapper navigation-bar__section text-center js-priority-nav">
                            <ul class="af-rtl navigation navigation--main navigation--inline" id="menu-main-menu">
                                <li><a href="{{route('home')}}">{{__('text.home')}}</a></li>
                                <li><a href="{{route('news.index')}}">{{__('text.news')}}</a></li>
                                <li><a href="{{route('event.index')}}">{{__('text.events')}}</a></li>
                                <li><a href="{{route('blog.index')}}">{{__('text.blog')}}</a></li>
                                <li><a href="{{route('gallery.index')}}">{{__('text.gallery')}}</a></li>
                                <li><a href="{{route('training.index')}}">{{__('text.trainings')}}</a></li>
                                <li><a href="{{route('about')}}">{{__('text.about')}}</a></li>
                                <li><a href="{{route('contact.index')}}">{{__('text.contact')}}</a></li>
                            </ul>
                        </div>
                        <div class="navigation-bar__section"><button type="submit"
                                class="navigation-bar-btn js-search-dropdown-toggle">
                                <a href="{{url('locale/en')}}"><img src="{{asset('front/img/uk.png')}}" alt="English"
                                        title="English"></a>
                                <a href="{{url('locale/ps')}}"><img src="{{asset('front/img/af.png')}}" alt="Pashto"
                                        title="Pashto"></a>
                                <a href="{{url('locale/fa')}}"><img src="{{asset('front/img/af.png')}}" alt="Dari"
                                        title="Dari"></a>
                            </button></div>
                    </div><!-- .navigation-bar__inner -->
                </div><!-- .container -->
            </nav><!-- Navigation-bar -->
        </header>
        <!-- Site header -->

        <div class="site-content {{request()->routeIs('blog.show*') ? 'single-entry single-entry--template-4' : ''}}  {{(request()->routeIs('news.show*') or request()->routeIs('event.show*')) ? 'single-entry--billboard-blur' : ''}}">
          @yield('content')
        </div>
        <!-- .site-content -->

        <footer class="site-footer site-footer--inverse inverse-text">
            <div class="site-footer__section">
                <div class="container">
                    <!-- <div class="site-footer__section-inner text-center">
                        <div class="site-logo"><a href="{{route('home')}}"><img
                                    src="{{asset('front/img/logo.png')}}" alt="logo" width="200"></a></div>
                    </div>
                </div> -->
            </div>
            <div class="site-footer__section">
                <div class="container">
                    <nav class="footer-menu">
                        <ul id="menu-footer-menu" class="navigation navigation--footer navigation--center">
                            <li><a href="{{route('contact.index')}}">{{__('text.contact')}}</a></li>
                            <li><a href="{{route('about')}}">{{__('text.about')}}</a></li>
                            <li><a href="{{route('gallery.index')}}">{{__('text.gallery')}}</a></li>
                            <li><a href="{{route('event.index')}}">{{__('text.events')}}</a></li>
                            <li><a href="{{route('blog.index')}}">{{__('text.blog')}}</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="site-footer__section">
                <div class="container">
                    <ul class="social-list social-list--lg list-center">
                        <li><a href="{{$info->facebook}}"><i class="mdicon mdicon-facebook"></i></a></li>
                        <li><a href="{{$info->twitter}}"><i class="mdicon mdicon-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="site-footer__section">
                <div class="container">
                    <div class="text-center af-rtl af-fs">{!! __('text.footer') !!}</div>
                </div>
            </div>
        </footer>

        <!-- Subscribe modal -->
        <div class="modal fade subscribe-modal" id="subscribe-modal" tabindex="-1" role="dialog"
            aria-labelledby="login-modal-label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header af-rtl"><button type="button" class="close af-fl" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#10005;</span></button>
                        <h4 class="modal-title af-fs af-b" id="login-modal-label">{{ __('text.subscribe')}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="subscribe-form subscribe-form--horizontal text-center max-width-sm">
                            <p class="typescale-1 af-rtl">{{ __('text.sub_text')}}</p>
                            <div class="subscribe-form__fields">
                              <form action="{{route('subscriber.store')}}" method="post">
                                @csrf
                                <p><input type="email" name="email" placeholder="{{ __('text.your-email')}}" required="" class="af-tr"> <input
                                        type="submit" value="{{ __('text.subscribe')}}" class="btn btn-primary af-b"></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Subscribe modal -->

        <!-- Off-canvas menu -->
        <div id="mnmd-offcanvas-primary" class="mnmd-offcanvas js-mnmd-offcanvas js-perfect-scrollbar">
            <div class="mnmd-offcanvas__title af-tr-rtl">
                <h2 class="site-logo"><a href="#"><img src="{{asset('front/img/logo.png')}}" alt="logo"
                            width="140"></a></h2>
                <ul class="social-list list-horizontal">
                    <li><a href="{{$info->facebook}}"><i class="mdicon mdicon-facebook"></i></a></li>
                    <li><a href="{{$info->twitter}}"><i class="mdicon mdicon-twitter"></i></a></li>
                </ul><a href="#mnmd-offcanvas-primary" class="mnmd-offcanvas-close js-mnmd-offcanvas-close"
                    aria-label="Close"><span aria-hidden="true">&#10005;</span></a>
            </div>
            <div class="mnmd-offcanvas__section mnmd-offcanvas__section-navigation">
                <ul id="menu-offcanvas-menu" class="af-tr-rtl navigation navigation--offcanvas">
                <li><a href="{{route('home')}}">{{__('text.home')}}</a></li>
                <li><a href="{{route('news.index')}}">{{__('text.news')}}</a></li>
                <li><a href="{{Route('event.index')}}">{{__('text.events')}}</a></li>
                <li><a href="{{route('blog.index')}}">{{__('text.blog')}}</a></li>
                <li><a href="{{route('gallery.index')}}">{{__('text.gallery')}}</a></li>
                <li><a href="{{route('training.index')}}">{{__('text.trainings')}}</a></li>
                <li><a href="{{route('about')}}">{{__('text.about')}}</a></li>
                <li><a href="{{route('contact.index')}}">{{__('text.contact')}}</a></li>
                </ul>
            </div>
            <div class="mnmd-offcanvas__section">
                <div class="widget widget_text">
                    <div class="subscribe-form subscribe-form--horizontal text-center af-fs af-tr-rtl" id="side-sub-form">
                        <p>{{ __('text.sub_text')}}</p>
                        @if(\Session::get('subscribed') == 'true')
                        <p>{{__('text.subscribed')}}</p>
                        @endif
                        <form action="{{route('subscriber.store')}}" method="POST">
                          @csrf
                        <div class="subscribe-form__fields"><input type="email" name="email"
                                placeholder="{{ __('text.your-email')}}" required=""> <input type="submit" value="{{ __('text.subscribe')}}"
                                class="btn btn-primary af-b"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Off-canvas menu -->

        <a href="#" class="mnmd-go-top btn btn-default hidden-xs js-go-top-el"><i
                class="mdicon mdicon-arrow_upward"></i></a>
    </div>
    <!-- .site-wrapper -->

    <!-- Vendor -->
    <script type="text/javascript" src="{{asset('front/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('front/js/vendors.js')}}"></script>

    <!-- Theme Scripts -->
    <script type="text/javascript" src="{{asset('front/js/scripts.js')}}"></script>

    <!-- Theme Custom Scripts -->
    <script src="{{asset('front/js/custom.js')}}"></script>

</body>

</html>
