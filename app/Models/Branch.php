<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $connection = 'pgsql2';
    protected $table = 'master_data.master_branch';
    protected $fillable = [
        'branch_id', 'branch_code', 'branch_name', 'branch_short_name', 'branch_address', 'branch_phone_no', 'branch_active'
    ];
}