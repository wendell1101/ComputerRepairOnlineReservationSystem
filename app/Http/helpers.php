<?php

use App\User;
use Carbon\Carbon;
use App\ProductCategory;

if (! function_exists('format_date_time')) {
    function format_date_time($val)
    {
        return Carbon::create($val)->format('M d, Y g:i A');
    }
}

if (! function_exists('format_date')) {
    function format_date($val)
    {
        return Carbon::create($val)->format('M d, Y');
    }
}

if (! function_exists('format_price')) {
    function format_price($val)
    {
        return number_format($val, 2, '.', ',');
    }
}

if (! function_exists('get_user')) {
    function get_user($user_id)
    {
        return User::find($user_id);
    }
}



if (! function_exists('get_category_name')) {
    function get_category_name($categoryId)
    {
        return ProductCategory::find($categoryId)->name;
    }
}

if (! function_exists('get_product_status')) {
    function get_product_status($val)
    {
        switch($val){
            case 0:
                return 'not available';
                break;
            case 1:
                return 'available';
                break;
            default:
                return;
        }
    }
}

if (! function_exists('get_reservation_status')) {
    function get_reservation_status($val)
    {
        switch($val){
            case 0:
                return 'pending';
                break;
            case 1:
                return 'active';
                break;
            case 2:
                return 'completed';
                break;
            case 3:
                return 'cancelled';
                break;
            default:
                return;
        }
    }
}

if (! function_exists('get_reservation_status_color')) {
    function get_reservation_status_color($value)
    {
        switch($value){
            case 0 :
                echo "<span class='text-secondary'>pending</span>";
                break;
            case 1 :
                echo "<span class='text-success'>active</span>";
                break;
            case 2 :
                echo "<span class='text-warning'>completed</span>";
                break;
            case 3 :
                echo "<span class='text-danger'>cancelled</span>";
                break;
        }
    }
}



// {{ \Str::limit(strip_tags($service->description), 100, '...') }}
