<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected  $table = 'task_listings';
    protected $guarded = [];
//    protected  $fillable = ['user_id' , 'description', 'estado'];

    //Una tarea pertenece a un usuario
    public function  user(){
        return $this->belongsTo(User::Class);
    }

    public function  tags(){
        return $this->belongsToMany(Tag::Class, foreignPivotKey:"task_listings_id");
    }
}



