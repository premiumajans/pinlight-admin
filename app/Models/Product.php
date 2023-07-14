<?php

namespace App\Models;

use Astrotomic\Translatable\{Contracts\Translatable as TranslatableContract,Translatable};
use Spatie\Activitylog\{LogOptions,Traits\LogsActivity};
use Illuminate\Database\Eloquent\Model;
class Product extends Model implements TranslatableContract
{
    use Translatable, LogsActivity;
    public array $translatedAttributes = ['name'];
    protected $guarded = [];
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
    public function photos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductPhotos::class);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
