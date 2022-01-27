<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class asset extends Model
{
    

    use HasFactory;

    

    public function assettype(){
        return $this->belongsTo(assettype::class);
    }
    
}
