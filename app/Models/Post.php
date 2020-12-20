<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $title
 * @property string $body
 * @property int $user_id
 * @property int $Researcher_ID
 * @property string $slug
 * 
 * @property Researcher $researcher
 * @property User $user
 *
 * @package App\Models
 */
class Post extends Model
{
	protected $table = 'posts';

	protected $casts = [
		'user_id' => 'int',
		'Researcher_ID' => 'int'
	];

	protected $fillable = [
		'title',
		'body',
		'user_id',
		'Researcher_ID',
		'slug'
	];

	public function researcher()
	{
		return $this->belongsTo(Researcher::class, 'Researcher_ID');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
