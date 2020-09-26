# ORM for WordPress

Laravel Eloquent based ORM for WordPress

This is a fork of the original library written by [Tareq Hasan](https://tareq.co) with some more improvements and changes. 

 
## Package Installation

To install the library run:

```
composer require ignitekit/wp-orm
```

## Usage Example

### Basic Usage 

```php

$db = \IgniteKit\WP\ORM\Eloquent\Database::instance();

var_dump( $db->table('users')->find(1) );
var_dump( $db->select('SELECT * FROM wp_users WHERE id = ?', [1]) );
var_dump( $db->table('users')->where('user_login', 'john')->first() );

// OR with DB facade
use \IgniteKit\WP\ORM\Eloquent\Facades\DB;

var_dump( DB::table('users')->find(1) );
var_dump( DB::select('SELECT * FROM wp_users WHERE id = ?', [1]) );
var_dump( DB::table('users')->where('user_login', 'john')->first() );
```

## Creating Models For Custom Tables
You can use custom tables of the WordPress databases to create models:

```php
<?php
namespace Whatever;

use IgniteKit\WP\ORM\Eloquent\Model;

class CustomTableModel extends Model {

    /**
     * Name for table without prefix
     *
     * @var string
     */
    protected $table = 'table_name';

    /**
     * Columns that can be edited - IE not primary key or timestamps if being used
     */
    protected $fillable = [
        'city',
        'state',
        'country'
    ];

    /**
     * Disable created_at and update_at columns, unless you have those.
     */
    public $timestamps = false;

    /** Everything below this is best done in an abstract class that custom tables extend */

    /**
     * Set primary key as ID, because WordPress
     *
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * Make ID guarded -- without this ID doesn't save.
     *
     * @var string
     */
    protected $guarded = [ 'ID' ];

}
```

### Retrieving All Rows From A Table

```php
$users = $db->table('users')->get();

foreach ($users as $user) {
    var_dump($user->display_name);
}
```

Here `users` is the table name **without prefix**. The prefix will be applied automatically.


### Other Examples

 - [Queries](http://laravel.com/docs/5.0/queries)
 - [Eloquent ORM](http://laravel.com/docs/5.0/eloquent)

## Writing a Model

```php
use \IgniteKit\WP\ORM\Eloquent\Model as Model;

class Employee extends Model {

}

var_dump( Employee::all()->toArray() ); // gets all employees
var_dump( Employee::find(1) ); // find employee with ID 1
```
The class name `Employee` will be translated into `PREFIX_employees` table to run queries. But as usual, you can override the table name.

### In-built Models for WordPress

- Post
- Comment
- Post Meta
- User
- User Meta


```php
use IgniteKit\WP\ORM\Models\Post as Post;

var_dump( Post::all() ); //returns only posts with WordPress post_type "post"
```

#### Filter `Post` by `post_status` and `post_type`
```php
use IgniteKit\WP\ORM\Models\Post as Post;
var_dump(Post::type('page')->get()->toArray()); // get pages
var_dump(Post::status('publish')->get()->toArray()); // get posts with publish status
var_dump(Post::type('page')->status('publish')->get()->toArray()); // get pages with publish status
```

## How it Works

 - Eloquent is mainly used here as the query builder
 - [WPDB](http://codex.wordpress.org/Class_Reference/wpdb) is used to run queries built by Eloquent
 - Hence, we have the benfit to use plugins like `debug-bar` or `query-monitor` to get SQL query reporting.
 - It doesn't create any extra MySQL connection


## Minimum Requirement
 - PHP 5.6.4+
 - WordPress 4.0+

## Author
- [Darko Gjorgjijoski](https://darkog.com)
