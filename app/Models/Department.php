<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 * 
 * @property int $Department_ID
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $DptName
 * @property int $ResearchInstitution_ID
 * @property string|null $DptWebsite
 * @property string $DptPhysicalAddress
 * @property string|null $DptPostalAddress
 * 
 * @property Researchinstitution $researchinstitution
 * @property Collection|Researcher[] $researchers
 *
 * @package App\Models
 */
class Department extends Model
{
	protected $table = 'departments';
	protected $primaryKey = 'Department_ID';

	protected $casts = [
		'ResearchInstitution_ID' => 'int'
	];

	protected $fillable = [
		'DptName',
		'ResearchInstitution_ID',
		'DptWebsite',
		'DptPhysicalAddress',
		'DptPostalAddress'
	];

	public function researchinstitution()
	{
		return $this->belongsTo(Researchinstitution::class, 'ResearchInstitution_ID');
	}

	public function researchers()
	{
		return $this->hasMany(Researcher::class, 'DepartmentID');
	}
}
