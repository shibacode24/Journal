<!doctype html>

<!--[if gt IE 8]><!-->
<html class="no-js" lang="zxx">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pratibha International Interdisciplinary Journal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="{{asset('public/apple-touch-icon.png')}}">
    <link rel="icon" href="{{asset('public/images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/fontawesome/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/color.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/transitions.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/responsive.css')}}">
    <script src="{{asset('public/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
</head>
<style>
    .error-msg {
        color: red;
    }
    .scroll-container {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
        }
        
        .scroll-content {
            display: inline-flex;
            animation: scroll 10s linear infinite;
        }
        
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-100%);
            }
        }
</style>
<style>
    .highlight {
        background-color: yellow;
    }
</style>
<body class="sj-home" id="content">
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!--************************************
				Preloader Start
	*************************************-->
    <div class="preloader-outer">
        <div class='loader'>
            <div class='loader--dot'></div>
            <div class='loader--dot'></div>
            <div class='loader--dot'></div>
            <div class='loader--dot'></div>
        </div>
    </div>
    <!--************************************
				Preloader End
	*************************************-->
    <!--************************************
			Wrapper Start
	*************************************-->
    <div id="sj-wrapper" class="sj-wrapper">
        <!--************************************
				Content Wrapper Start
		*************************************-->
        <div class="sj-contentwrapper">

            <!--************************************
					Header Start
			*************************************-->
            <header id="sj-header" class="sj-header sj-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="sj-navigationarea" style="padding-top: 20px;">
                                <strong class="sj-logo"><a href="{{route('index')}}"><img src="{{asset('public/images/logo.png')}}" alt=""></a></strong>
                            {{-- <div>  <form id="search-form">
                                <input type="text" id="search-term" placeholder="Search...">
                                <button type="submit" class="sj-btnsearch"><i class="lnr lnr-magnifier"></i></button>
                            </form></div>  for all search yellow color show--}} 
                                {{-- <div class="sj-rightarea">
                                    <form action="{{ route('search') }}" method="GET">
                                        <input type="text" name="query" placeholder="Search ...">
                                        <button type="submit" class="sj-btn sj-btnactive">S</button>
                                    </form>
                                    <!-- <a class="sj-btntopsearch" href="#sj-searcharea"><i class="lnr lnr-magnifier"></i></a> -->
                                    <input type="text" id="search-term" placeholder="Search...">
                                    <a class="sj-btn sj-btnactive" href="{{route('create_account')}}"><b>Create Account</b></a>
                                    <a class="sj-btn sj-btnactive" href="{{route('website_login')}}"><b>Log In</b></a>
                                </div> --}}
                                <div class="sj-rightarea">
                                    <form action="{{ route('search') }}" method="GET" style="display: inline-block;">
                                        <input type="text" name="query" placeholder="Search ...">
                                        <button type="submit" class="sj-btn sj-btnactive"><i class="lnr lnr-magnifier"></i></button>
                                    </form>
                                    <a class="sj-btn sj-btnactive" href="{{ route('create_account') }}"><b>Create Account</b></a>
                                    <a class="sj-btn sj-btnactive" href="{{ route('website_login') }}"><b>Log In</b></a>
                                </div>
                                
                                
                            </div>

                            <div class="sj-navigationarea" style="padding: 2px; background-color: #5e9cea;;">
                                <div class="sj-rightarea" style="float: left;">
                                    <nav id="sj-nav" class="sj-nav navbar-expand-lg">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
											<i class="lnr lnr-menu"></i>
										</button>
                                        <div class="collapse navbar-collapse sj-navigation" id="navbarNav" align="center">
                                            <ul>
                                                <!-- <li class="current-menu-item menu-item-has-children page_item_has_children">
                                                    <a href="javascript:void(0);"><i class="lnr lnr-home"></i></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="#">Browse</a></li>
                                                    </ul>
                                                </li> -->
                                    
                                                <li>
                                                    <a href="{{route('about')}}">About The Journal</a>
                                                </li>

                                                <li>
                                                    <a href="{{route('aim_and_scope')}}">Aim and Scope</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('website_login')}}">Subscribe</a>
                                                </li>
                                                {{-- <li>
                                                    <a href="{{route('submit_paper')}}">Submit A Paper</a>
                                                </li> --}}
                                                <li>
                                                    <a href="{{route('publication_charge')}}">Publication Charges</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('index')}}">Issues</a>
                                                </li>
                                                <li>
                                                    <a href="#">Special Issues</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('policies')}}">Policies</a>
                                                </li>
                                                <!-- <li class="menu-item-has-children page_item_has_children">
                                                    <a href="javascript:void(0);">Articles</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="articles.html">Articles</a></li>
                                                        <li><a href="aticle-list.html">Aticle List</a></li>
                                                        <li><a href="articledetail.html">Article Detail</a></li>
                                                        <li><a href="submitarticle.html">Submit Article</a></li>
                                                    </ul>
                                                </li> -->
                                            </ul>
                                            </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </header>

            @yield('content')

            <footer id="sj-footer" class="sj-footer sj-haslayout">
                <div class="container">
                    <div class="row">
                        <a class="sj-btnscrolltotop" href="javascript:void(0);"><i class="fa fa-angle-up"></i></a>
                        <div class="sj-footercolumns">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 float-left">
                                <div class="sj-fcol sj-footeraboutus">
                                    <strong class="sj-logo">
										<a href="index.html"><img src="{{asset('public/images/logo.png')}}" alt="image description"></a>
									</strong>
                                    <!-- <div class="sj-description">
                                        <p>Eiusmod tempor incididunt ut labore etai dolore magna aliqua enim nostrud exercitation... <a href="javascript:void(0);">Read More</a></p>
                                    </div> -->
                                    <ul class="sj-socialicons sj-socialiconssimple">
                                        <li class="sj-facebook"><a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="sj-linkedin"><a href="javascript:void(0);"><i class="fab fa-instagram"></i></a></li>
                                        <li class="sj-twitter"><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
                                        <li class="sj-linkedin"><a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 float-left">
                                <div class="sj-fcol sj-widget sj-widgetusefullinks">
                                    <div class="sj-widgetheading">
                                        <h3>Quick Links</h3>
                                    </div>
                                    <div class="sj-widgetcontent">
                                        <ul>
                                            <li><a href="#">Submit A Paper</a></li>
                                            <li><a href="{{route('index')}}">Browse</a></li>
                                            <li><a href="{{route('website_login')}}">Subscribe</a></li>
                                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 float-left">
                                <div class="sj-fcol sj-widget sj-widgetresources">
                                    <div class="sj-widgetheading">
                                        <h3>Address</h3>
                                    </div>
                                    <div class="sj-widgetcontent">
                                        <address>C. K. Naidu Road, Camp, Maltekdi, Amravati, Maharashtra 444603. </address>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 float-left">
                                <div class="sj-fcol sj-widget sj-widgetcontactus">
                                    <div class="sj-widgetheading">
                                        <h3>Get In Touch</h3>
                                    </div>
                                    <div class="sj-widgetcontent">
                                        <ul>
                                            <li><a href="tel:07212662740"><i class="lnr lnr-phone"></i><span>(0721) 266 2740</span></a></li>
                                            <li><a href="tel:07212552012"><i class="lnr lnr-phone"></i><span>(0721) 255 2012</span></a></li>
                                            <li><a href="mailto:info@vbmv.org "><i class="lnr lnr-envelope"></i><span style="text-transform: none;">info@vbmv.org </span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sj-footerbottom">
                            <p class="sj-copyrights">© 2024 <span>Pratibha International Interdisciplinary Journal</span>. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </footer>
            <!--************************************
					Footer End
			*************************************-->
        </div>
        <!--************************************
				Content Wrapper End
		*************************************-->
    </div>
    <!--************************************
			Wrapper End
	*************************************-->
    <!--************************************
			Search Start
	*************************************-->
    <div id="sj-searcharea" class="sj-searcharea">
        <button type="button" class="close">×</button>
        <form class="sj-formtheme sj-formsearcmain">
            <input type="search" value="" placeholder="Search Here..." />
            <button type="submit" class="sj-btn sj-btnactive"><span>Search</span></button>
        </form>
    </div>
    <!--************************************
			Search End
	*************************************-->
    <script src="{{asset('public/js/vendor/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('public/js/vendor/jquery-library.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="{{asset('public/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/js/circle-progress.js')}}"></script>
    <script src="{{asset('public/js/scrollbar.min.js')}}"></script>
    <script src="{{asset('public/js/chartist.min.js')}}"></script>
    <script src="{{asset('public/js/countdown.js')}}"></script>
    <script src="{{asset('public/js/appear.js')}}"></script>
    <script src="{{asset('public/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    @include('sweetalert')
    {{-- <script>
        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get the search term
            const searchTerm = document.getElementById('search-term').value;

            // Get the content
            const content = document.getElementById('content').innerHTML;

            // Create a regex to search for the term, case-insensitive
            const regex = new RegExp(`(${searchTerm})`, 'gi');

            // Replace the matched term with a span that has a highlight class
            const newContent = content.replace(regex, '<span class="highlight">$1</span>');

            // Update the content with the new highlighted text
            document.getElementById('content').innerHTML = newContent;
        });
    </script> --}}
    {{-- <script>
        // Optionally, you can pause the scrolling when hovering over the images
        const scrollContent = document.querySelector('.scroll-content');

        scrollContent.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
        });

        scrollContent.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
        });
    </script> --}}

    <script>
        setTimeout(() => {
                $('.alert_close_btn').trigger('click');
            }, 4000);
            
    </script>

    @yield('js')
    
</body>

</html>