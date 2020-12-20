<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property string $email
 * @property string $comment
 * @property int $post_id
 * @property bool $approved
 *
 * @package App\Models
 */
class Comment extends Model
{
    protected $table = 'comments';

    protected $casts = [
        'post_id' => 'int',
        'approved' => 'bool'
    ];

    protected $fillable = [
        'name',
        'email',
        'comment',
        'post_id',
        'approved'
    ];
}
