<?php

namespace BasicDashboard\Foundations\Domain\Roles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Role extends Model
{
    use HasFactory, SoftDeletes;
      //protected $table = 'table_name';
      protected $fillable = [

    ];

}
