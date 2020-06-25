<?php

namespace DG\ORM\WP;

use DG\ORM\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany as HasManyAlias;

class User extends Model
{
    const CREATED_AT = 'user_registered';

    /**
     * The primary key
     *
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * Disable timestamps
     *
     * @var bool
     */
    protected $timestamp = false;

    /**
     * The user metadata
     *
     * @return HasManyAlias
     */
    public function meta()
    {
        return $this->hasMany('DG\ORM\WP\UserMeta', 'user_id');
    }
}