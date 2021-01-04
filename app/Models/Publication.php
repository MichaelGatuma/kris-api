<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class Publication
 *
 * @property int $Publication_ID
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $UserID
 * @property int $Researcher_ID
 * @property string $PublicationTitle
 * @property string|null $PublicationPath
 * @property Carbon $DateOfPublication
 * @property string|null $Collaborators
 * @property string $PublicationURL
 * @property string|null $Access_Level
 *
 * @property Researcher $researcher
 * @property User|null $user
 *
 * @package App\Models
 */

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
 *      )
 * )
 */
class Publication extends Model
{
    const VIEW_SUMMARY = 'SUMMARY';

    protected $table = 'publications';
    protected $primaryKey = 'Publication_ID';

    protected $casts = [
        'UserID' => 'int',
        'Researcher_ID' => 'int'
    ];

    protected $dates = [
        'DateOfPublication'
    ];

    protected $fillable = [
        'UserID',
        'Researcher_ID',
        'PublicationTitle',
        'PublicationPath',
        'DateOfPublication',
        'Collaborators',
        'PublicationURL',
        'Access_Level'
    ];

    public function researcher()
    {
        return $this->belongsTo(Researcher::class, 'Researcher_ID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function scopeLatestPublications($query)
    {
        $query->take(2);
        return $query;
    }
}
