<?php

namespace App\Policies;

use App\Models\User;
use Sereny\NovaPermissions\Policies\BasePolicy;

class PermissionPolicy extends BasePolicy
{
    public $key = 'permission';

}
