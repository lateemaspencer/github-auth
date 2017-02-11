<?php

namespace App\Http\Controllers\Auth;

use \App\Github;
use Socialite;
use App\User;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
  protected $github;

  public function __constructor(\App\Github $github)
  {
    $this->github = $github;
  }

   public function redirectToProvider()
   {
        return Socialite::driver('github')->redirect();
   }

   public function handleProviderCallback(Github $github)
   {
        $user = Socialite::driver('github')->user();
        
        $user_name = $github->getUserName($user);
        $user_avatar = $user->avatar;
        $user_repos = $github->getUserRepos($user_name);
        
        $user_repos_issues = [];
        
        foreach($user_repos as $repo)
        {
           $issues = $github->getIssueList($repo);
           $repo->issue_list = $issues;
           
           array_push($user_repos_issues, $repo);
        }
        
        return response()->view(
          'dashboard', 
          ['user_name' => $user_name,
          'user_avatar' => $user_avatar,
          'user_repos_issues' => $user_repos_issues
          ]
        );
   }

}
