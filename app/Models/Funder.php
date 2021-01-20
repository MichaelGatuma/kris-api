<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Funder
 *
 * @property int $Funder_ID
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $FunderName
 * @property string|null $FunderWebsite
 * @property string|null $FunderphysicalAddress
 * @property string|null $FunderPostalAddress
 *
 * @property Collection|Fundingopportunity[] $fundingopportunities
 *
 * @package App\Models
 */
class Funder extends Model
{
    protected $table = 'Funders';
    protected $primaryKey = 'Funder_ID';

    protected $fillable = [
        'FunderName',
        'FunderWebsite',
        'FunderphysicalAddress',
        'FunderPostalAddress'
    ];

    public function fundingopportunities()
    {
        return $this->hasMany(Fundingopportunity::class, 'Funder_ID');
    }
}
