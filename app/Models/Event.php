<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'events';

    public $orderable = [
        'id',
        'name',
        'date_event',
        'time_start',
        'time_end',
    ];

    public $filterable = [
        'id',
        'studio.name',
        'name',
        'date_event',
        'time_start',
        'time_end',
    ];

    protected $fillable = [
        'name',
        'date_event',
        'time_start',
        'time_end',
    ];

    protected $dates = [
        'date_event',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function studio()
    {
        return $this->belongsToMany(Studio::class);
    }

    public function getDateEventAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateEventAttribute($value)
    {
        $this->attributes['date_event'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
