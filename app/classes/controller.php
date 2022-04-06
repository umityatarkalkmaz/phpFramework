<?php

class Controller
{
    public function view($viewName, $data = [])
    {
        extract($data);
        require PATH . '/app/views/static/header.php';

        require PATH . '/app/views/' . strtolower($viewName) . '.php';

        require PATH . '/app/views/static/footer.php';

    }

    public function model($modelName)
    {
        require PATH . '/app/model/' . strtolower($modelName) . '.php';
        return new $modelName();

    }
}