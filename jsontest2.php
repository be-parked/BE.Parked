<?php

$hello = "hello world";
$product_arr = array(
    "id" =>  1,
    "name" => 'kevin',
    "description" => 'boy',
    "price" => '~',
    "category_id" => '1',
    "category_name" => 'student'
 
);
print_r(json_encode($product_arr));

