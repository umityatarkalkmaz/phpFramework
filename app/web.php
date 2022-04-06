<?php
route::get('/','main@index');
route::get('/404', function () {
    echo '404';
});


route::get('/admin', 'admin@main');
route::get('/admin/login', 'admin@login');

route::dispath();
