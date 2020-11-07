<?php

namespace App\Policies;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use phpDocumentor\Reflection\Types\Float_;

class PhonePolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Phone $phone)
    {
        return $phone->user_id == $user->id;
    }

    public function delete(User $user, Phone $phone)
    {
        return $phone->user_id == $user->id;
    }

}
