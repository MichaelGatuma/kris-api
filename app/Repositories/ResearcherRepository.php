<?php

namespace App\Repositories;

use App\Models\Researcher;
use App\Repositories\BaseRepository;

/**
 * Class ResearcherRepository
 * @package App\Repositories
 * @version January 6, 2021, 2:07 pm UTC
*/

class ResearcherRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Researcher::class;
    }
}
