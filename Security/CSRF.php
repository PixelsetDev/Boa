<?php

/**
 * Boa Security - CSRF.
 *
 * Prevents cross-site request forgery.
 *
 * By PHPRouter - MIT License (https://github.com/phprouter/main/blob/main/LICENSE)
 */

namespace Boa\Security;

class CSRF
{
    /**
     * Sets CSRF token in the session and returns a HTML format to be embedded in a form.
     * @return string The CSRF token in HTML format.
     * @throws \Exception If random_bytes() fails.
     */
    public function Set(): string
    {
        if (!isset($_SESSION['csrf'])) {
            $_SESSION['csrf'] = bin2hex(random_bytes(50));
        }
        return '<input type="hidden" name="csrf" value="'.$_SESSION['csrf'].'">';
    }

    /**
     * Checks if the CSRF token is valid.
     * @return bool Whether the CSRF token is valid.
     */
    public function Check(): bool
    {
        if (!isset($_SESSION['csrf']) || !isset($_POST['csrf'])) {
            return false;
        }
        if ($_SESSION['csrf'] != $_POST['csrf']) {
            return false;
        }

        return true;
    }
}