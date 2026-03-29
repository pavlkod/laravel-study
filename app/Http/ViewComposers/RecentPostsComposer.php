<?php

namespace App\Http\ViewComposers;

use App\Models\User;
use App\Post;
use Illuminate\Contracts\View\View;

class RecentPostsComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct(
        protected User $users,
    ) {
    }

    public function compose(View $view)
    {
        $view->with('recentPosts', Post::recent());
    }
}
