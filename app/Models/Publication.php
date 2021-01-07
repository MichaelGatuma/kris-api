<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Publication",
 *      required={"Researcher_ID", "PublicationTitle", "DateOfPublication", "PublicationURL"},
 *      @SWG\Property(
 *          property="Publication_ID",
 *          description="Publication_ID",
 *          type="integer",
 *          format="int32"
 *      ),
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
 *          property="UserID",
 *          description="UserID",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Researcher_ID",
 *          description="Researcher_ID",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="PublicationTitle",
 *          description="PublicationTitle",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="PublicationPath",
 *          description="PublicationPath",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="DateOfPublication",
 *          description="DateOfPublication",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="Collaborators",
 *          description="Collaborators",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="PublicationURL",
 *          description="PublicationURL",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Access_Level",
 *          description="Access_Level",
 *          type="string"
 *      )
 * )
 */
class Publication extends Model
{

    use HasFactory;

    public $table = 'publications';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'UserID',
        'Researcher_ID',
        'PublicationTitle',
        'PublicationPath',
        'DateOfPublication',
        'Collaborators',
        'PublicationURL',
        'Access_Level'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Publication_ID' => 'integer',
        'UserID' => 'integer',
        'Researcher_ID' => 'integer',
        'PublicationTitle' => 'string',
        'PublicationPath' => 'string',
        'DateOfPublication' => 'date',
        'Collaborators' => 'string',
        'PublicationURL' => 'string',
        'Access_Level' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'UserID' => 'nullable|integer',
        'Researcher_ID' => 'required|integer',
        'PublicationTitle' => 'required|string',
        'PublicationPath' => 'nullable|string|max:1000',
        'DateOfPublication' => 'required',
        'Collaborators' => 'nullable|string|max:500',
        'PublicationURL' => 'required|string|max:250',
        'Access_Level' => 'nullable|string|max:30'
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
        return $this->belongsTo(\App\Models\User::class, 'UserID');
    }
}
