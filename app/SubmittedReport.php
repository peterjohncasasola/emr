<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AudtitableContract;

class SubmittedReport extends Model implements AudtitableContract
{
    use Auditable;
    
    protected $primaryKey = 'id';
    protected $table = "submittedreports";
}
