<?php

namespace App\Policies;

use App\Models\User;
use Sereny\NovaPermissions\Policies\BasePolicy;

class RolePolicy extends BasePolicy
{

    public $key = 'role';

}
