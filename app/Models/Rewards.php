<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rewards extends Model
{
    protected $table = 'rewards';

    public const SAVED = 0;
    public const PUBLISHED = 1;
    public const ARCHIVED = 2;
}
