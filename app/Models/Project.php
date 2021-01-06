<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Researchproject
 *
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $ProjectTitle
 * @property int $Project_ID
 * @property string $ProjectAbstract
 * @property int $Researcher_ID
 * @property int|null $User_ID
 * @property string $ProjectResearchAreas
 * @property string|null $ResearchersInvolved
 * @property bool $Funded
 * @property int|null $Funder_ID
 * @property string $Status
 * @property string|null $LinkToPublication
 * @property string $Access_Level
 * @property string|null $projectStart
 * @property string|null $projectEnd
 * @property string|null $abstractDocumentPath
 * @property string|null $otherProjectDocsPath
 * @property string|null $RelevantProjectDocuments
 *
 * @property Researcher $researcher
 * @property User|null $user
 *
 * @package App\Models
 */
class Project extends Model
{
    protected $table = 'researchprojects';
    protected $primaryKey = 'Project_ID';

    protected $casts = [
        'Researcher_ID' => 'int',
        'User_ID' => 'int',
        'Funded' => 'bool',
        'Funder_ID' => 'int'
    ];

    protected $fillable = [
        'ProjectTitle',
        'ProjectAbstract',
        'Researcher_ID',
        'User_ID',
        'ProjectResearchAreas',
        'ResearchersInvolved',
        'Funded',
        'Funder_ID',
        'Status',
        'LinkToPublication',
        'Access_Level',
        'projectStart',
        'projectEnd',
        'abstractDocumentPath',
        'otherProjectDocsPath',
        'RelevantProjectDocuments'
    ];

    public function researcher()
    {
        return $this->belongsTo(Researcher::class, 'Researcher_ID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'User_ID');
    }
}
