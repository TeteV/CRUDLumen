<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    public $timestamps = false;
    protected $table = 'directorios';
    protected $fillable = [
      'nombre_completo',
        'direccion',
        'telefono',
        'url_foto'
    ];
}
