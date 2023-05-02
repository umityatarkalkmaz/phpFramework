<?php

class EncryptSession
{
    private static Encryption $encrypt;
    public function __construct($key = 'SESSION_SECRET_KEY')
    {
        $encrypt = new Encryption($key);
        self::$encrypt =$encrypt;
    }
    public static function set($key,$value): void
    {
        $encrypt = self::$encrypt;
        $encryptKey = $encrypt->encryptDb($value);
        Session::set($key,$encryptKey);
    }
    public static function get($key): string|false
    {
        $encrypt = self::$encrypt;
        $key = Session::get($key);
        return $encrypt->decryptDb($key);
    }
}
