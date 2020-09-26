<?php

namespace IgniteKit\WP\ORM\Models;

use IgniteKit\WP\ORM\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    const CREATED_AT = 'comment_date';

    /**
     * The primary key
     * @var string
     */
    protected $primaryKey = 'comment_ID';

    /**
     * Post relation for a comment
     *
     * @return HasOne
     */
    public function post()
    {
        return $this->hasOne('IgniteKit\WP\ORM\WP\Post');
    }
}