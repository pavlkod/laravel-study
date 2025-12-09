<?php

namespace App\Policies;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
    }

    public function update($user, $contact)
    {
        return $user->id == $contact->user_id;
    }

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
}
