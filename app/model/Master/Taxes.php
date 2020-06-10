<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;
use App\Model\Master\Marital;

class Taxes extends Model
{
    protected $table = 'taxes';
    protected $fillable = [
        'name', 'value', 'description', 'marital_id', 'status'
    ];
    public $incrementing = false;

    public function marital() {
        return $this->belongsTo(Marital::class);
    }
}
