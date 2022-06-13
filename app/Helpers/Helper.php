<?php

use App\Models\Language;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
 
if (!function_exists('checkRoute')) {
    function checkRoute($route, $type = 'route', $tagType = 'tag'): string
    {
        if ($tagType == 'ul') {
            if ($type == 'route') {
                return Route::currentRouteName() == $route ? 'active' : '';
            } elseif ($type == 'url') {
                
                return Request::is($route) ? 'menu-open' : '';
            } elseif ($type == 'url-frontend') {
                return Request::is($route) ? 'open' : '';
            }

        } elseif ($tagType == 'all') {
            return Request::is($route) ? 'active' : '';
        } else {
            if ($type == 'route') {
                return Route::currentRouteName() == $route ? 'active' : '';
            } elseif ($type == 'url') {
                return Request::is($route) ? 'menu-open' : '';
            } elseif ($type == 'url-frontend') {
                return Request::is($route) ? 'open' : '';
            }
        }

        return '';
    }
}
 

if (!function_exists('utility')) {
    function utility(): \App\Helpers\Utility
    {
        return new \App\Helpers\Utility();
    }
}

 



