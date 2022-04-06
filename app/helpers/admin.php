<?php

function admin_url($url = false): string
{
    return URL . '/admin/' . $url;
}

function admin_public_url($url = false): string
{
    return URL . '/admin/public/' . $url;
}

function user_ranks($rankId = null)
{
    $ranks = [
        1 => 'Yönetici',
        2 => 'Editör',
        3 => 'Üye'
    ];
    return $rankId ? $ranks[$rankId] : $ranks;
}

function permission($url, $action)
{
    $permissions = json_decode(session('user_permissions'), true);
    if (isset($permissions[$url][$action]))
        return true;
    return false;
}

function permission_page()
{
    die('Bu bölümü görüntüleme yetkiniz yok!');
}
