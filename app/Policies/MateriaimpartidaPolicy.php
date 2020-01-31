<?php

namespace App\Policies;

use App\Materiaimpartida;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class MateriaimpartidaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any materiaimpartidas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the materiaimpartida.
     *
     * @param  \App\User  $user
     * @param  \App\Materiaimpartida  $materiaimpartida
     * @return mixed
     */
    public function view(User $user, Materiaimpartida $materiaimpartida)
    {
        //
    }

    /**
     * Determine whether the user can create materiaimpartidas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->isSuperAdmin() || $user->isCoordinadorCentro() || $user->isCreadorGrupo() || $user->isTutorGrupo()) {
            return  Response::allow();
        } else {
            return  Response::deny('Usted no tiene permisos para realizar esta acción.');
        }
    }

    /**
     * Determine whether the user can update the materiaimpartida.
     *
     * @param  \App\User  $user
     * @param  \App\Materiaimpartida  $materiaimpartida
     * @return mixed
     */
    public function update(User $user, Materiaimpartida $materiaimpartida)
    {
        if ($user->isSuperAdmin() || $user->isCoordinadorCentro() || $user->isCreadorGrupo() || $user->isTutorGrupo()) {
            return  Response::allow();
        } else {
            return  Response::deny('Usted no tiene permisos para realizar esta acción.');
        }
    }

    /**
     * Determine whether the user can delete the materiaimpartida.
     *
     * @param  \App\User  $user
     * @param  \App\Materiaimpartida  $materiaimpartida
     * @return mixed
     */
    public function delete(User $user, Materiaimpartida $materiaimpartida)
    {
        if ($user->isSuperAdmin() || $user->isCoordinadorCentro() || $user->isCreadorGrupo() || $user->isTutorGrupo()) {
            return  Response::allow();
        } else {
            return  Response::deny('Usted no tiene permisos para realizar esta acción.');
        }
    }

    /**
     * Determine whether the user can restore the materiaimpartida.
     *
     * @param  \App\User  $user
     * @param  \App\Materiaimpartida  $materiaimpartida
     * @return mixed
     */
    public function restore(User $user, Materiaimpartida $materiaimpartida)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the materiaimpartida.
     *
     * @param  \App\User  $user
     * @param  \App\Materiaimpartida  $materiaimpartida
     * @return mixed
     */
    public function forceDelete(User $user, Materiaimpartida $materiaimpartida)
    {
        //
    }
}
