<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Researchersinvolved
 *
 * @property int $ID
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $User_ID
 * @property int $Researcher_ID
 * @property int $Project_ID
 *
 * @property Researcher $researcher
 * @property User $user
 *
 * @package App\Models
 */
class Researchersinvolved extends Model
{
    protected $table = 'researchersinvolved';
    protected $primaryKey = 'ID';

    protected $casts = [
        'User_ID' => 'int',
        'Researcher_ID' => 'int',
        'Project_ID' => 'int'
    ];

    protected $fillable = [
        'User_ID',
        'Researcher_ID',
        'Project_ID'
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
