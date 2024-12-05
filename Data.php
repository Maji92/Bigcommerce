<?php

// print_r($_POST);
// exit;
if (isset($_GET['method']) && $_GET['method'] == 'fetch_all_product') {

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.bigcommerce.com/stores/mum1a5ez51/v3/catalog/products",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
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

} elseif (isset($_GET['method']) && $_GET['method'] == 'fetch_all_channels') {

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.bigcommerce.com/stores/mum1a5ez51/v3/channels",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
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

} elseif (isset($_POST['method']) && $_POST['method'] == 'Create_webhook') {

    // $curl = curl_init();
    // // $scope = $_REQUEST['data_1'];
    // // $destination = $_REQUEST['data_2'];
    // // $is_active = $_REQUEST['data_3'];

    // // echo $scope;

    // $datafields = [
    //     "scope" => "store/order/updated",
    //     "destination" => "https://mybigcommerce1.com/webhooks",
    //     "is_active" => true,
    //     "headers" => [
    //         "X-Auth-Token: lwhxpyd2zt1gqg6yyhhkm3twjjatvzu"
    //     ]

    // ];

    // curl_setopt_array($curl, [
    //     CURLOPT_URL => "https://api.bigcommerce.com/stores/mum1a5ez51/v3/hooks",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "POST",
    //     CURLOPT_POSTFIELDS => json_encode($datafields),
    //     CURLOPT_HTTPHEADER => [
    //         "Accept: application/json",
    //         "Content-Type: application/json",
    //         "X-Auth-Token: lwhxpyd2zt1gqg6yyhhkm3twjjatvzu"
    //     ],
    // ]);

    // $response = curl_exec($curl);
    // $err = curl_error($curl);

    // curl_close($curl);

    // if ($err) {
    //     echo "cURL Error #:" . $err;
    // } else {
    //     echo $response;
    // } 
    
}elseif(isset($_POST['method']) && $_POST['method'] == 'Create_product'){
    //https://api.bigcommerce.com/stores/[store_hash]/v3/catalog/products
    //echo "Product";
    exit;
    $curl = curl_init();
    $productfields = [
      'name' => 'Product-1',
      'price' => '500',
          'categories' =>[
            1
          ],
      'weight' => 4,
      'type' => 'physical'
    ];
    curl_setopt_array($curl, [
      CURLOPT_URL => "https://api.bigcommerce.com/stores/mum1a5ez51/v3/catalog/products",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS =>json_encode($productfields, true),
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

}
?>
