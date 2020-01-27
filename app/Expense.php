<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Expense extends Model
{
    protected $primaryKey = 'id';
    protected $table = "expenses";

}
