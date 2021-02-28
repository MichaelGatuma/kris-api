<?php

namespace App\Repositories;

use App\Models\UpcomingEvent;
use App\Repositories\BaseRepository;

/**
 * Class UpcomingEventRepository
 * @package App\Repositories
 * @version February 28, 2021, 1:31 pm UTC
*/

class UpcomingEventRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return UpcomingEvent::class;
    }
}
