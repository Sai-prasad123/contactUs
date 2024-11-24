<?php

switch($_SERVER['REQUEST_METHOD']){
    case("OPTIONS"): //Allow preflighting to take place.
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: content-type");
        exit;
    case("POST"): //Send the email;
        header('Access-Control-Allow-Origin: *');

        $json = file_get_contents('php://input');

        $params = json_decode($json);

        $email = $params->Email;
        $fullName = $params->Name;
        $websiteUrl = $params->Page;
        $mobile = $params->Mobile;
        $description = $params->Description;


  $message .= "\n--------USER DETAILS--------\n";
  $message .= "Name: " .$fullName. "\n";
  $message .= "Email: " .$email. "\n";
  $message .= "Phone Number: " .$mobile. "\n";
  $message .= "WebsiteUrl: " .$websiteUrl. "\n";
  $message .= "Description: " .$description. "\n";
  $email1='saiprasadgedala@gmail.com';

        $recipient = 'saiprasadgedala@gmail.com';
        $subject = 'new message';
        $headers = "From: $fullName <$email1>";

        mail($recipient, $subject, $message, $headers);
         break;
    default: //Reject any non POST or OPTIONS requests.
        header("Allow: POST", true, 405);
        exit;
}
