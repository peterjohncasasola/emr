<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use DB;
use App\Surgery;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SurgeriesController extends Controller {

    public function show(Request $request){

        $data = array(
            'id'=>$request->input('id'),
            'proccode'=>$request->input('proccode'),
        );

        $surgery = DB::table('rsurgeries_lib as surgery')
            ->select( 
                'surgery.id',
                'surgery.proccode',
                'surgery.procdesc'
            );

        if ($data['id']){
            $surgery = $surgery->where('surgery.id', $data['id']);
        }

        if ($data['proccode']){
            $surgery = $surgery->where('surgery.proccode', $data['proccode']);
        }

        $surgery = $surgery->get();

        return response()->json([
            'status'=>200,
            'data'=>$surgery,
            'count'=>$surgery->count(),
            'message'=>''
        ],200,[], JSON_NUMERIC_CHECK);
    }

    public function store(Request $request){

        $fields = Input::post();

        $transaction = DB::transaction(function($field) use($fields){
            // try{

                $surgery = new Surgery;
                $surgery->proccode                           = $fields['proccode'];
                $surgery->procdesc                           = $fields['procdesc'];
                $surgery->save();

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