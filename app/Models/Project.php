<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{

    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
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
    public $table = 'ResearchProjects';
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
    protected $primaryKey = "Project_ID";
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function funder()
    {
        return $this->hasOne(Funder::class, 'Funder_ID');
    }
}
