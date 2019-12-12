<?php

namespace App\Policies;

use App\User;
use App\Library;
use Illuminate\Auth\Access\HandlesAuthorization;

class LibraryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can edit the library.
     * 
     * @param  \App\User  $user
     * @param  \App\Library  $library
     * @return mixed
     */
    public function edit(User $user, Library $library)
    {
        return $user->id === $library->user_id;
    }

    /**
     * Determine whether the user can update the library.
     *
     * @param  \App\User  $user
     * @param  \App\Library  $library
     * @return mixed
     */
    public function update(User $user, Library $library)
    {
        return $user->id === $library->user_id;
    }
}
