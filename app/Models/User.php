<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @property int $id
 * @property string $Title
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string $profPic
 * @property bool $isAdmin
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $verified_at
 *
 * @property Collection|Post[] $posts
 * @property Collection|Publication[] $publications
 * @property Collection|Researcher[] $researchers
 * @property Collection|Researchersinvolved[] $researchersinvolveds
 * @property Collection|Project[] $researchprojects
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, LogsActivity, HasRoles, HasApiTokens, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Title',
        'name',
        'email',
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'profPic',
        'isAdmin',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'remember_token',
        'api_token',
        'two_factor_recovery_codes',
        'isAdmin',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'isAdmin' => 'bool',
        'current_team_id' => 'int'
    ];

    protected $dates = [
        'email_verified_at',
        'verified_at'
    ];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class, 'UserID');
    }

    public function researchers()
    {
        return $this->hasMany(Researcher::class, 'User_ID');
    }

    public function researchersinvolveds()
    {
        return $this->hasMany(Researchersinvolved::class, 'User_ID');
    }

    public function researchprojects()
    {
        return $this->hasMany(Project::class, 'User_ID');
    }
}
