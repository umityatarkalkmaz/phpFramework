<?php

class Settings
{

    private string $folder = PATH . '/core/config/';
    private string $file = 'settings.php';

    public function __construct($req = true)
    {
        if ($req) {
            require $this->folder . $this->file;
        }
    }

    public static function get($key)
    {
        global $settings;
        return $settings[$key] ?? null;
    }

    public function setSettings($data): void
    {
        $file = $this->folder . $this->file;

        $content = '<?php $settings = ' . var_export($data, true) . ';';
        file_put_contents($file, $content);
    }
}
