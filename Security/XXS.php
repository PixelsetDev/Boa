<?php

/**
 * Boa Security - XSS.
 *
 * Prevents cross-site scripting.
 */

namespace Boa\Security;

class XSS
{
    public function out($text): string
    {
        return htmlspecialchars($text);
    }
}