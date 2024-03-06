<?php
require 'vendor/autoload.php';
// $api_token = "";
$url = "http://127.0.0.1:8000/api/";

use GuzzleHttp\Client;

$client = new Client(['base_uri' => $url]);

$headers = [
    'auth' => ['admin@admin.com', 'password'],
    'Accept' => 'application/json',
];

$response = $client->request('GET', 'companies', [
    'auth' => ['admin@admin.com', 'password'],
    // 'headers' => $headers,
    // 'debug' => true
]);

$result = json_decode($response->getBody()->getContents(), true);

// $client = new GuzzleHttp\Client();
// $res = $client->request('GET', $url.'companies', [
//     'auth' => ['admin@admin.com', 'password']
// ]);
// echo $res->getStatusCode();
// // "200"
// echo $res->getHeader('content-type')[0];
// // 'application/json; charset=utf8'
// echo $res->getBody();
// // {"type":"User"...'

// // // Send an asynchronous request.
// $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
// $promise = $client->sendAsync($request)->then(function ($response) {
//     echo 'I completed! ' . $response->getBody();
// });
// $promise->wait();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach ($result['data'] as $company) : ?>
    <ul>
        <li>Name : <?= $company['name']  ?></li>
        <li>Name : <?= $company['email']  ?></li>
        <li>Name : <?= $company['address']  ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>