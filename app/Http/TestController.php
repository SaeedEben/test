<?php


namespace App\Http;


class TestController
{
    private static $instance = null;

    private function __construct() {}

    public static function process()
    {
        if (self::$instance === null) {
            self::$instance = new TestController();
        }


        return self::$instance;
    }

    public function getDigit()
    {
        return 1;
    }
}
