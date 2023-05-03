<?php

/**
 * Boa Authentication - Password.
 *
 * Hashes & validates passwords.
 */

namespace Boa\Authentication;

class Password {
    private string $Algorithm;

    public function __construct($Algorithm = 'PASSWORD_DEFAULT') {
        $this->Algorithm = match ($Algorithm) {
            'PASSWORD_BCRYPT' => PASSWORD_BCRYPT,
            'PASSWORD_ARGON2I' => PASSWORD_ARGON2I,
            'PASSWORD_ARGON2ID' => PASSWORD_ARGON2ID,
            default => PASSWORD_DEFAULT
        };
    }
    public function Hash($password): string {
        return password_hash($password, $this->Algorithm);
    }

    public function Verify($password): bool {
        return password_verify($password, $this->Algorithm);
    }
}