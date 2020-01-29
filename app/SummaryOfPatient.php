<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SummaryOfPatient extends Model
{
    protected $primaryKey = 'id';
    protected $table = "hospOptSummaryOfPatients";

}
