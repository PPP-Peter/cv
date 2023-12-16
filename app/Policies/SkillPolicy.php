<?php

namespace App\Policies;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Auth\Access\Response;

 class SkillPolicy extends \Sereny\NovaPermissions\Policies\BasePolicy
 {
     public $key = 'skill';
 }

