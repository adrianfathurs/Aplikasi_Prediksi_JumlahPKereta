<?php

namespace App\Http\Controllers;

use App\Models\PenumpangKeretaModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PenumpangKeretaController extends Controller
{
    public function index()
    {
        $penumpang = DB::table('penumpang_kereta')->get();
        return response()->json($penumpang);
    }

    public function tambahData(Request $request)
    {
        /* $rules = [
            'Bulan' => 'required | string',
            'Index_Bulan' => 'required | integer',
            'Tahun' => 'required | integer',
            'Jumlah_Penumpang' => 'required | integer',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $failed = 'failed on process';
            return response($failed);
        } else { */
        $data = $request->input();
        $userId = 1;
        try {
            $penumpang = new PenumpangKeretaModel();
            $penumpang->Index_Bulan = $data['Index_Bulan'];
            $penumpang->Bulan = $data['Bulan'];
            $penumpang->Tahun = $data['Tahun'];
            $penumpang->Jumlah_Penumpang = $data['Jumlah_Penumpang'];
            $penumpang->user_id = $userId;
            $penumpang->save();
            return response('Success to Saved Data', 200);
        } catch (Exception $e) {
            return response('Failed to Saved Data', 404);
        }
        /* } */
    }
    public function deleteData($id)
    {
        try {
            $penumpang = PenumpangKeretaModel::find($id);
            $penumpang->delete();
            return response('success', 202);
        } catch (Exception $e) {
            return response('Failed to Deleted Data', 404);
        }
    }
    public function updateData(Request $request, $id)
    {
        $data = $request->input();
        $userId = 0;
        try {
            $penumpang = PenumpangKeretaModel::find($id);
            $penumpang->user_id = $userId;
            $penumpang->update($request->all());
            return response('success', 202);
        } catch (Exception $e) {
            return response('Failed to Update Data', 404);
        }
    }
}