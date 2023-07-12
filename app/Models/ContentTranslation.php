<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\{LogOptions,Traits\LogsActivity};
class ContentTranslation extends Model
{
    use LogsActivity;
    public $timestamps = false;
    protected $fillable = ['name','description'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
