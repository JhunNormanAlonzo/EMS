<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name' => 'array',
    ];

    //sa permission may role id
    //gusto ko kunin yung data ng role gamit ang role_id sa permission
    //gagawa ako ng function sa permission gamit ang convention name ng role , dahil ang gusto kong kunin ay data ng role
    //this permission belongsTo Role::class


    public function role(){
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

}
