<?php

class SCProducts
{
    public function __construct()
    {
        $DB = new DB();
        $users = $DB->SC_Select("users");

        $args = [
            "numberposts" => 9999,
            "post-type" => "posts"
        ];

        $a = get_user_by("ID", "2");
    }
}
