<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

 class JobPolicy extends \Sereny\NovaPermissions\Policies\BasePolicy
 {
     public $key = 'job';
 }

