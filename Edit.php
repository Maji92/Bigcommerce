<?php
$id = $_GET['id'];
//echo $id;


$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.bigcommerce.com/stores/mum1a5ez51/v3/catalog/products/".$id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PUT",
  // CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/json",
    "X-Auth-Token: lwhxpyd2zt1gqg6yyhhkm3twjjatvzu"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // echo $response;
   $data = json_decode($response, true);


      $name = $data['data']['name'];
      $price = $data['data']['price'];
      $weight = $data['data']['weight'];
      $type = $data['data']['type'];
      $description = $data['data']['description'];

        						
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bigcommerce API</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    .form-control {
    display: block;
    width: 40%;
    /*height: 34px;*/
  }
  </style>
</head>
<body>

<div class="jumbotron text-center">
  <h1>BIGCOMMERCE API  MANIPULATION</h1>
  <p> <u><h3>Edit A Product Using API</h3></u></p> 
</div>
  
<div class="container" > 
  <div class="text-center"><T2> <u><b>UPDATE PRODUCT FORM</b></u></T2></div>
<form action="" method="POST" >
	<div class="form-group">
    <label for="exampleInputEmail1">Product ID:</label>
    <input type="text" class="form-control" id="id"  name="id" aria-describedby="" placeholder="Enter Product Name" value="<?php echo $id ; ?>" readonly="">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Product Name:</label>
    <input type="text" class="form-control" id="name"  name="name" aria-describedby="" placeholder="Enter Product Name" value="<?php echo $name; ?>" required>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price:</label>
    <input type="number" class="form-control" id="Price"  name="Price" value="<?php echo $price; ?>" placeholder="Product Price" required>
  </div>
  <div class="form-check">
    <label for="exampleInputPassword1">Categories:</label>
    <input type="number" class="form-control"  name="categories" id="categories" value='23' required readonly="">
    <!-- label class="form-check-label" for="exampleCheck1">Check me out</label> -->
  </div>

  <div class="form-check">
    <label for="exampleInputPassword1">Weight:</label>
    <input type="number" class="form-control" name="weight" id="weight" value="<?php echo $weight; ?>" required>
    <!-- label class="form-check-label" for="exampleCheck1">Check me out</label> --> 
  </div>
    <div class="form-check">
      <label for="exampleInputPassword1">Type:</label>
    <input type="text" class="form-control" name="type" id="type" value="<?php echo $type; ?>" required>
    <label class="form-check-label text-danger" for="exampleCheck1">Please write the type only "physical/digital"</label> 
  </div>
  <div class="form-check">

      <label for="exampleInputPassword1">Description:</label>
      <textarea  class="form-control " id="description" name="description" rows="4" cols="50"><?php echo $description; ?></textarea>
  </div>
  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
  
</form> <br>
	<button onclick="addProductData();" class="btn btn-warning" >Click on It !</button><br><br>
  <div class="row">
  </div>
</div>

 <script type="text/javascript">
 	
function addProductData(){
        var data = {
                    name: $('#name').val(),
                    Price: $('#Price').val(),
                    categories: $('#categories').val(),
                    weight: $('#weight').val(),
                    type: $('#type').val(),
                    description: $('#description').val(),
                    id:$('#id').val(),
                  };


                	$.ajax({
            url: "Data-1.php",
            type: 'POST',
            data: data,
            //contentType: false,
            //processData: false,
            success: function(data) {
                console.log(data);
                response=JSON.parse(data);
                console.log(response);
                
                if (!response.errors || Object.keys(response.errors).length === 0) {
                    if(confirm("Product Edit Successfully!! Please check OK for view.")){
                       window.location.href= "fetch.php";
                    }
                }else{
                  var errorMessage =[];
                  var myObject =[response.errors.name,response.errors.price,response.errors.type,response.errors.weight];
                  // errorMessage.push(myObject);
                  console.log(myObject);

                    myObject.forEach(function (error, index) {
                        if (error) {                             
                        errorMessage.push("=> "+myObject[index]);
                        }
                    });

                  if (errorMessage.length > 0) {
                    alert( errorMessage.join("\n")); 
                  }
                 
                }

                    

            }
        });
    	
 	}
 </script>
</body>
</html>

