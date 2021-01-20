<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Request
 *
 * @property int $Request_ID
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $ResearchOwner_ID
 * @property int|null $RequestedAccess
 * @property int|null $ResearchProject_ID
 * @property int|null $User_ID
 * @property int|null $RequestMessage
 * @property int|null $RequestReply
 * @property int|null $Publications_ID
 *
 * @package App\Models
 */
class Request extends Model
{
    protected $table = 'Requests';
    protected $primaryKey = 'Request_ID';

    protected $casts = [
        'ResearchOwner_ID' => 'int',
        'RequestedAccess' => 'int',
        'ResearchProject_ID' => 'int',
        'User_ID' => 'int',
        'RequestMessage' => 'int',
        'RequestReply' => 'int',
        'Publications_ID' => 'int'
    ];

    protected $fillable = [
        'ResearchOwner_ID',
        'RequestedAccess',
        'ResearchProject_ID',
        'User_ID',
        'RequestMessage',
        'RequestReply',
        'Publications_ID'
    ];
}
