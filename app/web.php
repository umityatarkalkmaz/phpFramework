<?php

route::get('/', 'main@index');

route::get('/admin', 'admin@index');
route::get('/admin/login', 'admin@login');

route::dispath();