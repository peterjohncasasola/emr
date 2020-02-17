<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\Ricd;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DataTables;

class RicdController extends Controller {

    public function index(){
        return view('layout.index');
    }

    public function show(Request $request){

        $data = array(
            'id'=>$request->input('id'),
            'icd10code'=>$request->input('icd10code'),
            'name'=>$request->input('name'),
        );

        $ricd = DB::table('ricd10_lib as ricd')
            ->select( 
                'ricd.id',
                'ricd.icd10code',
                'ricd.icd10desc',
                'ricd.icd10cat'
            )->limit(200);

        if ($data['id']){
            $ricd = $ricd->where('ricd.id', $data['id']);
        }

        if ($data['icd10code']){
            $ricd = $ricd->where('ricd.icd10code', $data['icd10code']);
        }

        $ricd = $ricd->get();
        
        return response()->json([
            // 'draw'=>1,
            'recordsTotal'=>$ricd->count(),
            // 'recordsFiltered'=>3,
            'status'=>200,
            'data'=>$ricd,
            'count'=>$ricd->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function show2(Request $request){

        $data = array(
            'id'=>$request->input('id'),
            'icd10code'=>$request->input('icd10code'),
            'name'=>$request->input('name'),
        );

        $ricd = Ricd::select('id', 'icd10desc', 'icd10code');
        return DataTables::of($ricd)->make(true);

    }
}