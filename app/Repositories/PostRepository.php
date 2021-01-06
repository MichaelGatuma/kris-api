<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\BaseRepository;

/**
 * Class PostRepository
 * @package App\Repositories
 * @version January 6, 2021, 2:27 pm UTC
*/

class PostRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'body',
        'user_id',
        'Researcher_ID',
        'slug'
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
        return Post::class;
    }
}
