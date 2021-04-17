<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DateFilterRequest;
use GuzzleHttp\Exception\GuzzleException;
use App\Http\Repositories\GitRepositoryInterface;

class PopularRepoController extends Controller
{
    protected $repository;

	public function __construct(GitRepositoryInterface $repository)
	{
	   $this->repository = $repository;
    }
    
    public function index()
    {
        try {
            return $this->repository->getSortedByNumberOfStars();
        } catch (GuzzleException $e) {
            return response()->json(['message'=>'Data is not found or has expired.'],422);
        }
    }

    public function topRepo(Request $request)
    {
        try {
            return $this->repository->getTopRepository($request->length);
        } catch (GuzzleException $e) {
            return response()->json(['message'=>'Data is not found or has expired.'],422);
        }
    }

    public function filterByDate(DateFilterRequest $request)
    {
        try {
            return $this->repository->getFilterByDateRepository($request->date);
        } catch (GuzzleException $e) {
            return response()->json(['message'=>'Data is not found please insert date. ex:2020-01-10'],422);
        }
    }
    
}
