<?php

namespace App\Http\Controllers\API\support;

use App\Http\Controllers\Controller;
use App\Models\support\HAPDPPrevios;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class HAPDPPreviosController extends Controller
{
    public function index($ctrl_en): JsonResponse
    {
        $datos = HAPDPPrevios::where('CTRL_EN', $ctrl_en)
            ->where('ESTATUS', 'CONCLUIDO')
            ->select(
                'TIPO',
                'NOMBRE',
                'PUESTO',
                'OBSERVACIONES',
                'URL',
                'URL_CHECKLIST'
            )
            ->get();

        if ($datos->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Por el momento no hay Concluidos',
                'data' => []
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $datos
        ], 200);
    }




public function detalles($ctrl_en): JsonResponse
{
    // =============================
    // DETALLES (TABLA)
    // =============================
    $detalles = DB::table('HAP_DP_PREVIOS as p')
        ->leftJoin('HAP_DPVACANTES as v', function ($join) {
            $join->on('p.CTRL_EN', '=', 'v.CTRL_ENLACE')
                 ->on('p.CURP', '=', 'v.CURP');
        })
        ->where('p.CTRL_EN', $ctrl_en)
        ->where('p.ESTATUS', 'CONCLUIDO')
        ->select(
            'p.NO_CTRL',
            'p.NOMBRE',
            'p.SECRETARIA',
            'p.TIPO',
            'p.FECHA',
            'p.SUELDO_ANT',
            'p.PUESTA_ANT',
            'p.DEPTO_ANT',
            'p.DIREC_ANT',
            'p.SUELDO_ACT',
            'p.PUESTO',
            'p.DEPTO_ACT',
            'p.DIR_ACT',
            'p.OBSERVACIONES',
            'p.MOTIVO',
            'p.CURP',
            'p.REMANENTE',

            'v.NOMBRE_VACANTE',
            'v.NOCTRL_VACANTE'
        )
        ->get();


    // =============================
    // RESUMEN (TARJETAS)
    // =============================
    $resumen = DB::table('HAP_DP_PREVIOS')
        ->where('CTRL_EN', $ctrl_en)
        ->where('ESTATUS', 'CONCLUIDO')
        ->selectRaw("
            SUM(CASE WHEN TIPO = 'ALTA' THEN 1 ELSE 0 END) AS ALTAS,
            SUM(CASE WHEN TIPO = 'REINGRESO' THEN 1 ELSE 0 END) AS REINGRESOS,
            SUM(CASE WHEN TIPO = 'BAJA' THEN 1 ELSE 0 END) AS BAJAS,
            SUM(CASE WHEN TIPO = 'CAMBIO' THEN 1 ELSE 0 END) AS CAMBIOS,
            COUNT(*) AS TOTAL_MOVIMIENTOS
        ")
        ->first();


    if ($detalles->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'No hay datos',
            'data' => [],
            'resumen' => $resumen
        ], 404);
    }

    return response()->json([
        'success' => true,
        'data' => $detalles,
        'resumen' => $resumen
    ], 200);
}
}
