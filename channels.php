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
  <p> <u><h3>Retrive List Of All Chanels</h3></u></p> 
</div>
  
<div class="container">
	<button onclick="fetchData();" class="btn btn-warning">Click on It !</button><br><br>
  <div class="row">
      <table class="table ">
	    <thead>
	      <tr>
	        <th class="success">|| Channel Name  ||</th>
	        <th class="success">|| Channel Id  ||</th>
	        <th class="success">|| Platform  ||</th>
	        <th class="success">|| Type  ||</th>
	        <th class="success">|| Status ||</th>
	      </tr>
	    </thead>
	    <tbody id="a">
	      
	    </tbody>
  </table>
  </div>
</div>
 <script type="text/javascript">
 	
function fetchData(){
	// console.log("here");
	$.ajax({
            url: "Data.php?method=fetch_all_channels",
            type: 'GET',
            success: function(data) {
                // console.log(data);
                response=JSON.parse(data);
                console.log(response.data);
                response.data.forEach((item, index) => {
				    $("#a").append(`
			        	<tr>
				            <td>${item.name}</td>
				            <td>${item.id}</td>
				            <td>${item.platform}</td>
				            <td>${item.type}</td>
				            <td>${item.status}</td>
			        	</tr>
				    `);
				});
            }
        });
 	}
 </script>
</body>
</html>

