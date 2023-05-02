<?php
class notFound extends Controller {
    public function main(): void
    {
        self::view('404',[],'','','');
    }
}
