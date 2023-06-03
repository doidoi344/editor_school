<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class Course extends Model
{
    use HasFactory;

    /**
     * reservationsテーブルとのリレーション
     * 
     * @param void
     * @return 一対多のリレーション
     */
    public function reservations() 
    {
        return $this->hasMany(Reservation::class);
    }
     
}
