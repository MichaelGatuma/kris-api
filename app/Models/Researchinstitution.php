<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Researchinstitution
 *
 * @property int $ResearchInstitution_ID
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $RIName
 * @property string $RIWebsite
 * @property string $RIpostalAddress
 *
 * @property Collection|Department[] $departments
 * @property Collection|Researcher[] $researchers
 *
 * @package App\Models
 */
class Researchinstitution extends Model
{
    protected $table = 'researchinstitutions';
    protected $primaryKey = 'ResearchInstitution_ID';

    protected $fillable = [
        'RIName',
        'RIWebsite',
        'RIpostalAddress'
    ];

    public function departments()
    {
        return $this->hasMany(Department::class, 'ResearchInstitution_ID');
    }

    public function researchers()
    {
        return $this->hasMany(Researcher::class, 'ResearchInstitutionID');
    }
}
