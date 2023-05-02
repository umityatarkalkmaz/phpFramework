<?php

class Encryption
{
    private string $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function encryptId($id): string
    {
        return strtr(base64_encode($id), '+/=', '-_,');
    }

    public function decryptId($id): false|string
    {
        return base64_decode(strtr($id, '-_,', '+/='));
    }

    public function encryptUrl($data): string
    {
        $encrypted = openssl_encrypt($data, 'AES-256-CBC', $this->key);
        return strtr(base64_encode($encrypted), '+/=', '-_,');
    }

    public function decryptUrl($data): false|string
    {
        return openssl_decrypt(base64_decode(strtr($data, '-_,', '+/=')), 'AES-256-CBC', $this->key);
    }

    public function encryptDb($data): string
    {
        $encrypted = openssl_encrypt($data, 'AES-256-CBC', $this->key);
        return base64_encode($encrypted);
    }

    public function decryptDb($data): false|string
    {
        return openssl_decrypt(base64_decode($data), 'AES-256-CBC', $this->key);
    }
}
