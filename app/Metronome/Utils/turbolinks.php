<?php namespace Metronome\Utils;

use Cookie;
use Request;
use Response;
use Session;

if (! function_exists('referer')) {
    function referer($request = null)
    {
        $request = $request ?: Request::instance();
        return $request->headers->get('X-XHR-Referer') ?: $request->headers->get('Referer');
    }
}

if (! function_exists('set_request_method_cookie')) {
    function set_request_method_cookie($request)
    {
        Cookie::queue('request_method', $request->getMethod());
    }
}

if (! function_exists('set_xhr_redirected_to')) {
    function set_xhr_redirected_to($request, $response)
    {
        if (Session::has('_turbolinks_redirect_to')) {
            $response->header('X-XHR-Redirected-To', Session::pull('_turbolinks_redirect_to'));
        }
    }
}

if (! function_exists('same_origin_right')) {
    function same_origin_right($current, $next)
    {
        return array_only(parse_url($current), ['scheme', 'host', 'port']) == array_only(parse_url($next), ['scheme', 'host', 'port']);
    }
}

if (! function_exists('store_for_turbolinks')) {
    function store_for_turbolinks($request, $url)
    {
        if (referer($request)) {
            Session::put('_turbolinks_redirect_to', $url);
        }
        return $url;
    }
}

if (! function_exists('abort_xdomain_redirect')) {
    function abort_xdomain_redirect($request, $response)
    {
        $current = $request->headers->get('X-XHR-Referer') ?: null;
        $next = $response->headers->get('Location') ?: null;
        if (! (is_null($current) or is_null($next) or same_origin_right($current, $next))) {
            $response->setStatusCode(403);
        }
    }
}
