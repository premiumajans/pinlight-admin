<?php

namespace App\Models;

use Astrotomic\Translatable\{Contracts\Translatable as TranslatableContract,Translatable};
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\{LogOptions,Traits\LogsActivity};
class General extends Model implements TranslatableContract
{
    use Translatable, LogsActivity;
    public array $translatedAttributes = ['name'];
    protected $guarded = [];
    public function photos()
    {
        return $this->hasMany(GeneralPhotos::class);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
