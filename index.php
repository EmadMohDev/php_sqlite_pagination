<?php
include("Customer.php") ;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

 <div class="container">

<h2>Phone Numners </h2>

<form action="">
  <select name="country" id="country" style="width:245px" onchange="this.form.submit()"  >
      <option value=""> Select Country</option>
    <?php  echo  $countries_options ?> 
  </select>

  <select name="valid" id="valid" style="width:245px ; margin-left: 60px;"  onchange="this.form.submit()" >
    <option value="">  Select valid phone numbers </option>
     <?php  echo  $valid_options ?> 
  </select>

  <br><br>

</form>

<table>
  <tr>
    <th>Country</th>
    <th>State</th>
     <th>Country Code</th>
    <th>Phone num</th> 
  </tr>

<?php  echo  $result_html ;?>

</table>


<?php echo $pagination->nav($append_search_parameters); ?>


</div>

</body>

</html>
