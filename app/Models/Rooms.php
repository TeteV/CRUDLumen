<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    public $timestamps = false;
    protected $table = 'rooms';
    protected $fillable = [
      'num',
        'num_ppl',
        'size',
        'avaible',
        'url_img',
        'dni_user'
    ];
}
