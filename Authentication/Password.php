<?php

/**
 * Boa Authentication - Password.
 *
 * Hashes & validates passwords.
 */

namespace Boa\Authentication;

class Password {
    private string $Algorithm;

    /**
     * Creates a new Password object.
     * @param $Algorithm string The algorithm to use for hashing (default: PASSWORD_DEFAULT).
     */
    public function __construct(string $Algorithm = PASSWORD_DEFAULT) {
        $this->Algorithm = $Algorithm;
    }

    /**
     * Hashes a password.
     * @param $password string The plaintext password to hash.
     * @return string The hashed password.
     */
    public function Hash($password): string {
        return password_hash($password, $this->Algorithm);
    }

    /**
     * Verifies that the password submitted is valid.
     * @param $password string The plaintext password to verify.
     * @param $hash string The hashed password to verify against.
     * @return bool Whether the password is valid.
     */
    public function Verify($password, $hash): bool {
        return password_verify($password, $hash);
    }
}