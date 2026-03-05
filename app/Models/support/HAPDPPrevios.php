<?php

namespace App\Models\support;
use Illuminate\Database\Eloquent\Model;

class HAPDPPrevios extends Model
{
    protected $table = 'HAP_DP_PREVIOS';
    protected $primaryKey = 'FOLIO_SOLICITUD';
    public $timestamps = false;
}
