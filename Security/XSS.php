<?php

/**
 * Boa Security - XSS.
 *
 * Prevents cross-site scripting.
 */

namespace Boa\Security;

class XSS
{
    /**
     * Sanitizes text to prevent XSS.
     * @param $text string The text to be sanitized.
     * @return string
     */
    public function out(string $text): string
    {
        return htmlspecialchars($text);
    }
}