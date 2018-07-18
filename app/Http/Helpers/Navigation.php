<?php

function isActiveRoute($route, $output = 'active') {
    $currentRoute = Route::currentRouteName();
    return preg_match('/'.$route.'/', $currentRoute) ? $output : '';
}

function isPage($target) {
    return Route::currentRouteName() === $target;
}