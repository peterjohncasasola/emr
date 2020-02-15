<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AudtitableContract;

class Ricd extends Model implements AudtitableContract
{
    use Auditable;
    protected $primaryKey = 'id';
    protected $table = "ricd10_lib";

}
