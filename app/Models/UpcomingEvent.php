<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class UpcomingEvent
 *
 * @property int $UpcomingEvent_ID
 * @property string $EventName
 * @property string $eventInfor
 * @property string $Venue
 * @property Carbon $EventDate
 * @property string|null $EventURL
 * @property string $EventImage
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class UpcomingEvent extends Model
{
    protected $table = 'UpcomingEvents_KTbl';
    protected $primaryKey = 'UpcomingEvent_ID';

    protected $dates = [
        'EventDate'
    ];

    protected $fillable = [
        'EventName',
        'eventInfor',
        'Venue',
        'EventDate',
        'EventURL',
        'EventImage'
    ];
    protected static function boot()
    {
        parent::boot();

        static::retrieved(function($model){
            $model->EventImage = 'https://kris.sensenventures.com/images/ResearchAreasImages/'.Str::afterLast($model->EventImage,'/');
        });
    }
}
