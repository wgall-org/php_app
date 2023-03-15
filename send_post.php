<?php
require('vendor/autoload.php');
use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');



use Symfony\Component\HttpClient\HttpClient;
function send_request($array) {
    $token = $_ENV['TOKEN'];
    $message = "";
    foreach ($array as $country)
    {
        $message=$message."$country;";
    }
    $message = substr($message,0,strlen($message)-1);
    

    $httpClient = HttpClient::create();
    $httpClient->request('POST', 'https://api.github.com/repos/wgall/pipetest/dispatches', [

        'headers' => [
            'Authorization' => "token $token",
            'Accept' => 'application/vnd.github+json'
        ],
        'body' => '{"event_type": "webhook","client_payload": {"message": "'.$message.'"}'
    ]);


}
?>