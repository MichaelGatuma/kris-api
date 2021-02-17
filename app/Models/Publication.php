<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Model;


class Publication extends Model
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
        'UserID' => 'nullable|integer',
        'Researcher_ID' => 'required|integer',
        'PublicationTitle' => 'required|string',
        'PublicationPath' => 'nullable|string|max:1000',
        'DateOfPublication' => 'required',
        'Collaborators' => 'nullable|string|max:500',
        'PublicationURL' => 'required|string|max:250',
        'Access_Level' => 'nullable|string|max:30'
    ];
    public $table = 'Publications';
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
    protected $primaryKey = "Publication_ID";
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function funder()
    {
        return $this->hasOne(Funder::class, 'Funder_ID');
    }
}
