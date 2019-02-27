<?php

$redirect_url = get_redirect_url();

Redirect($redirect_url, false);

function Redirect($url, $permanent = false) {
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

function get_actual_store_url($user_browsing_country) {
    $protocol = "https://";
    $home_url = "www.playrsmartcoach.com/";
    $product_url = "playrsmartcoach.com/products/buy-playr-system";
    
    switch ($user_browsing_country) {
        case 'GB':
            $actual_store_url = $protocol . 'gb' . '.' . $product_url;
            break;
        case 'US':
            $actual_store_url = $protocol . 'us' . '.' . $product_url;
            break;
        case 'AU':
            $actual_store_url = $protocol . 'aus' . '.' . $product_url;
            break;
        case 'EU':
            $actual_store_url = $protocol . 'eu' . '.' . $product_url;
            break;
        case 'EAA':
            $actual_store_url = $protocol . 'eu' . '.' . $product_url;
            break;
        case 'SE':
            $actual_store_url = $protocol . 'se' . '.' . $product_url;
            break;
        default:
            $actual_store_url = $protocol.$home_url . 'rw';
    }
    return $actual_store_url;
}

function getHeaders($header_name = null) {
    $headervals = "";
    $keys = array_keys($_SERVER);
    if (is_null($header_name)) {
        $headers = preg_grep("/^HTTP_(.*)/si", $keys);
    } else {
        $header_name_safe = str_replace("-", "_", strtoupper(preg_quote($header_name)));
        $headers = preg_grep("/^HTTP_${header_name_safe}$/si", $keys);
    }

    foreach ($headers as $header) {
        if (is_null($header_name)) {
            $headervals[substr($header, 5)] = $_SERVER[$header];
        } else {
            return $_SERVER[$header];
        }
    }

    return $headervals;
}

function get_redirect_url() {
    $user_browsing_country = getHeaders("CloudFront-Viewer-Country");
    if ($user_browsing_country) {
        $eaa_countries = array('IE', 'AT', 'NL', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'AN', 'HU', 'IS', 'IT', 'LV', 'LI', 'LT', 'LU', 'MT', 'NO', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'CH');
        if (in_array($user_browsing_country, $eaa_countries)) {
            $user_browsing_country = 'EAA';
        }
        $url_to_redirect = get_actual_store_url($user_browsing_country);
        return $url_to_redirect;
    } else {
        $url_to_redirect = get_actual_store_url('GB');
        return $url_to_redirect;
    }
}
