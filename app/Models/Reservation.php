<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;

class Reservation extends Model
{
    use HasFactory;

    /**
     * usersテーブルとのリレーション
     *
     * @param void
     * @return 多対一のリレーション
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * usersテーブルとのリレーション
     *
     * @param void
     * @return 多対一のリレーション
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }


}
