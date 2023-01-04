<?php

class SCEventsGet
{
    public $SCStatus;
    public $SCResponse;

    public function __construct($prm)
    {
        $DB = new DB();
        $process = $DB->select($DB->SC_wpdb->prefix . "sc_events", array("userID"), array($prm), "", 1)[0];

        if ($process) {
            $this->SCStatus = true;

            $values = array(
                "state" => $process["event_state"],
                "date" => $process["event_date"],
            );

            $info = array(
                "code" => "success",
                "message" => "İşlem Başarılı",
                "values" => $values
            );
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
