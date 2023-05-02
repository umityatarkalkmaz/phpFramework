<?php

class Cache
{
    private static string $cachePath = PATH . '/app/cache/';

    public static function get($key): mixed
    {
        $file = self::$cachePath . StringHelper::cleanString($key) . '.json';
        if (file_exists($file)) {
            $contents = file_get_contents($file);
            $data = json_decode($contents, true);
            if ($data['expiration'] > time()) {
                return $data['data'];
            } else {
                unlink($file);
            }
        }
        return false;
    }

    public static function put($key, $data = [], $ttl = 3600): false|int
    {
        $data['data'] = $data;
        $data['expiration'] = $ttl ? time() + $ttl : false;

        $file = self::$cachePath . $key . '.json';
        $jsonData = json_encode($data);
        return file_put_contents($file, $jsonData);

    }
}
