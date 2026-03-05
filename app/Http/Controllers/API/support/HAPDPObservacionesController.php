<?php

namespace App\Http\Controllers\API\support;

use App\Http\Controllers\Controller;
use App\Models\support\HAPDPObservaciones;
use Illuminate\Http\JsonResponse;

class HAPDPObservacionesController extends Controller
{
    public function index($ctrl_en): JsonResponse
    {
        $datos = HAPDPObservaciones::where('ENLACE_CTRL', $ctrl_en)
            ->where('ESTATUS', 'CON OBSERVACIONES')
            ->select([
                'TIPO_MOVIMIENTO',
                'PUESTO',
                'NOMBRE_COLAB',
                'OBSERVACIONES',
                'URL'
            ])
            ->get();

        if ($datos->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Por el momento no hay observaciones',
                'data' => []
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $datos
        ], 200);
    }
}
