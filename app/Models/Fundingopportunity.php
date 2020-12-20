<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Fundingopportunity
 *
 * @property int $FundingOpportunity_ID
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $Funder_ID
 * @property string $ResearchAreasFunded
 * @property string $FundingOpportunityURL
 * @property Carbon $DeadlineForApplication
 *
 * @property Funder $funder
 *
 * @package App\Models
 */
class Fundingopportunity extends Model
{
    protected $table = 'fundingopportunities';
    protected $primaryKey = 'FundingOpportunity_ID';

    protected $casts = [
        'Funder_ID' => 'int'
    ];

    protected $dates = [
        'DeadlineForApplication'
    ];

    protected $fillable = [
        'Funder_ID',
        'ResearchAreasFunded',
        'FundingOpportunityURL',
        'DeadlineForApplication'
    ];

    public function funder()
    {
        return $this->belongsTo(Funder::class, 'Funder_ID');
    }
}
