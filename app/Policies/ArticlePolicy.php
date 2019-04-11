<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Article;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function add(User $user) {
        foreach($user->roles as $role) {
            if($role->name == 'Admin') {
                return true;
            }
        }
        return false;
    }

    public function update(User $user, $article) {
        foreach($user->roles as $role) {
            if($role->name == 'Admin') {
                if($user->id == $article->user_id) {
                    return true;
                }                
            }
        }
        return false;
    }
}
