<?php

namespace App\Http\Controllers\API\support;
use App\Http\Controllers\Controller;
use App\Models\support\HAPDPPrevios;
use Illuminate\Http\JsonResponse;

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
}
