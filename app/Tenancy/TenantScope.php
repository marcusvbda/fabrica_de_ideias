<?php
namespace App\Tenancy;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('usuario_id', '=',Auth::user()->id);    
    }

    public function remove(Builder $builder, Model $model)
    {
        $builder->where('usuario_id', '=',Auth::user()->id);    
    }
}