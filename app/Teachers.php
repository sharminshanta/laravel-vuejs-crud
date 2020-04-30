<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Teachers
 * @package App
 */
class Teachers extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['name', 'class'];
}
