<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePostAPIRequest;
use App\Http\Requests\API\UpdatePostAPIRequest;
use App\Http\Resources\PostCollection;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PostController
 * @package App\Http\Controllers\API
 */

class PostAPIController extends AppBaseController
{
    /** @var  PostRepository */
    private $postRepository;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepository = $postRepo;
    }


    /**
     * @group Discussion Endpoints
     *
     * View All Discussions
     *
     * This endpoint returns an archive of all discussions.
     * @authenticated
     *
     */
    public function index(Request $request)
    {
        $posts = PostCollection::collection(Post::with('comment:id,name,comment,approved')->get());

        return $this->sendResponse($posts, 'Posts retrieved successfully');
    }


    /**
     * @group Discussion Endpoints
     *
     * Create a new Discussion
     *
     * This endpoint lets a user publish a discussion/post.
     * @authenticated
     *
     * @bodyParam title string required The Post Title
     * @bodyParam body string required The body title
     *
     * @response status=200 {
     *
     * }
     *
     * @response status=400  {
     *
     * }
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $post = $this->postRepository->create($input);

        return $this->sendResponse($post->toArray(), 'Post saved successfully');
    }

    /**
     * @group Discussion Endpoints
     * Show Discussion Details
     *
     * This endpoint returns the discussion details.
     * @authenticated
     *
     * @urlParam id integer required The id of the specified discussion
     *
     * @response status=200 {
     *
     * }
     *
     * @response status=400 {
     *
     * }
     */
    public function show($id)
    {
        /** @var Post $post */
        $post = $this->postRepository->find($id)->with('comment:id,name,comment,approved');

        if (empty($post)) {
            return $this->sendError('Post not found');
        }

        return $this->sendResponse($post->toArray(), 'Post retrieved successfully');
    }


    public function update($id, UpdatePostAPIRequest $request)
    {
        $input = $request->all();

        /** @var Post $post */
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            return $this->sendError('Post not found');
        }

        $post = $this->postRepository->update($input, $id);

        return $this->sendResponse($post->toArray(), 'Post updated successfully');
    }


    public function destroy($id)
    {
        /** @var Post $post */
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            return $this->sendError('Post not found');
        }

        $post->delete();

        return $this->sendSuccess('Post deleted successfully');
    }
}
