<?php

/**
 * Boa Authentication - Session.
 *
 * Manages sessions.
 */

namespace Boa\Authentication;

class Session {
    public function Start() {
        session_start();
    }

    public function Stop() {
        session_destroy();
    }
}