<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UpcomingeventsKtbl
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
class UpcomingeventsKtbl extends Model
{
    protected $table = 'upcomingevents_ktbl';
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
}
