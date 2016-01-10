<!doctype html>
 <html lang="en-US">
 <head>
    <?php
      //no cached pages
      header("Expires: Thu, 19 Nov 1981 08:52:00 GMT"); //Date in the past
      header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0"); //HTTP/1.1
      header("Pragma: no-cache");
    ?>

    <!-- meta tag starts here-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('meta_tags')

    <!-- cdn links starts here-->
    {!! Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') !!}
    {!! Html::style('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
    {!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') !!}
    {!! Html::script('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') !!}

    <!-- local links starts here -->
    <link rel="shortcut icon" href="{{{ asset('images/icon.png') }}}">
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/1.css') !!}
    {!! Html::script('js/js1.js') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
      // set up jQuery with the CSRF token, or else post routes will fail
      $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    </script>

    @yield('css') <!-- put some styling(css) here -->
    @yield('js')  <!-- put some javascript(js) here -->

    <title> 
		 @yield('title') 
	</title>

    </head>

	<body>

	<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand topnav icon1" title="India's Largest Local's Network" 
                             href="{{{ asset('index.php') }}}">
                             <b class="fa fa-quote-left"></b>
                             local's loop
                             <b class="fa fa-quote-right"></b>
            </a> 
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li>
                <a href="#" class="link_design" data-toggle="modal" data-target="#locationModal">
                  <i class="fa fa-map-marker colored"></i> Faridabad
                </a>
                </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
             <li>
                    <a href="#" class="link_design not-active" data-toggle="dropdown" title="App Coming Soon !!"><i class="fa fa-mobile-phone colored"></i> App Coming Soon !!</a>
              </li>

            @if (Auth::check())
              
            @else

             <li>
                <a href="#" class="link_design" data-toggle="modal" data-target="#loginSignupModal"
                   title="SignUp or Login here">
                  <i class="fa fa-star colored"></i> Login/SignUp
                </a>
             </li>

            @endif

            </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
  @if (Session::has('flash_message'))
   <!-- Modal -->
          <div id="flash_message" class="modal fade" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title icon1">
                               Message from Local's Loop.....
                        </h4>
                      </div>
                       <div class="modal-body">
                       <p class="alert alert-danger">
                          <strong class="fa fa-warning"></strong>
                             {{  Session::get('flash_message') }}
                       </p>   
                       </div>
                    </div>
                </div>
           </div>
  <!-- Modal -->
@endif

  <!-- locationModal starts here -->
  <div class="modal fade" id="locationModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            Locality in Faridabad
          </h4>
        </div>
        <div class="modal-body">
          <p>
            
                <a href="{{{ asset('locality/India/Haryana/Faridabad/GreenFields Colony/'.md5(1)) }}}" 
                   class="colored link_design1">
                <i class="fa fa-map-marker colored"></i>  
                GreenFields Colony
                </a>
          </p>
        </div>
      </div>
      <!-- Modal content-->
    </div>
    <!--div class="modal-dialog"-->
  </div>
  <!-- locationModal ends here -->
  <!-- loginSignupModal starts here -->
  <div class="modal fade" id="loginSignupModal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
            Login Or SignUp
          </h4>
        </div>
        <div class="modal-body">
          
            
              {!! Form::open(array('url' => url('login'), 'method' => 'POST','class'=>'', 'role'=>'login')) !!}
                
                Login here <br>
                <input type="text" name="email" title="Email" style="display:block" 
                       class="form-control"  placeholder="Email"  required/>
                       
                <input type="password" name="password" title="Password" style="display:block"
                       class="form-control"  placeholder="Password"  required/>
                       
                <input type="radio" name="keep_me_logged_in" title="keep me logged in" 
                       class="form_element2" >
                Keep me logged in
                </input>
                
                
                <br>
                <button type="submit" class="btn btn-default btn-design colored">Login</button>
              {!! Form::close() !!}
               
              <hr> 
              
              <center>
                     <b>Or</b><br>
                     <a  class="btn btn-default btn-design colored" 
                         href="{{{ asset('/signup/') }}}">
                         SignUp
                     </a>
                   
              </center>
                        
              
                                            
          
        </div>
      </div>
      <!-- Modal content-->
    </div>
    <!--div class="modal-dialog"-->
  </div>
  <!-- loginSignupModal ends here -->

    @yield('jumbotron')
    @yield('body_main')

    <footer class="footer">
      <center>
            <pre>&copy; 2015. All Rights Reserved. <br>Designed by <a href="http://www.localsloop.com" target="_blank">localsloop</a>.</pre>
      </center>
    </footer>

   </body>
</html>   