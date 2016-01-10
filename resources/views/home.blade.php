@extends('layout') 

@section('meta_tags')

    <meta property="og:url"           content="http://www.localsloop.com/index.php" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Start Asking Your Neighbours | localsloop.com" />
    <meta property="og:description"   content="Local's loop is a location based Q&A platform that allows you to ask any sort of queries & get help from real people around you." />

@stop

@section('title')
          Start Asking Your Neighbours | localsloop.com
@stop

@section('css')
      <style>

      .search_div{
        background-color: rgba(255,255,255,0.3);
      }

      
      @media screen and (max-width: 785px) {
           .search_div{
              padding-left: 10%;
              padding-right: 10%;
           }
          } 
           
     </style>
  @stop

@section('jumbotron') 
       <div class="jumbotron">
        <br>
        <br>
        <h1 class="text-center icon2">
          <b class="fa fa-quote-left"></b>
            New in Locality
          <b class="fa fa-quote-right"></b>    
          <br>Start asking
           
        </h1>

        <div class="row">
             <div class="col-sm-4"></div>
             <div class="col-sm-4 search_div">
              {!! Form::open(array('url' => url('search'), 'method' => 'POST','class'=>'form_main', 'role'=>'Search')) !!}
               <hr>
               <span class="label label-default">Search</span>
               <div class="input-group">
                       <input type="text" class="form-control field1" value="GreenFields Colony" name="area" 
                              placeholder="Example, GreenFields Colony" title="Only active for GreenFields Colony" disabled/>
                       <span class="input-group-btn">
                           <a href="{{{ asset('locality/India/Haryana/Faridabad/GreenFields Colony/'.md5(1)) }}}" 
                              class="btn btn-default btn-design colored"
                                     type="button">Go!!</a>
                       </span>
               </div><!-- /input-group -->
               <br>
              {!! Form::close() !!}

              
              <h4 class="text-center icon2">
                         Locality Not Listed <b class="fa fa-question"></b><br>
                         Request Now
                         
              </h4>

              {!! Form::open(array('class'=>'form_main', 'role'=>'request')) !!}
               
               <div class="request-group" id="requestId">
                      <div id="errorDiv"></div>

                      <span class="label label-default">Email</span>
                      <input type="text" name="email" id="email" value="" 
                             title="Email" class="form-control form_elements field1"  
                             placeholder="Email"   required/>
                       
                      <span class="label label-default">Area</span>
                      <input type="text" class="form-control field1" value="" 
                             id="area" name="area" placeholder="Area ::Example, GreenFields Colony" required/>
                      
                      <span class="label label-default">City</span>
                      <input type="text" class="form-control field1" value="" 
                             id="city" name="city" placeholder="City :: Example, Faridabad" required/>
                      
                      <span class="label label-default">State</span>
                      <input type="text" class="form-control field1" value="" 
                             id="state" name="state" placeholder="State :: Example, Haryana" required/>
                      <br>
                      <button class="btn btn-default btn-design colored" 
                              type="button" onclick="send_request()">Request Now</button>
                                 
               </div><!-- /input-group -->
               <br>
              {!! Form::close() !!}

               
             </div>
             <div class="col-sm-4"></div>
        </div>
        <br>
        <h6 class="text-center">
        <b class="fa fa-quote-left"></b>
          localsloop.com is a location based Q&A platform that allows you to ask any sort of queries & get help from real people around you.
        <b class="fa fa-quote-right"></b>  
        </h6>
     </div>
@stop      

