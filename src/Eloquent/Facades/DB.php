<?php

namespace IgniteKit\WP\ORM\Eloquent\Facades;

use IgniteKit\WP\ORM\Eloquent\Database;
use IgniteKit\Backports\Support\Facades\Facade;

/**
 * @see \IgniteKit\Backports\Database\DatabaseManager
 * @see \IgniteKit\Backports\Database\Connection
 */
class DB extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Database::instance();
    }
}