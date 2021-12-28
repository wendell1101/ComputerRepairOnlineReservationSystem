<?php

use App\ProductCategory;
use Carbon\Carbon;

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


// {{ \Str::limit(strip_tags($service->description), 100, '...') }}
