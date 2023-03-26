<?php

namespace App\Policies;

use App\Models\BankSekoilah;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BankSekoilahPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BankSekoilah  $bankSekoilah
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, BankSekoilah $bankSekoilah)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BankSekoilah  $bankSekoilah
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BankSekoilah $bankSekoilah)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BankSekoilah  $bankSekoilah
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BankSekoilah $bankSekoilah)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BankSekoilah  $bankSekoilah
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, BankSekoilah $bankSekoilah)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BankSekoilah  $bankSekoilah
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, BankSekoilah $bankSekoilah)
    {
        //
    }
}
