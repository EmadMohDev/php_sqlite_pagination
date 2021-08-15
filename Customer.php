<?php

require 'vendor/autoload.php';

use App\SQLiteConnection;
use App\Countries ;
use App\Pagination ;


try {

    $pdo = (new SQLiteConnection())->connect();


     // Instantiate the Pagination
  if (isset($_GET['page']) && $_GET['page']!="") {
    $page = $_GET['page'];
    } else {
        $page = 1;
        }

 $CountriesClass =  (new Countries()) ;
 $unique_countries =  $CountriesClass->get_countries()  ;


        // Get the total number of records
$query1 = "SELECT count(*)  FROM customer" ;
$query2 = "SELECT  * FROM customer" ;

 $append_search_parameters = "";
  if(isset($_REQUEST['country'])  && $_REQUEST['country'] != "" )  {
    $search_country =  $unique_countries[$_REQUEST['country']]    ;
     $search_country_code = str_replace( '+', '', $search_country["country_code"]);
    
      $query1 .=" WHERE phone LIKE  '($search_country_code)%'" ;
       $query2 .=" WHERE phone LIKE  '($search_country_code)%'" ;
           $append_search_parameters = "&country=".$_REQUEST['country']  ;

     }


  if(isset($_REQUEST['valid']) && $_REQUEST['valid'] != "" )  {
    $append_search_parameters .= "&valid=".$_REQUEST['valid']  ;

  }



$totalRecords = $pdo->query($query1)->fetch(PDO::FETCH_COLUMN);


$pagination = new Pagination( $page , $totalRecords, 5);

// set records or rows of data per page
$recordsPerPage = $pagination->getRecordsPerPage() ;

$offset = $pagination->offset() ;


// Get records using the pagination
$sth = $pdo->prepare($query2.' LIMIT :offset, :records');
$sth->bindValue(':offset', $offset, PDO::PARAM_INT);
$sth->bindValue(':records', $recordsPerPage, PDO::PARAM_INT);
$sth->execute();
$customers = $sth->fetchAll(PDO::FETCH_OBJ);


$result_html = "" ;




foreach ($customers as $customer) {

     $countries  =  $CountriesClass->checkPhoneValid($customer->phone)  ;

        if(isset($_REQUEST['valid']) && $_REQUEST['valid'] != "" )  {
          if(  $countries['valid'] !=  $_REQUEST['valid'] ){
            continue ;
          }
    

    }

  $customer_html =  "<tr>
        <td>".$countries['country']."</td>
        <td>".$countries['valid']."</td>
        <td>".$countries['country_code']."</td>
        <td>".$countries['phone']."</td>
  </tr>" ;

   $result_html = $result_html.$customer_html ;
   

}
    
} catch (Exception $e) {
 echo  $e->getMessage() ;  
}




  

 $countries_options = "";
 foreach ($unique_countries as $unique_country) {
 $selected = (isset($_REQUEST['country'])  &&  $_REQUEST['country'] == $unique_country['country'] )?"selected" :"" ;

  $countries_options .= " <option value='".$unique_country['country'] ."'   ".$selected ." > ".$unique_country['country']  ."</option>" ;

}

 $valid_options_array= [
"NOK"=>"No" ,
"OK"=>"Yes" ,

 ];

 $valid_options = "";



 foreach ($valid_options_array as $value=> $valid_option) {
 $valid_selected = (isset($_REQUEST['valid'])  &&  $_REQUEST['valid'] == $value )?"selected" :"" ;

  $valid_options .= " <option value='".$value."'   ".$valid_selected ." > ".$valid_option ."</option>" ;

}



?>
