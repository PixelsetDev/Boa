<?php

/**
 * Boa Authentication - Session.
 *
 * Manages sessions.
 */

namespace Boa\Authentication;

class Session {

    /**
     * Starts a session.
     * @return void
     */
    public function Start(): void {
        session_start();
    }

    /**
     * Ends a session.
     * @return void
     */
    public function Stop(): void {
        session_destroy();
    }
}