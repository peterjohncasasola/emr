<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Expense extends Model
{
    protected $primaryKey = 'id';
    protected $table = "expenses";
    protected $cast = [
        'salarieswages'=>'double',
        'employeebenefits'=>'double',
        'allowances'=>'double',
        'totalps'=>'double',
        'totalamountmedicine'=>'double',
        'totalamountmedicalsupplies'=>'double',
        'totalamountutilities'=>'double',
        'totalamountnonmedicalservice'=>'double',
        'totalmooe'=>'double',
        'amountinfrastructure'=>'double',
        'amountequipment'=>'double',
        'totalco'=>'double',
        'reportingyear'=>'int'
    ];
}
