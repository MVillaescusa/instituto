<?php

namespace App\Policies;

use App\Nivel;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NivelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any nivels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the nivel.
     *
     * @param  \App\User  $user
     * @param  \App\Nivel  $nivel
     * @return mixed
     */
    public function view(User $user, Nivel $nivel)
    {
        return true;
    }

    /**
     * Determine whether the user can create nivels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user -> isCoordinadorCentro($centro = null));
    }

    /**
     * Determine whether the user can update the nivel.
     *
     * @param  \App\User  $user
     * @param  \App\Nivel  $nivel
     * @return mixed
     */
    public function update(User $user, Nivel $nivel)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the nivel.
     *
     * @param  \App\User  $user
     * @param  \App\Nivel  $nivel
     * @return mixed
     */
    public function delete(User $user, Nivel $nivel)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the nivel.
     *
     * @param  \App\User  $user
     * @param  \App\Nivel  $nivel
     * @return mixed
     */
    public function restore(User $user, Nivel $nivel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the nivel.
     *
     * @param  \App\User  $user
     * @param  \App\Nivel  $nivel
     * @return mixed
     */
    public function forceDelete(User $user, Nivel $nivel)
    {
        //
    }

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }
}
