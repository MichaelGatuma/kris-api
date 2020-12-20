<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
class Publication extends Model
{
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
}
