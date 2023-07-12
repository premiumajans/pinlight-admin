<?php

namespace App\Models;

use Astrotomic\Translatable\{Contracts\Translatable as TranslatableContract,Translatable};
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\{LogOptions,Traits\LogsActivity};

class Content extends Model implements TranslatableContract
{
    use Translatable, LogsActivity;
    public array $translatedAttributes = ['name', 'content'];
    protected $guarded = ['slug', 'view', 'photo'];
    public function photos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ContentPhotos::class);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
