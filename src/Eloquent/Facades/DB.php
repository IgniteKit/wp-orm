<?php

namespace IgniteKit\WP\ORM\Eloquent\Facades;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\Facade;

use IgniteKit\WP\ORM\Eloquent\Database;

/**
 * @see \Illuminate\Database\DatabaseManager
 * @see \Illuminate\Database\Connection
 *
 * @method static Builder table( $table, $as = null )
 * @method static Expression raw( $value )
 * @method static Builder query()
 * @method static mixed selectOne( $query, $bindings = [], $useReadPdo = true )
 * @method static array select( $query, $bindings = [], $useReadPdo = true )
 * @method static bool insert( $query, $bindings = array() )
 * @method static int update( $query, $bindings = array() )
 * @method static int delete( $query, $bindings = array() )
 * @method static bool statement( $query, $bindings = array() )
 * @method static mixed transaction( \Closure $callback, $attempts = 1 )
 * @method static void commit()
 * @method static void rollBack()
 * @method static Database getPdo()
 * @method static int lastInsertId($args)
 */
class DB extends Facade {
	/**
	 * Get the registered name of the component.
	 *
	 * @return Database
	 */
	protected static function getFacadeAccessor() {
		return Database::instance();
	}
}