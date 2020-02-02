<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Expense extends Model
{
    protected $primaryKey = 'id';
    protected $table = "expenses";
    protected $cast = [
        'salarieswages'=>'float',
        'employeebenefits'=>'float',
        'allowances'=>'float',
        'totalps'=>'float',
        'totalamountmedicine'=>'float',
        'totalamountmedicalsupplies'=>'float',
        'totalamountutilities'=>'float',
        'totalamountnonmedicalservice'=>'float',
        'totalmooe'=>'float',
        'amountinfrastructure'=>'float',
        'amountequipment'=>'float',
        'totalco'=>'float',
        'reportingyear'=>'int'
    ];
}
