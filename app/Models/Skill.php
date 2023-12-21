<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends BaseModel
{
    use SoftDeletes;
    use HasUlids;

    const STATUS_DRAFT = 0;
    const STATUS_SHOW = 1;


    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}
