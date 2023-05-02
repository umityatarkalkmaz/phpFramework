<?php

class Controller
{
    private const HEADER = 'header';
    private const FOOTER = 'footer';
    private const VIEW_EXTENSION = '.php';

    protected static function view(string $name, array $data = [], $theme = 'theme1', ?string $header = self::HEADER, ?string $footer = self::FOOTER): void
    {
        extract($data);

        if ($header) {
            require_once(PATH . '/app/view/' . $theme . '/static' . strtolower($header) . self::VIEW_EXTENSION);
        }

        require_once(PATH . '/app/view/' . $theme . '/' . strtolower($name) . self::VIEW_EXTENSION);

        if ($footer) {
            require_once(PATH . '/app/view/' . $theme . '/static' . strtolower($footer) . self::VIEW_EXTENSION);
        }
    }

    protected static function model($name)
    {
        require PATH . '/app/model/' . strtolower($name) . '.php';
        return new $name();

    }
}
