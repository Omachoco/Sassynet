<?php

namespace App\Providers;

use App\User;
use App\Post;
use Illuminate\Support\Facades\Gate;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
		 Post::class => PostPolicy::class,
    ];
     
	 
       
    
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
          
        //
		
		Gate::resource('posts', 'App\Policies\PostPolicy');
		/*
	   Gate::define('update-post', function ($user, $post) {
        return $user->id == $post->user_id;
    });
	*/

    }
}
