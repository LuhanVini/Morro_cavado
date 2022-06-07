<?php
date_default_timezone_set('America/Sao_Paulo');

/**
 * Class Config
 */
class Config
{
    /**
     * @var bool
     */
    private static $sandbox = false;
    /**
     * @var string
     */
    private static $email = 'morrocavadocafe@gmail.com';
    /**
     * @var string
     */
    private static $tokenProduction = "8e073cd4-0057-4fbf-8652-c13003b9f6b2f3125578490c832724760b7bb081f5a86c30-1090-4b2d-8956-ad61927d7287";
    /**
     * @var string
     */
    private static $tokenSandbox = "11734C1E331E47729FCBD34E35D66382";

    /**
     * @return string
     */
    public static function getEmail()
    {
        return self::$email;
    }

    /**
     * @return string
     */
    public static function getToken()
    {
        return self::isSandbox() ? self::$tokenSandbox : self::$tokenProduction;
    }

    /**
     * @return bool
     */
    public static function isSandbox()
    {
        return self::$sandbox;
    }

    /**
     *
     */
    public static function setSandbox()
    {
        self::$sandbox = true;
    }

    /**
     *
     */
    public static function setProduction()
    {
        self::$sandbox = false;
    }

    public static function setAccountCredentials($email, $token, $isSandbox = true)
    {
        self::$email = $email;

        if($isSandbox === true) {
            self::setSandbox();
            self::$tokenSandbox = $token;
        }else{
            self::setProduction();
            self::$tokenProduction = $token;
        }
    }
}

