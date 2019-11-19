<!-- begin::Head -->
<!DOCTYPE html>
<html>
    <head>
        <!--begin::Base Path (base relative path for assets of this page) -->
        <base href=""><!--end::Base Path -->
        <meta charset="utf-8">
        <title>ImmoScore | Sign In</title>
        <meta content="Basic form examples" name="description">

@include('front-end.layouts.user_forms_header')

        <!--begin::Page Custom Styles(used by this page) -->
          <link href="{{ asset('assets/css/demo3/pages/login/login-v1.css')}}" rel="stylesheet" type="text/css" />
                        <!--end::Page Custom Styles -->

        <!--begin::Global Theme Styles(used by all pages) -->
                    <link href="{{ asset('assets/vendors/global/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
                    <link href="{{ asset('assets/css/demo3/style.bundle.css')}}" rel="stylesheet" type="text/css" />
                <!--end::Global Theme Styles -->

	    <!--begin::Layout Skins(used by all pages) -->
        	    <!--end::Layout Skins -->

        <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico')}}" />
    </head>
    <!-- end::Head -->

    <!-- begin::Body -->
    <!--<body  style="background-image: url({{ asset('assets/media/misc/bg_1.jpg')}})"    >-->
    <body>

    <!-- begin::Page loader -->

    <!-- end::Page Loader -->
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid__item  kt-grid__item--fluid kt-grid kt-grid--hor kt-login-v1" id="kt_login_v1">


            <!--begin::Item-->
            <div class="kt-grid__item  kt-grid kt-grid--ver  kt-grid__item--fluid">
                <!--begin::Body-->
                <div class="kt-login-v1__body">
                    <!--begin::Section-->
                    <div class="kt-login-v1__section">
                        <div class="kt-login-v1__info">
                            <h3 class="kt-login-v1__intro">To get started, tell us a little about yourself</h3>
                            <p></p>
                        </div>
                    </div>
                    <!--begin::Section-->

                    <!--begin::Separator-->
                    <div class="kt-login-v1__seaprator"></div>
                    <!--end::Separator-->

                    <!--begin::Wrapper-->
                    <div class="kt-login-v1__wrapper">
                        <div class="kt-login-v1__container">
                            <h3 class="kt-login-v1__title">
                                Sign To Account
                            </h3>

                            <!--begin::Form-->
                            @if (count($errors) > 0)
                            <div class="alert alert-danger" style="padding:0px;">

                                <ul  style="padding:15px 0 0 20px;">
                                    <strong>Whoops!</strong> There were some problems with your input.
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>

                            </div>
                            @endif

                               @if(session('success'))
                                <div class="alert alert-success" style="padding:0px;">
                                    <ul  style="padding:15px 0 0 20px;">
                                    <li>{{session('success')}}</li>
                                </ul>
                                </div>

@endif
                            <form class="kt-login-v1__form kt-form" action="{{ url('/login') }}" method="post" autocomplete="off">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Password" name="password" autocomplete="off">
                                </div>

                                <div class="kt-login-v1__actions">
                                    <a href="forgot_password" class="kt-login-v1__forgot">
                                        Forgot Password ?
                                    </a>
                                    <button type="submit" class="btn btn-pill btn-elevate">Sign In</button>
                                </div>
                            </form>
                            <!--end::Form-->

                            <!--begin::Divider-->
                            <div class="kt-login-v1__divider">
                                <div class="kt-divider">
                                    <span></span>
                                    <span>OR</span>
                                    <span></span>
                                </div>
                            </div>
                            <!--end::Divider-->

                            <div class="kt_login_v1 kt-login-v1__head kt-login-v1__signup">
                                <h4 class="kt-login-v1__heading">Don't have an account?</h4>
                                <a href="signup">Sign Up</a>
                            </div>

                        </div>
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Item-->

            <!--begin::Item-->
            @include('front-end.layouts.user_forms_footer')
            <!--end::Item-->
        </div>	</div>

    <!-- end:: Page -->


    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#4d5cf2",
                    "metal": "#c4c5d6",
                    "light": "#ffffff",
                    "accent": "#00c5dc",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995",
                    "focus": "#9816f4"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };
    </script>
    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->
  <script src="{{asset('assets/vendors/global/vendors.bundle.js')}}" type="text/javascript"></script>
		    	   <script src="{{asset('assets/js/demo3/scripts.bundle.js')}}" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->




    <!--begin::Page Scripts(used by this page) -->
                   <!-- <script src="./assets/js/demo1/pages/custom/user/login.js" type="text/javascript"></script>-->
    <!--end::Page Scripts -->
</body>
<!-- end::Body -->
</html>