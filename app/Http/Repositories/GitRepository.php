<?php 
namespace App\Http\Repositories;

use GuzzleHttp\Client as GuzzleClient;
use App\Http\Resources\GetDataResource;

class GitRepository implements GitRepositoryInterface
{
    protected $client;

	public function __construct(GuzzleClient $client)
	{
        $this->client = $client;
    }

    private function fetchDataApi($data){
        return GetDataResource::collection(
            json_decode($data->getBody()->getContents())
            ->items
        );
    }

    public function getSortedByNumberOfStars() : object
    {
        return $this->fetchDataApi($this->client->request('GET', '?q=sort=stars&order=asc'));
    }
    
    public function getTopRepository($length) : object
    {
        // https://api.github.com/search/repositories?q=created:>2019-01-10&sort=stars&order=asc 
        return $this->fetchDataApi($this->client->request('GET', '?q=sort=stars&order=desc&per_page='.$length));
    }
    
    public function getFilterByDateRepository($date) : object
    {
        return $this->fetchDataApi($this->client->request('GET', '?q=created:>'.$date.'&sort=stars&order=desc'));
    }

}