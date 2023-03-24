<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controller\DataController;

class Data extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'data';
   
   
    public function users()
    {
       return $this->hasMany(User::class);
    }
}
