<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\Policies\PostPolicy;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
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
		User::class => PostPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);


        $gate->before(function ($user,$ability) {
        	if ($user->ability === $ability) {
        		return true;
			}
		});
        //注册insert-update 认证/授权
		$gate->define('insert-update',function($user,$post) {
			return $user->id === $post->id;
		});

		$gate->after(function (){

		});
    }
}
