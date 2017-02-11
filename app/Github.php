<?php

namespace App;

use GuzzleHttp\Client;

class Github
{
	protected $client;

	public function __construct()
	{
		$this->client = new Client([
			'base_uri' => 'http://api.github.com'
		]);
	}

	private function getUserJson($user)
	{
		return json_decode($user->getBody()->getContents());
	}

	public function getUserName($user)
	{
		return $user->nickname;
	}

	public function getUserAvatar($user)
	{

		return $user->avatar_url;
	}

	public function getUserRepos($username)
	{
		$user_repositories = $this->getUserJson($this->client->get("users/{$username}/repos"));

		return $user_repositories;
	}

	public function getIssueList($repo)
	{
		$issues = $this->getUserJson($this->client->get("/repos/$repo->full_name/issues"));
		
		return $issues;
	}
}

