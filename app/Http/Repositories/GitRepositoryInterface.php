<?php 

namespace App\Http\Repositories;

interface GitRepositoryInterface{

	public function getSortedByNumberOfStars();
	public function getTopRepository($length);
	public function getFilterByProgrammingLanguageRepository($language);
	public function getFilterByDateRepository($date);

}