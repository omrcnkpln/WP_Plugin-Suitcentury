<?php
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: *");

class SCLogin
{
    public $SCStatus;
    public $SCResponse;

    public function __construct()
    {
        $data = json_decode(file_get_contents('php://input'));

        if (isset($data->email) && !empty($data->email) && isset($data->password)) {
            $process = wp_authenticate($data->email, $data->password);

            if ($process->errors) {
                $info = array(
                    "code" => $process->get_error_code(),
                    "message" => $process->get_error_message(),
                );
            }
            else {
                $this->SCStatus = true;
                $hash = new SCHash();

                date_default_timezone_set('Europe/Istanbul');
                $timeout = time() + (10);

                //$exp = date("Y-m-d H:i:s", $timeout);
                $exp = $timeout;
                //$iat = time();

                $iss = site_url();

                $user = array(
                    "id" => 1
                );

                $data = array(
                    "user" => $user
                );

                $payload = array(
                    "email" => $data->email,
                    "iss" => $iss,
                    "exp" => $exp,
                    "data" => $data
                );

                $jwt = $hash->SCEncode($payload);

                $values = array(
                    "nicename" => $process->data->user_nicename,
                    "email" => $process->data->user_email
                );

                $info = array(
                    "code" => "success",
                    "message" => "İşlem Başarılı",
                    "token" => $jwt,
                    "values" => $values
                );
            }
        }
        else {
            $this->SCStatus = false;

            $info = array(
                "code" => "wrong_credentials",
                "message" => "Gönderilen bilgiler hatalı !"
            );
        }

        $this->SCResponse = $info;
        //$users = $DB->select($DB->SC_wpdb->prefix . "users");
        //$a = get_user_by("ID", "2");
        //$posts = get_posts($args);
    }
}
