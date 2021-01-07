<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Researcher extends Model
{

    use HasFactory;

    public $table = 'researchers';
    protected $primaryKey = "Researcher_ID";
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
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

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Researcher_ID' => 'integer',
        'User_ID' => 'integer',
        'Gender' => 'string',
        'DOB' => 'date',
        'PhoneNumber' => 'string',
        'ResearchAreaOfInterest' => 'string',
        'DepartmentID' => 'integer',
        'ResearchInstitutionID' => 'integer',
        'Affiliation' => 'string',
        'AboutResearcher' => 'string',
        'Approved' => 'boolean',
        'CV' => 'string',
        'ListofPublications' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'User_ID' => 'required|integer',
        'Gender' => 'required|string|max:250',
        'DOB' => 'required',
        'PhoneNumber' => 'required|string|max:250',
        'ResearchAreaOfInterest' => 'required|string|max:250',
        'DepartmentID' => 'required|integer',
        'ResearchInstitutionID' => 'required|integer',
        'Affiliation' => 'required|string|max:250',
        'AboutResearcher' => 'required|string',
        'Approved' => 'required|boolean',
        'CV' => 'nullable|string|max:191',
        'ListofPublications' => 'nullable|string|max:5000'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class, 'DepartmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function researchinstitution()
    {
        return $this->belongsTo(\App\Models\Researchinstitution::class, 'ResearchInstitutionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'User_ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function posts()
    {
        return $this->hasMany(\App\Models\Post::class, 'Researcher_ID');
    }

}
