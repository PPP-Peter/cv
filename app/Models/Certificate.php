<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Certificate extends BaseModel implements HasMedia
{
    use SoftDeletes;
    use HasUlids;
    use InteractsWithMedia;

    const STATUS_DRAFT = 0;
    const STATUS_SHOW = 1;
    const STATUS_DENIED = 2;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('certificate_image')
            ->acceptsMimeTypes(['image/jpeg', 'image/jpg', 'image/png'])
            ->singleFile()
            ->registerMediaConversions(function (): void {
                $this->addMediaConversion('thumb');
            });
    }

}
