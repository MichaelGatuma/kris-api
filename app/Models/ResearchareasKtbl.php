<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ResearchareasKtbl
 *
 * @property int $ResearchArea_ID
 * @property string $ResearchAreaName
 * @property string $ResearchAreaImage
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ResearchareasKtbl extends Model
{
    protected $table = 'researchareas_ktbl';
    protected $primaryKey = 'ResearchArea_ID';

    protected $fillable = [
        'ResearchAreaName',
        'ResearchAreaImage'
    ];
}
