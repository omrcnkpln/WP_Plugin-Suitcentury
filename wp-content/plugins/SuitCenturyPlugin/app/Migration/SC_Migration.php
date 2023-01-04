<?php


class SC_Migration
{
    public function __construct()
    {
        $DB = new DB();
        $charset_collate = $DB->SC_wpdb->get_charset_collate();

        //events tablosu
        $DB->SC_wpdb->query("CREATE TABLE IF NOT EXISTS {$DB->SC_wpdb->prefix}sc_events(
                                    ID integer not null auto_increment,
                                    userID bigint(20),
                                    groupID bigint(20),
                                    event_state varchar(255),
                                    event_date TIMESTAMP,
                                    modify_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
                                    PRIMARY KEY (ID)
                                )$charset_collate;");

        //kıyafetler tablosu
        $DB->SC_wpdb->query("CREATE TABLE IF NOT EXISTS {$DB->SC_wpdb->prefix}sc_clothes(
                                    ID integer not null auto_increment,
                                    eventID bigint(20),
                                    name varchar(255),
                                    neck varchar(255),
                                    overarm varchar(255),
                                    chest varchar(255),
                                    sleeve varchar(255),
                                    stomach varchar(255),
                                    waist varchar(255),
                                    outseam varchar(255),
                                    modify_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
                                    PRIMARY KEY (ID)
                                )$charset_collate;");

        //roller tablosu
        $DB->SC_wpdb->query("CREATE TABLE IF NOT EXISTS {$DB->SC_wpdb->prefix}sc_roles(
                                    ID integer not null auto_increment,
                                    role varchar(255),
                                    modify_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
                                    PRIMARY KEY (ID)
                                )$charset_collate;");

        //default roles
        $process = $DB->select($DB->SC_wpdb->prefix . "sc_roles", array("role"), array("Groom"));
        if (empty($process)) {
            $process = $DB->insert($DB->SC_wpdb->prefix . "sc_roles", array("role"), array("Groom"));
        }

        $process = $DB->select($DB->SC_wpdb->prefix . "sc_roles", array("role"), array("Best Man"));
        if (empty($process)) {
            $process = $DB->insert($DB->SC_wpdb->prefix . "sc_roles", array("role"), array("Best Man"));
        }

        $process = $DB->select($DB->SC_wpdb->prefix . "sc_roles", array("role"), array("Groomsmen"));
        if (empty($process)) {
            $process = $DB->insert($DB->SC_wpdb->prefix . "sc_roles", array("role"), array("Groomsmen"));
        }

        $process = $DB->select($DB->SC_wpdb->prefix . "sc_roles", array("role"), array("Bridesmen"));
        if (empty($process)) {
            $process = $DB->insert($DB->SC_wpdb->prefix . "sc_roles", array("role"), array("Bridesmen"));
        }

        //body tablosu
        $DB->SC_wpdb->query("CREATE TABLE IF NOT EXISTS {$DB->SC_wpdb->prefix}sc_body(
                                    ID integer not null auto_increment,
                                    userID bigint(20),
                                    feet varchar(255),
                                    inches varchar(255),
                                    weigh varchar(255),
                                    age varchar(255),
                                    shoesize varchar(255),
                                    waist varchar(255),
                                    modify_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
                                    PRIMARY KEY (ID)
                                )$charset_collate;");

        //grup tablosu
        $DB->SC_wpdb->query("CREATE TABLE IF NOT EXISTS {$DB->SC_wpdb->prefix}sc_groups(
                                    ID integer not null auto_increment,
                                    eventID bigint(20),
                                    title varchar(255),
                                    description varchar(500),
                                    modify_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
                                    PRIMARY KEY (ID)
                                )$charset_collate;");
    }
}
