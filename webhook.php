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
  <p> <u><h3>Create A Webhook Using API</h3></u></p> 
</div>
  
<div class="container">
	<button onclick="fetchData();" class="btn btn-warning">Click on It !</button><br><br>
  <div class="row">
      
  </div>
</div>
 <script type="text/javascript">
 	
function fetchData(){
	// console.log("here");
	var scope ='store/order/updated';
	var destination = 'https://store-mum1a5ez51.mybigcommerce.com/webhooks';
	var is_active = true;
	
	$.ajax({
            url: "Data.php?method=Create_webhook",
            type: 'POST',
            // data:{ data_1: scope, data_2: destination, data_3: is_active},
            success: function(data) {
                console.log(data);
                // response=JSON.parse(data);
                // console.log(response.data);
    //             response.data.forEach((item, index) => {
				//     $("#a").append(`
			 //        	<tr>
				//             <td>${item.name}</td>
				//             <td>${item.id}</td>
				//             <td>${item.platform}</td>
				//             <td>${item.type}</td>
				//             <td>${item.status}</td>
			 //        	</tr>
				//     `);
				// });
            }
        });
 	}
 </script>
</body>
</html>

