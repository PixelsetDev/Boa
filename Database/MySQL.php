<?php

/**
 * Boa Database Manager - MySQL (MySQL Database).
 *
 * Run queries on the database using the PHP Data Objects system.
 */

namespace Boa\Database;

use mysqli;
use mysqli_sql_exception;

class MySQL
{
    private mysqli $mysqli;
    public int $num_rows;
    public string|null $error;

    public function __construct(string $Hostname, string $Username, string $Password, string $DatabaseName, string $Port)
    {
        try {
            $this->mysqli = new mysqli($Hostname, $Username, $Password, $DatabaseName, $Port);
        } catch (mysqli_sql_exception $e) {
            print("[BOA] Unable to connect to MySQL Database. Exception: ".$e);
            exit;
        }
    }

    public function Select(string $what, string $from, string $where, string $action, string|null $order = null, string|null $limit = null): array|object|int|null
    {
        if ($what != '*') {
            $query = 'SELECT `'.$what.'` FROM `'.$from.'`';
        } else {
            $query = 'SELECT * FROM `'.$from.'`';
        }

        if ($where != null) {
            $query .= ' WHERE '.$where;
        }

        if ($order != null) {
            $query .= ' ORDER BY '.$order;
        }

        if ($limit != null) {
            $query .= ' LIMIT '.$limit;
        }

        $result = $this->mysqli->query($query);

        $this->error = null;

        if ($result) {
            if ($action == 'all:assoc') {
                $actionResult = $result->fetch_all(MYSQLI_ASSOC);
            } elseif ($action == 'all:num') {
                $actionResult = $result->fetch_all();
            } elseif ($action == 'first:assoc') {
                $actionResult = $result->fetch_array(MYSQLI_ASSOC);
            } elseif ($action == 'first:num') {
                $actionResult = $result->fetch_array(MYSQLI_NUM);
            } elseif ($action == 'first:object') {
                $actionResult = $result->fetch_object();
            } elseif ($action == 'all:raw') {
                $actionResult = $result;
            } else {
                $actionResult = false;
                $this->error = 'MySQL: No action defined.';
            }
        } else {
            $actionResult = false;
            $this->error = 'MySQL: No data returned.';
        }

        $this->num_rows = $result->num_rows;

        return $actionResult;
    }
}
