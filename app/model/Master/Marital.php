<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;
use App\Model\Master\Taxes;

class Marital extends Model
{
    protected $table = 'marital';
    protected $fillable = [
        'name', 'status'
    ];
    public $incrementing = false;

    public function taxes() {
        return $this->hasMany(Taxes::class);
    }
}
