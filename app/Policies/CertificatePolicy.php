<?php

namespace App\Policies;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Auth\Access\Response;

 class CertificatePolicy extends \Sereny\NovaPermissions\Policies\BasePolicy
 {
     public $key = 'certificate';
 }

