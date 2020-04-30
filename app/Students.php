<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Students
 * @package App
 */
class Students extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['name', 'class'];

}
