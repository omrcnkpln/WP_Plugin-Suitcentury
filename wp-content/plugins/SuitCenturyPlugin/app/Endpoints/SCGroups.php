<?php

class SCGroups
{
    public $SCStatus;
    public $SCResponse;

    public function __construct()
    {
        $data = json_decode(file_get_contents('php://input'));

        if (isset($data->event_id) && isset($data->title) && isset($data->description)) {
            $DB = new DB();

            $process = $DB->insert($DB->SC_wpdb->prefix . "sc_groups",
                array("eventID", "title", "description"),
                array($data->event_id, $data->title, $data->description));

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
