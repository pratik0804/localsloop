$(window).load(function(){
    $('#flash_message').modal('show');
 });

        
  // handlers
function send_request()
      {
        
        var email = $("#email").val();  
        var area = $("#area").val(); 
        var city = $("#city").val(); 
        var state = $("#state").val();
   
        var postString_1 = email + ',' + area + ',' + city + ',' + state;

        var div_id = 'requestId';
        var element1 = document.getElementById( div_id );

        element1.style.opacity = "0.3";

        var img = document.createElement("img");
        img.src = "images/ajax-loader.gif";
        img.style.cssText = 'position:absolute;top:60%;left:47.5%;width:5%;';

        element1.appendChild(img);

        if ( email == '' || area == '' || city == '' || state == '' )
        {
           element1.removeChild(img);
           element1.style.opacity = "1";
           document.getElementById( "errorDiv" ).innerHTML = '<div class="alert alert-danger"> <strong class="fa fa-warning"></strong> All fields are mandatory. !!!</div>';
           return false;
        }

        $.post( 'request', { postData_1: postString_1 })
           .done(function( data ) {
               console.log(data,status);
               element1.removeChild(img);
               element1.style.opacity = "1";
               if ( data == 1 )
               {
                  document.getElementById( "email" ).value= "";
                  document.getElementById( "area" ).value= "";
                  document.getElementById( "city" ).value= "";
                  document.getElementById( "state" ).value= "";
                  document.getElementById( "errorDiv" ).innerHTML = '<div class="alert alert-success"> <strong class="fa fa-check-square-o"></strong> Request successfully submitted. !!!</div>';
               }
               else
               {
                 obj = JSON.parse(data);


                 if ( !(obj.email === undefined) )
                   {
                      txt = obj.email[0];
                   }
                 else if ( !(obj.area === undefined) )
                   {
                      txt = obj.area[0];
                   }
                 else if ( !(obj.city === undefined) )
                   {
                      txt = obj.city[0];
                   }
                 else if ( !(obj.state === undefined) )
                   {
                      txt = obj.state[0];
                   }
                               
                 document.getElementById( "errorDiv" ).innerHTML = '<div class="alert alert-danger"> <strong class="fa fa-warning"></strong>'+txt+'</div>';;
              }
            })
           .fail(function() {
               element1.removeChild(img);
               element1.style.opacity = "1";
               document.getElementById( "errorDiv" ).innerHTML = '<div class="alert alert-danger"> <strong class="fa fa-warning"></strong> Something went wrong. Please try again. !!!</div>';
           });

           
      }



