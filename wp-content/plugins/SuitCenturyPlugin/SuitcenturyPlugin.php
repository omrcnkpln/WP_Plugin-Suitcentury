<?php

//require "vendor/autoload.php";

//add_action('rest_api_init', function () {
//    $dirname = dirname($_SERVER["SCRIPT_NAME"]);
//    $needle = "wp-json/sc/v1";
//    $root = $dirname . "/" . $needle . "/";
//    $request_uri = $_SERVER["REQUEST_URI"];
//    $accept = strpos($_SERVER["REQUEST_URI"], "wp-json/sc/v1");
//
//    $apiLink = str_replace($root, null, $request_uri);
//    $apiRoute = explode("/", trim($apiLink, "/"));
//    $type = $apiRoute[0];
//    $ID = $apiRoute[1];
//
//    if ($accept) {
//        if ($type == "users") {
//            register_rest_route("sc/v1", "users", [
//                "methods" => "GET",
//                "callback" => "sc_users"
//            ]);
//        }
//        else if ($type == "products") {
//            register_rest_route("sc/v1", "products", [
//                "methods" => "GET",
//                "callback" => "sc_posts"
//            ]);
//        }
//        else if ($type == "deneme") {
//            echo "yemez";
//        }
//        else {
//            echo "yemez";
//
//        }
////        $data = json_decode(file_get_contents('php://input'));
////        Helpers::SC_pr("merhaba");
//    }
//    else {
//        Helpers::SC_pr("sana");
//    }
//
//
//});


//function sc_users()
//{
//    $DB = new DB();
//    $users = $DB->SC_Select("users");
//
//    $args = [
//        "numberposts" => 9999,
//        "post-type" => "posts"
//    ];
//
//    $a = get_user_by("ID", "2");
//
////    $posts = get_posts($args);
//
////    $data = [];
//
////    $i = 0;
//
////    foreach ($posts as $post) {
////        $data[$i]["id"] = $post->ID;
////        $data[$i]["title"] = $post->post_title;
////        $data[$i]["content"] = $post->post_content;
////        $data[$i]["slug"] = $post->post_name;
////        $data[$i]["featured_image"]["thumbnail"] = get_the_post_thumbnail_url($post->ID, "thumbnail");
////        $data[$i]["featured_image"]["medium"] = get_the_post_thumbnail_url($post->ID, "medium");
////        $data[$i]["featured_image"]["large"] = get_the_post_thumbnail_url($post->ID, "large");
////
////        $i++;
////    }
//
////    return $data;
////    return $a;
//    return $users;
//}

//$DB = new DB();
//$users = $DB->SC_Select("users");
//$users = json_encode($users);
//Helpers::SC_pr($users);

//$SC_woo = new SCWoocommerceApi;
//$products = $SC_woo->SCgetValues("products");
//Helpers::SC_pr($products);

//    $customers = $SC_woo->SCgetValues("customers");
//    Helpers::SC_pr($customers);




//çalışırlar

//    $DB = new DB();
//    $users = $DB->SC_Select("users");
//    $users = json_encode($users);
//    Helpers::SC_pr($users);

//    $SC_woo = new SCWoocommerceApi;
//    $products = $SC_woo->SCgetValues("products");
//    Helpers::SC_pr($products);

//    $customers = $SC_woo->SCgetValues("customers");
//    Helpers::SC_pr($customers);

//include 'SuitcenturyPlugin.php';


//    $SC_woo = new SCWoocommerceApi;
//    $products = $SC_woo->SCgetValues("products");
//    Helpers::SC_pr($products);

//    $customers = $SC_woo->SCgetValues("customers");
//    Helpers::SC_pr($customers);




