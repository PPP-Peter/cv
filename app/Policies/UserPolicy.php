<?php

namespace App\Policies;

use App\Models\User;
use Sereny\NovaPermissions\Policies\BasePolicy;

class UserPolicy extends BasePolicy
{
    public $key = 'user';

}
