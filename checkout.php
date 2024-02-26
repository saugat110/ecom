<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51OlurjGvvwr5R3zGmyNsHSAthHD44GsGzS5IDQtQ02zUibvQjqb0cCibZ9ibtYXlG5mLkA411jkGbXqLEqUbEdlO009OAXTMKq";

\Stripe\Stripe::setApiKey($stripe_secret_key);


$lineItems = [];
foreach ($_SESSION['cart'] as $key => $value) {
    $lineItems[] = [
        "quantity" => 1, // You can adjust quantity as needed
        "price_data" => [
            "currency" => "NPR",
            "unit_amount" => $value['price'] * 100, // Convert price to cents
            "product_data" => [
                "name" => $value['pname']
            ]
        ]
    ];
}

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/new/ecom/success.php",
    "cancel_url" => "http://localhost/new/ecom/index.php",
    "locale" => "auto",
    "line_items" => $lineItems
]);

http_response_code(303);
echo "hi";
header("Location: " . $checkout_session->url);