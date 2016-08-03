<?php

class User_model extends MY_Model
{
    const TABLE_NAME = 'user';
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $password;
    /**
     * @var string
     */
    public $mobileNumber;
    /**
     * @var string
     */
    public $address;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * create user
     * @param string $email
     * @param string $password
     * @param string $name
     * @param string $address
     * @return bool
     */
    public static function create($email, $password, $name, $address)
    {
        return self::$db->insert(self::TABLE_NAME, [
            'name' => $name,
            'password' => sha1($password),
            'email' => $email,
            'address' => $address
        ]);
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public static function verification_by_email($email, $password)
    {
        return self::$db->get_where(self::TABLE_NAME, [
            'email' => $email,
            'password' => sha1($password)
        ])->num_rows() > 0;
    }
}