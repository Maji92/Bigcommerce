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
  <p> <u><h3>Create A Product Using API</h3></u></p> 
</div>
  
<div class="container" > 
  <div class="text-center"><T2> <u><b>ADD PRODUCT FORM</b></u></T2></div>
<form action="" method="POST" >
  <div class="form-group">
    <label for="exampleInputEmail1">Product Name:</label>
    <input type="text" class="form-control" id="name"  name="name" aria-describedby="" placeholder="Enter Product Name" required>
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price:</label>
    <input type="number" class="form-control" id="Price"  name="Price" placeholder="Product Price" required>
  </div>
  <div class="form-check">
    <label for="exampleInputPassword1">Categories:</label>
    <input type="number" class="form-control"  name="categories" id="categories" value='23' required readonly="">
    <!-- label class="form-check-label" for="exampleCheck1">Check me out</label> -->
  </div>

  <div class="form-check">
    <label for="exampleInputPassword1">Weight:</label>
    <input type="number" class="form-control" name="weight" id="weight" required>
    <!-- label class="form-check-label" for="exampleCheck1">Check me out</label> --> 
  </div>
    <div class="form-check">
      <label for="exampleInputPassword1">Type:</label>
    <input type="text" class="form-control" name="type" id="type" required>
    <label class="form-check-label text-danger" for="exampleCheck1">Please write the type only "physical/digital"</label> 
  </div>
  <div class="form-check">

      <label for="exampleInputPassword1">Description:</label>
      <textarea  class="form-control " id="description" name="description" rows="4" cols="50"></textarea>
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
                  };
    	$.ajax({
            url: "Data1.php",
            type: 'POST',
            data: data,
            //contentType: false,
            //processData: false,
            success: function(data) {
                console.log(data);
                response=JSON.parse(data);
                console.log(response);
                
                if (!response.errors || Object.keys(response.errors).length === 0) {
                    if(confirm("Product Added Successfully!! Please check OK for view.")){
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
                // if(response.status == 200){
                //      console.log(response);
                //     //confirm("Product Added Successfully!! Please check OK for view.")
                //   if(confirm("Product Added Successfully!! Please check OK for view.")){
                //   window.location.href= "fetch.php";
                //   }
                  
                // }
                // else{
                //   var errorMessage =[];
                //   var myObject =[response.errors.name,response.errors.price,response.errors.type,response.errors.weight];
                //   // errorMessage.push(myObject);
                //   console.log(myObject);
                //   // alert(response.errors.name);
                //     myObject.forEach(function (error, index) {
                //         if (error) { 
                            
                //         errorMessage.push("=> "+myObject[index]);
                //         }
                //     });

                //   if (errorMessage.length > 0) {
                //    // alert("Error(s):\n" + errorMessage.join("\n"));
                //     alert( errorMessage.join("\n")); 

                //   }
                //  // window.location.reload();
                // }
                
                    

            }
        });
 	}
 </script>
</body>
</html>

