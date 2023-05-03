<?php

/**
 * Boa HTTP - Response.
 *
 * Sends HTTP headers with response codes.
 */

namespace Boa\HTTP;

class Response
{
    /**
     * Sends a HTTP 403 (Forbidden) response.
     * @return void
     */
    public function HTTP403(): void
    {
        header($_SERVER['SERVER_PROTOCOL'].' 403 Forbidden', true, 403);
        exit;
    }

    /**
     * Sends a HTTP 404 (Not Found) response.
     * @return void
     */
    public function HTTP404(): void
    {
        header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found', true, 404);
        exit;
    }

    /**
     * Sends a HTTP 405 (Method Not Allowed) response.
     * @return void
     */
    public function HTTP405(): void
    {
        header($_SERVER['SERVER_PROTOCOL'].' 405 Method Not Allowed', true, 405);
        exit;
    }

    /**
     * Sends a HTTP 500 (Internal Server Error) response.
     * @return void
     */
    public function HTTP500(): void
    {
        header($_SERVER['SERVER_PROTOCOL'].' 500 Internal Server Error', true, 500);
        exit;
    }
}