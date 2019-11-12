<?php

namespace App\Policies;

use Auth;
use App\User;
use App\Statues;

use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function destroy(User $user, Statues $statues)
    {
      return true;    
    }
}
