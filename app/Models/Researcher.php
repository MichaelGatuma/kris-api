<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Researcher
 *
 * @property int $Researcher_ID
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $User_ID
 * @property string $Gender
 * @property Carbon $DOB
 * @property string $PhoneNumber
 * @property string $ResearchAreaOfInterest
 * @property int $DepartmentID
 * @property int $ResearchInstitutionID
 * @property string $Affiliation
 * @property string $AboutResearcher
 * @property bool $Approved
 * @property string|null $CV
 * @property string|null $ListofPublications
 *
 * @property Department $department
 * @property Researchinstitution $researchinstitution
 * @property User $user
 * @property Collection|Post[] $posts
 * @property Collection|Publication[] $publications
 * @property Collection|Researchersinvolved[] $researchersinvolveds
 * @property Collection|Project[] $researchprojects
 *
 * @package App\Models
 */
class Researcher extends Model
{
    protected $table = 'researchers';
    protected $primaryKey = 'Researcher_ID';

    protected $casts = [
        'User_ID' => 'int',
        'DepartmentID' => 'int',
        'ResearchInstitutionID' => 'int',
        'Approved' => 'bool'
    ];

    protected $dates = [
        'DOB'
    ];

    protected $fillable = [
        'User_ID',
        'Gender',
        'DOB',
        'PhoneNumber',
        'ResearchAreaOfInterest',
        'DepartmentID',
        'ResearchInstitutionID',
        'Affiliation',
        'AboutResearcher',
        'Approved',
        'CV',
        'ListofPublications'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID');
    }

    public function researchinstitution()
    {
        return $this->belongsTo(Researchinstitution::class, 'ResearchInstitutionID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'User_ID');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'Researcher_ID');
    }

    public function publications()
    {
        return $this->hasMany(Publication::class, 'Researcher_ID');
    }

    public function researchersinvolveds()
    {
        return $this->hasMany(Researchersinvolved::class, 'Researcher_ID');
    }

    public function researchprojects()
    {
        return $this->hasMany(Project::class, 'Researcher_ID');
    }
}
