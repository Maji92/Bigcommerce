<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $Price = isset($_POST['Price']) ? $_POST['Price'] : '';
  $categories = isset($_POST['categories']) ? $_POST['categories'] : '';
  $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
  $type = isset($_POST['type']) ? $_POST['type'] : '';
  $description = isset($_POST['description']) ? $_POST['description'] : '';
  $id = isset($_POST['id']) ? $_POST['id'] : '';  
  // echo $name;

}



$curl = curl_init();

$productfields = [
      'name' => $name,
      'price' => $Price,
          'categories' =>[
            $categories
          ],
      'weight' => $weight,
      'type' => $type,
      'description' => $description
    ];

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.bigcommerce.com/stores/mum1a5ez51/v3/catalog/products/".$id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PUT",
  CURLOPT_POSTFIELDS => json_encode($productfields, true),
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
  echo $response;
}
 ?>