<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\Ricd;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class RicdController extends Controller {

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

        // if ($data['name']){
        //     $ricd = $ricd->where('ricd.icd10desc','LIKE', '%'.$data['name'].'%');
        // }

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

        // return response()->json([
        //     'draw'=>1,
        //     'recordsTotal'=>$ricd->count(),
        //     'recordsFiltered'=>10,
        //     'status'=>200,
        //     'data'=>$ricd
        // ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $ricd = new Ricd;
                $ricd->icd10code                            = $fields['icd10code'];
                $ricd->icd10desc                            = $fields['icd10desc'];
                $ricd->icd10cat                             = $fields['icd10cat'];
                $ricd->save();

                return response()->json([
                    'status' => 200,
                    'data' => null,
                    'message' => 'Successfully saved.'
                ]);

            // }
            // catch (\Exception $e) 
            // {
            //     return response()->json([
            //         'status' => 500,
            //         'data' => null,
            //         'message' => 'Error, please try again!'
            //     ]);
            // }
        });

        return $transaction;
    }

  	
}