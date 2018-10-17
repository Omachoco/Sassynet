!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
   <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
     <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/metisMenu.css') }}" rel="stylesheet">
      <link href="{{ asset('css/accordian.css') }}" rel="stylesheet">

      

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




</head>

<body id="admin-page">
 <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
              
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-user fa-fw"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"        onclick="event.preventDefault();"><i class="fa fa-user fa-fw"></i>User Profile</a>
                
            <a class="dropdown-item" href="#"        onclick="event.preventDefault();"><i class="fa fa-gear fa-fw"></i>Settings</a>
                
                
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


<nav class="navbar navbar-light bg-light w-800 sidebar" role="navigation">
<ul class="nav flex-column list-group accordion" id="accordion">
  <li class="nav-item list-group-item ">
     <form class=" my-auto mx-auto w-450">
   <div class="input-group">
      <input class="form-control mr-0 border-right-0" type="search" placeholder="Search" aria-label="Search">
      <div class=" input-group-append">
      <button class="btn btn-outline-info bg-light border-left-0 main-search-button" type="button"><i class="fa fa-search"></i></button>
     </div>
     </div>
      </form>
  </li>
  
<li>
    <div class="link"><i class="fa fa-database"></i>Web Design<i class="fa fa-chevron-down"></i></div>
    <ul class="submenu">
      <li><a href="#">Photoshop</a></li>
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
    </ul>
  </li>
  
</ul>
</nav>
</div><!--app div ends-->

<!-- jQuery -->

<script src="{{asset('js/app.js') }}" defer></script>
<script src="{{asset('js/metisMenu.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>

<script>
$(function() {
  var <a href="https://www.jqueryscript.net/accordion/">Accordion</a> = function(el, multiple) {
    this.el = el || {};
    this.multiple = multiple || false;

    var links = this.el.find('.link');
    links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
  }

  Accordion.prototype.dropdown = function(e) {
    var $el = e.data.el;
      $this = $(this),
      $next = $this.next();

    $next.slideToggle();
    $this.parent().toggleClass('open');

    if (!e.data.multiple) {
      $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
    };
  }  

  var accordion = new Accordion($('#accordion'), false);
});

  var accordion = new Accordion($('#accordion'), false);
});
</script>




</body>

</html>
