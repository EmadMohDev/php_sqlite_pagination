<?php
namespace App;

class Countries 
{

   public function get_countries()
   {


    $countries = array();
    /*
    Regular expressions to validate the numbers:
      Cameroon | Country code = +237 | regex = \(237\)\ ?[2368]\d{7,8}$
      Ethiopia | Country code = +251 | regex = \(251\)\ ?[1-59]\d{8}$
      Morocco | Country code = +212 | regex = \(212\)\ ?[5-9]\d{8}$
      Mozambique | Country code = +258 | regex = \(258\)\ ?[28]\d{7,8}$
      Uganda | Country code = +256 | regex = \(256\)\ ?\d{9}$

    */


// array of given data 
    $all_countries["Cameroon"]=[
      "country"=>"Cameroon",
      "country_valid"=>"/\(237\)\ ?/" ,
      "phone_valid"=> "/\(237\)\ ?[2368]\d{7,8}$/" ,
      "country_code"=>"+237"
    ] ;

        $all_countries["Ethiopia"]=[
      "country"=>"Ethiopia",
      "country_valid"=>"/\(251\)\ ?/",
      "phone_valid"=> "/\(251\)\ ?[1-59]\d{8}$/" ,
      "country_code"=>"+251"
    ] ;

        $all_countries["Morocco"]=[
       "country"=>"Morocco",
      "country_valid"=>"/\(212\)\ ?/",
      "phone_valid"=> "/\(212\)\ ?[5-9]\d{8}$/",
      "country_code"=>"+212"
    ] ;

        $all_countries["Mozambique"]=[
      "country"=>"Mozambique",
      "country_valid"=>"/\(258\)\ ?/" ,
      "phone_valid"=> "/\(258\)\ ?[28]\d{7,8}$/",
      "country_code"=>"+258"
    ] ;

        $all_countries["Uganda"]=[
      "country"=>"Uganda",
      "country_valid"=>"/\(256\)\ ?/" ,
      "phone_valid"=> "/\(256\)\ ?\d{9}$/",
      "country_code"=>"+256"
    ] ;

    return  $all_countries ;
      
   }



function checkPhoneValid($phone)
{

 
  $all_countries = $this->get_countries() ;

   $countries = array();
   $countries["phone"]  = preg_replace('/^\(\d{3}\)/', '', $phone);



foreach ($all_countries as $key => $all_country) {
      if(preg_match($all_country["country_valid"], $phone) &&  $key  ==   $all_countries[$key]['country']) {
        $countries["country"] = $key;
        $countries["country_code"] = $all_country["country_code"];
         if(preg_match($all_country["phone_valid"], $phone)) {
            $countries["valid"] = "OK";
        }else{
            $countries["valid"] = "NOK";
        }
   }
 
}


    return $countries;

}


   


}