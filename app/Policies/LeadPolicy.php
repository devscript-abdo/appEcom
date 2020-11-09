<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Lead;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class LeadPolicy
{
    use HandlesAuthorization;


    /*public function before($user, $ability)
    {
        return $user->hasRole('super-admin') ? true : false;
    }*/


    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Lead  $lead
     * @return mixed
     */
    public function view(Admin $user, Lead $lead)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Lead  $lead
     * @return mixed
     */
    public function update(Admin $user, Lead $lead)
    {
        //  return $lead->id === $user->id;
        return   $user->email === 'abdelgha4or@gmail.com'
            ? Response::allow()
            : Response::deny(trans('leadData.lead.permission.update'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Lead  $lead
     * @return mixed
     */
    public function delete(Admin $user, Lead $lead)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Lead  $lead
     * @return mixed
     */
    public function restore(Admin $user, Lead $lead)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Lead  $lead
     * @return mixed
     */
    public function forceDelete(Admin $user, Lead $lead)
    {
        //
    }
}
