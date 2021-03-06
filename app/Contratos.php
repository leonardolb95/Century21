<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model {
    protected $table = 'contratos';

    protected $fillable = [
        'solicitud_id',
        'fraccionamiento_id',
        'saldo',
        'plazo',
        'monto_mensual',
        'fecha'
    ];

    public function fraccionamiento(){
        return $this->belongsTo('App\Fraccionamiento');
    }

    public function solicitud(){
        return $this->belongsTo('App\Solicitud');
    }

    public function mensualidades(){
        return $this->belongsTo('App\Mensualidad');
    }
}
