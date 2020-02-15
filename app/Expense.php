<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AudtitableContract;

class Expense extends Model implements AudtitableContract
{
    use Auditable;
    
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
