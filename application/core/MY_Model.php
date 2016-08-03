<?php

/**
 * Class MY_Model
 *
 * @property CI_DB db
 */
class MY_Model extends CI_Model
{
    protected static $db;

    public function __construct()
    {
        parent::__construct();
        $ci =& get_instance();
        $ci->load->database();
        self::$db =$ci->db;
    }
}