<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(
 *      definition="Project",
 *      required={"ProjectTitle", "ProjectAbstract", "Researcher_ID", "ProjectResearchAreas", "Funded", "Status", "Access_Level"},
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="ProjectTitle",
 *          description="ProjectTitle",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Project_ID",
 *          description="Project_ID",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="ProjectAbstract",
 *          description="ProjectAbstract",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Researcher_ID",
 *          description="Researcher_ID",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="User_ID",
 *          description="User_ID",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="ProjectResearchAreas",
 *          description="ProjectResearchAreas",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ResearchersInvolved",
 *          description="ResearchersInvolved",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Funded",
 *          description="Funded",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="Funder_ID",
 *          description="Funder_ID",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Status",
 *          description="Status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="LinkToPublication",
 *          description="LinkToPublication",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Access_Level",
 *          description="Access_Level",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="projectStart",
 *          description="projectStart",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="projectEnd",
 *          description="projectEnd",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="abstractDocumentPath",
 *          description="abstractDocumentPath",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="otherProjectDocsPath",
 *          description="otherProjectDocsPath",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="RelevantProjectDocuments",
 *          description="RelevantProjectDocuments",
 *          type="string"
 *      )
 * )
 */
class Project extends Model
{

    use HasFactory;

    public $table = 'researchprojects';
    protected $primaryKey = "Project_ID";
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
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

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ProjectTitle' => 'string',
        'Project_ID' => 'integer',
        'ProjectAbstract' => 'string',
        'Researcher_ID' => 'integer',
        'User_ID' => 'integer',
        'ProjectResearchAreas' => 'string',
        'ResearchersInvolved' => 'string',
        'Funded' => 'boolean',
        'Funder_ID' => 'integer',
        'Status' => 'string',
        'LinkToPublication' => 'string',
        'Access_Level' => 'string',
        'projectStart' => 'string',
        'projectEnd' => 'string',
        'abstractDocumentPath' => 'string',
        'otherProjectDocsPath' => 'string',
        'RelevantProjectDocuments' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'ProjectTitle' => 'required|string',
        'ProjectAbstract' => 'required|string',
        'Researcher_ID' => 'required|integer',
        'User_ID' => 'nullable|integer',
        'ProjectResearchAreas' => 'required|string|max:255',
        'ResearchersInvolved' => 'nullable|string|max:255',
        'Funded' => 'required|boolean',
        'Funder_ID' => 'nullable|integer',
        'Status' => 'required|string|max:191',
        'LinkToPublication' => 'nullable|string|max:191',
        'Access_Level' => 'required|string|max:20',
        'projectStart' => 'nullable|string|max:191',
        'projectEnd' => 'nullable|string|max:191',
        'abstractDocumentPath' => 'nullable|string|max:2000',
        'otherProjectDocsPath' => 'nullable|string|max:2000',
        'RelevantProjectDocuments' => 'nullable|string|max:2000'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function researcher()
    {
        return $this->belongsTo(\App\Models\Researcher::class, 'Researcher_ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'User_ID');
    }
}
