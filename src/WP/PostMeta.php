<?php

namespace DG\ORM\WP;


use DG\ORM\Eloquent\Model;

class PostMeta extends Model
{
    /**
     * The primary key
     * @var string
     */
    protected $primaryKey = 'meta_id';

    /**
     * The table name
     * @var string
     */
    protected $table = 'postmeta';

    /**
     * Disable timestamps
     * @var bool
     */
    public $timestamps    = false;
}