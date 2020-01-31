<?php

namespace App\Policies;

use App\Anyoescolar;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AnyoescolarPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any anyoescolars.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the anyoescolar.
     *
     * @param  \App\User  $user
     * @param  \App\Anyoescolar  $anyoescolar
     * @return mixed
     */
    public function view(User $user, Anyoescolar $anyoescolar)
    {
        //
    }

    /**
     * Determine whether the user can create anyoescolars.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isCoordinadorCentro()
            ? Response::allow()
            : Response::deny('No tienes permiso para crear un nuevo Año Escolar');
    }

    /**
     * Determine whether the user can update the anyoescolar.
     *
     * @param  \App\User  $user
     * @param  \App\Anyoescolar  $anyoescolar
     * @return mixed
     */
    public function update(User $user, Anyoescolar $anyoescolar)
    {
        //
    }

    /**
     * Determine whether the user can delete the anyoescolar.
     *
     * @param  \App\User  $user
     * @param  \App\Anyoescolar  $anyoescolar
     * @return mixed
     */
    public function delete(User $user, Anyoescolar $anyoescolar)
    {
        //
    }

    /**
     * Determine whether the user can restore the anyoescolar.
     *
     * @param  \App\User  $user
     * @param  \App\Anyoescolar  $anyoescolar
     * @return mixed
     */
    public function restore(User $user, Anyoescolar $anyoescolar)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the anyoescolar.
     *
     * @param  \App\User  $user
     * @param  \App\Anyoescolar  $anyoescolar
     * @return mixed
     */
    public function forceDelete(User $user, Anyoescolar $anyoescolar)
    {
        //
    }
}
