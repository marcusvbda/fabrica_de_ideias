<?php
namespace App\Tenancy;
use Illuminate\Database\Eloquent\Model;
use App\Tenancy\Traits\TenantableTrait;
use Illuminate\Support\Facades\Auth;


class globalModel extends Model
{
    use TenantableTrait;
}



