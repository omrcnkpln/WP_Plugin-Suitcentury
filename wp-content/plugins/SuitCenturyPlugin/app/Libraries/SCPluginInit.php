<?php

class SCPluginInit
{
    function __construct()
    {
        //Hooks
        add_action("admin_menu", array($this, "SuitcenturyPluginAdminMenu"));
        add_action("rest_api_init", array($this, "StartCustomRestApi"));
    }

    //Eklentiyi menüye ekle | callback çağır
    function SuitcenturyPluginAdminMenu()
    {
        add_menu_page("SC Plugin", "SC Plugin Settings", "manage_options", "sc-settings", array($this, "SCPluginView"));
    }

    //Eklenti ayar sayfası
    function SCPluginView()
    {
        $SCDir = WP_PLUGIN_DIR . '/SuitCenturyPlugin/';

        include $SCDir . 'app/Includes/PluginSettingsView.php';
    }

    //Endpoint tanımlanması | servisin çağırılması
    function StartCustomRestApi()
    {
        $dirname = dirname($_SERVER["SCRIPT_NAME"]);
        $needle = "wp-json/sc/v1";
        $root = ltrim($dirname . "/" . $needle . "/", "\\");

        $request_uri = $_SERVER["REQUEST_URI"];
        $accept = strpos($request_uri, "wp-json/sc/v1");

        $apiLink = str_replace($root, null, $request_uri);
        $apiRoute = explode("/", trim($apiLink, "/"));
        $type = $apiRoute[0];
        $ID = $apiRoute[1];

        if ($accept) {
            //login endpoint
            if ($type == "login") {
                register_rest_route("sc/v1", "login", [
//                    "methods" => WP_REST_Server::ALLMETHODS,
                    "methods" => "POST",
                    "callback" => array($this, "sc_login")
                ]);
            }
            //register endpoint
            else if ($type == "register") {
                register_rest_route("sc/v1", "register", [
//                    "methods" => WP_REST_Server::ALLMETHODS,
                    "methods" => "POST",
                    "callback" => array($this, "sc_register")
                ]);
            }

            //events endpoint
            else if ($type == "events") {
                if (!isset($ID)) {
                    register_rest_route(
                        "sc/v1", "events", [
//                        "methods" => WP_REST_Server::ALLMETHODS,
                        "methods" => "POST",
                        "callback" => array($this, "sc_events")
                    ]);
                }
                else {
                    register_rest_route("sc/v1", "events/" . $ID, [
                        "methods" => WP_REST_Server::ALLMETHODS,
                        "callback" => array($this, "sc_events_get"),
                        "args" => array($ID),
                    ]);
                }
            }
            //groups endpoint
            else if ($type == "groups") {
                if (!isset($ID)) {
                    register_rest_route(
                        "sc/v1", "groups", [
                        "methods" => "POST, GET",
                        "callback" => array($this, "sc_groups")
                    ]);
                }
            }
            else {
                echo "yemez";
            }
        }
        else {
//            Helpers::SC_pr("route bulunamadı");
        }
    }

    function sc_login()
    {
        $response = new SCLogin();

        if ($response->SCStatus) {
            echo json_encode($response->SCResponse);
        }
        else {
            return new WP_Error($response->SCResponse["code"], $response->SCResponse["message"], array('status' => 400));
        }
    }

    function sc_register()
    {
        $response = new SCRegister();

        if ($response->SCStatus) {
            echo json_encode($response->SCResponse);
        }
        else {
            return new WP_Error($response->SCResponse["code"], $response->SCResponse["message"], array('status' => 400));
        }
    }

    function sc_products()
    {
        $response = new SCProducts();
    }

    function sc_events_get(WP_REST_Request $prm)
    {
        $ID = $prm->get_attributes()["args"][0];
        $response = new SCEventsGet($ID);

        if ($response->SCStatus) {
            echo json_encode($response->SCResponse);
        }
        else {
            return new WP_Error($response->SCResponse["code"], $response->SCResponse["message"], array('status' => 400));
        }
    }

//    function sc_events(WP_REST_Request $request)
    function sc_events()
    {
//        apply_filters('rest_allowed_cors_headers', "application/json");

//        $parameters = $request->get_json_params();
//        $parameters = $request->get_url_params();
//        $parameters = $request->get_query_params();
//        $parameters = $request->get_body_params();
//        $parameters = $request->get_default_params();
//        pr($parameters);

//        $headers = getallheaders();
//        pr(json_encode($headers));
//        $origin = get_http_origin();
//        echo $origin;

//        if ($origin === 'http://phpprojects:8064') {
//            header("Access-Control-Allow-Origin: http://phpprojects:8064");
//            header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
//            header("Access-Control-Allow-Credentials: true");
//            header('Access-Control-Allow-Headers: Origin, X-Requested-With, X-WP-Nonce, Content-Type, Accept, Authorization');
//            pr($_SERVER['REQUEST_METHOD']);
//
//            if ('OPTIONS' == $_SERVER['REQUEST_METHOD']) {
//                status_header(200);
//                exit();
//            }
//        }

//        $response = new SCEvents();
//
//        if ($response->SCStatus) {
//            echo json_encode($response->SCResponse);
//        }
//        else {
//            return new WP_Error($response->SCResponse["code"], $response->SCResponse["message"], array('status' => 400));
//        }
    }

    function sc_groups()
    {
        $response = new SCGroups();

        if ($response->SCStatus) {
            echo json_encode($response->SCResponse);
        }
        else {
            return new WP_Error($response->SCResponse["code"], $response->SCResponse["message"], array('status' => 400));
        }
    }
}
