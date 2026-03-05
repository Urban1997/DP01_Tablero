<?php

namespace App\Models\support;
use Illuminate\Database\Eloquent\Model;

class HAPDPObservaciones extends Model
{
    protected $table = 'HAP_DPOBSERVACIONES';

    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'ID',
        'FOLIO',
        'ENLACE_CTRL',
        'ESTATUS',
        'URL',
        'OBSERVACIONES',
        'NOMBRE_COLAB',
        'PUESTO',
        'IDENTIFICACION_OFICIAL',
        'CURP',
        'ACTA_NAC',
        'RFC',
        'COMP_DOMICILIO',
        'NSS',
        'CONST_INHABILITADO',
        'CART_NOPENALES',
        'CERT_MEDICO',
        'CV',
        'COMP_ESTUDIOS',
        'REP_PSICOMETRICO',
        'RESP_INFONAVIT',
        'RESP_EVALUACION',
        'SINTESIS_CURRICULAR',
        'AVISO_NOMINA',
        'AVISO_IMSS',
        'CART_RENUNCIA',
        'ACT_ADMIN',
        'ACT_DEFUNCION',
        'IDENTIFICACION_BAJA',
        'TIPO_MOVIMIENTO',
        'CURP_COLAB',
        'CTRL',
        'CEDULA_PROFESIONAL',
        'FECHA_CREACION',
        'E_FIRMA',
        'CARTILLA_MILITAR',
        'CURSO_FORMACION_POLICIA',
        'RNOA',
        'OFICIO_REINCORPORACION_PUESTO'
    ];
}
