<?php namespace Crayon\Utils;

use Cookie;
use Request;
use Response;
use Session;

if (! function_exists('set_request_method_cookie')) {
    function set_request_method_cookie()
    {
        Cookie::queue('request_method', Request::method());
    }
}

if (! function_exists('redirect_via_turbolinks_to')) {
    function redirect_via_turbolinks_to($url, $response_status)
    {
        Redirect::to($url, $response_status);
        return Response::make([
            "Turbolinks.visit('#{location}');",
            200,
            'ContentType' => 'application/x-javascript'
        ]);
    }
}

if (! function_exists('abort_xdomain_redirect')) {
    function abort_xdomain_redirect()
    {

    }
}

if (! function_exists('is_same_origin')) {
    function is_same_origin()
    {

    }
}

if (! function_exists('set_xhr_redirected_to')) {
    function set_xhr_redirected_to()
    {
        if (Session::has('_turbolinks_redirect_to')) {
            Response::header('X-XHR-Redirected-To', Session::pull('_turbolinks_redirect_to'));
        }
    }
}

if (! function_exists('store_for_turbolinks')) {
    function store_for_turbolinks($url)
    {
        if (Request::headers('X-XHR-Referer')) {
            Session::put('_turbolinks_redirect_to', $url);
        }
        return $url;
    }
}

if (! function_exists('url_for_with_xhr_referer')) {
    function url_for_with_xhr_referer($options = [])
    {

    }
}
