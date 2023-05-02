<?php

class Generate
{
    private string $argv;

    public function __construct($argv)
    {
        $this->argv = $argv;
        $this->generate();
    }

    private function generate(): void
    {
        $type = $this->argv[1] ?? null;
        $name = $this->argv[2] ?? null;
        $path = $this->argv[3] ?? 'app';

        if (!$type || !$name) {
            echo "Usage: php generate.php {controller|model|view|full} {name} [path]\n";
            exit();
        }

        $filename = $name . '.php';
        switch ($type) {
            case 'controller':
                $template = Generate::controller();
                break;
            case 'model':
                $template = Generate::modal();
                break;
            case 'view':
                $template = Generate::view();
                break;
            case 'full':
                $path = rtrim($path, '/') . '/';
                $controller_file = $path . '/controller/' . $name . '.php';
                $model_file = $path . '/model/' . $name . '.php';
                $view_file = $path . '/view/' . $name . '.php';

                file_put_contents($controller_file, str_replace('ClassName', ucfirst($name), Generate::controller()));
                file_put_contents($model_file, str_replace('ClassName', ucfirst($name), Generate::modal()));
                file_put_contents($view_file, str_replace('ClassName', ucfirst($name), Generate::view()));

                echo "Created controller, model and view files in $path\n";
                return;
            default:
                echo "Invalid type. Usage: php generate.php {controller|model|view|full} {name} [path]\n";
                exit();
        }

        $file_path = rtrim($path, '/') . '/' . $type . '/' . $filename;
        file_put_contents($file_path, str_replace('ClassName', ucfirst($name), $template));

        echo "Created $type file at $file_path\n";
    }

    private static function controller(): string
    {
        return '<?php
class ClassName extends Controller {
    function main() {

    }
}
';
    }

    private static function modal(): string
    {
        return '<?php
class ClassName extends Model {

}
';
    }

    private static function view(): string
    {
        return '<main> </main>';
    }
}

new Generate($argv);
