<?php

class SCEvents
{
    public $SCStatus;
    public $SCResponse;

    public function __construct()
    {
        $data = json_decode(file_get_contents('php://input'));

        if (isset($data->user_id) && isset($data->state) && isset($data->date)) {
            $DB = new DB();

//            burada extra kontrol etmeye gerek yok eklenti kontrolleri yapıyor zaten
//            $headers = getallheaders();
//            if (!empty($headers["Authorization"])) {
//                $token = $headers["Authorization"];
//
//                $auth = $token;
//                $token = trim(str_replace("Bearer", null, $auth));
//
//                $hash = new SCHash();
//                $a = $hash->SCDecode($token);
//            }

            $process = $DB->insert($DB->SC_wpdb->prefix . "sc_events",
                array("userID", "event_state", "event_date"),
                array($data->user_id, $data->state, $data->date));

            if ($process) {
                $this->SCStatus = true;

                $info = array(
                    "code" => "success",
                    "message" => "İşlem Başarılı",
                );
            }
            else {
                $this->SCStatus = false;

                $info = array(
                    "code" => "basarisiz_islem",
                    "message" => "Bilgiler yazılırken bir hata ile karşılaşıldı :/",
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
    }
}
