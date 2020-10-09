<?php

namespace App\Policies;

use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PharmacyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return mixed
     */
    public function view(User $user, Pharmacy $pharmacy)
    {
        return $user->isMine($pharmacy);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return mixed
     */
    public function update(User $user, Pharmacy $pharmacy)
    {
        //
        return $user->isAdmin() || $user->isMine($pharmacy);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return mixed
     */
    public function delete(User $user, Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return mixed
     */
    public function restore(User $user, Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return mixed
     */
    public function forceDelete(User $user, Pharmacy $pharmacy)
    {
        //
    }
}
