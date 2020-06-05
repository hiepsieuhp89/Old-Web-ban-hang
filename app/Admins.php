<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admins extends Authenticatable
{
    protected $table = 'admins';
}
