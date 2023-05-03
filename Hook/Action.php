<?php

/**
 * Boa Hook - Action.
 *
 * Manages action hooks.
 */

namespace Boa\Hook;

use Exception;

class Action
{
    private array $ActionList = [];

    /**
     * Adds a function to an action
     * @param string $ActionCode The action code a function should link to.
     * @param string|array $Function The function to run when the action is called.
     * @param mixed|null $Data The data to pass to the function.
     * @return void
     */
    public function Register(string $ActionCode, string|array $Function, mixed $Data = null): void
    {
        $this->ActionList[$ActionCode][] = [['Function' => $Function, 'Data' => $Data]];
    }

    /**
     * Removes a function from an action.
     * @param string $ActionCode The action code the function is linked to.
     * @param string $Function The function to remove.
     * @return void
     */
    public function Unregister(string $ActionCode, string $Function): void
    {
        foreach ($this->ActionList[$ActionCode] as $HookFunction) {
            if ($HookFunction['Function'] == $Function) {
                unset($HookFunction);
            }
        }
    }

    /**
     * Executes all functions linked to an action.
     * @param string $ActionCode The action code to execute.
     * @return void
     */
    public function Run(string $ActionCode): void
    {
        if (!isset($this->ActionList[$ActionCode])) {
            return;
        }

        foreach ($this->ActionList[$ActionCode] as $ActionFunction) {
            try {
                if ($ActionFunction[0]['Data'] == null) {
                    call_user_func($ActionFunction[0]['Function']);
                } else {
                    call_user_func_array($ActionFunction[0]['Function'], $ActionFunction[0]['Data']);
                }
            } catch (Exception) {
            }
        }
    }
}