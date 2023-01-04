<?php

class SCRegister
{
    public $SCStatus;
    public $SCResponse;

    public function __construct()
    {
        $json = json_decode(file_get_contents('php://input'));

        if (isset($json->username) && !empty($json->username) && isset($json->email) && !empty($json->email) && isset($json->password)) {
            $process = wp_create_user($json->username, $json->password, $json->email);

            if ($process->errors) {
                $this->SCStatus = false;

                $info = array(
                    "code" => $process->get_error_code(),
                    "message" => $process->get_error_message(),
                );
            }
            else {
                $this->SCStatus = true;

                $info = array(
                    "code" => "success",
                    "message" => "İşlem Başarılı",
                );
            }
        }
        else {
            $info = array(
                "SCStatus" => false,
                "errors" => "Bilgiler hatalı !"
            );
        }

        $this->SCResponse = $info;

        //$a = get_user_by("ID", "2");
        //$posts = get_posts($args);
    }
}
