<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LL_REQUEST;
use App\Http\Controllers\Controller;
use Validator;

class requestController extends Controller
{
    
  public function postRequest() {

     if (\Request::ajax())
      { 
            if (\Auth::check()) 
            {
            } 

            else
            {
                  $postData = $_POST['postData_1'];
                  
                  $myPostDataArray = explode(',', $postData);

                  $email = $myPostDataArray[0];
                  $area  = $myPostDataArray[1];
                  $city  = $myPostDataArray[2];
                  $state = $myPostDataArray[3];

                  $postDataValidate = array(
                        'email' =>  $email ,
                        'area'  =>  $area  ,
                        'city'  =>  $city  ,
                        'state' =>  $state
                   );


                  
                  $rules = array(
                                    'email' => 'required|email|max:50|min:2',
                                    'area' => 'required|max:50|min:2',
                                    'city' => 'required|max:50|min:2',
                                    'state' => 'required|max:50|min:2'
                                );



                  $validator = Validator::make($postDataValidate, $rules);

                  if ($validator->fails()) 
                   {
                   	   
                   	  return $validator->errors()->toJson();
                   }
                   

                  $ll_request =  LL_REQUEST::create([
                      'LL_R_EMAIL' => $email,
                      'LL_R_STATE' => $state,
                      'LL_R_CITY'  => $city,
                      'LL_R_AREA'  => $area
                  ]);


        	      return 1;
        
             }//else if (\Auth::check())
      }//if (\Request::ajax())

     else
      {
       	//redirect to home page with error
      }
         
            

   }//public function postRequest() {

}
