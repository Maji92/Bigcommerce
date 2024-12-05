

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bigcommerce API</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="jumbotron text-center">
  <h1>BIGCOMMERCE API  MANIPULATION</h1>
  <p> <u><h3>Retrive All The Products</h3></u></p> 
</div>

<div class="container">
	  <?php

if(isset($_GET['id'])){
echo "<h2 style='color:red; text-align:center;'>The Product ID: ".$_GET['id']." is Deleted.</h2>";
}
?>
	<br> <button onclick="fetchData();" class="btn btn-warning">Sync New Data!!</button><br><br>
  <div class="row">
      <table class="table ">
	    <thead>
	      <tr>
	        <th class="success">Name  ||</th>
	        <th class="success">Id  ||</th>
	        <!-- <th class="success">SKU  ||</th> -->
	        <th class="success">Description ||</th>
	        <th class="success">Action</th>
	      </tr>
	    </thead>
	    <tbody id="ad">
	      
	    </tbody>
  </table>
  </div>
</div>
 <script type="text/javascript">

$( document ).ready(function() {
  fetchData();
});

 	
function fetchData(){
	// console.log("here");
	$.ajax({
            url: "Data.php?method=fetch_all_product",
            type: 'GET',
            success: function(data) {
                // console.log(data);
                response=JSON.parse(data);
                console.log(response.data);
                response.data.forEach((item, index) => {
				    // $("#a").append(`<p>${item.name}</p>`);  <td>SKU:${item.sku}</td>
				    $("#ad").append(`
			        	<tr>
				            <td>${item.name}</td>
				            <td>ID:#${item.id}</td>
				            
				            <td style='width:50%'>${item.description}</td>
				            <td style='width:50%'><a href='Delete.php?id=${item.id}' class='btn btn-danger'>Delete</a> <br><br>
				            <a href='Edit.php?id=${item.id}' class='btn btn-primary'>Edit</a></td>
				            
			        	</tr>
				    `);
				});
            }
        });
 	}
 </script>
</body>
</html>

