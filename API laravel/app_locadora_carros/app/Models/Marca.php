<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'imagem'];

    public function rules()
    {
        return [
            "nome" => "required|unique:marcas,nome,".$this->id."|min:3",
            "imagem" => "required|file|mimes:png"
        ];
    }

    public function feedback()
    {
        return [
            "required" => "O campo :attribute é obrigatório",
            "nome.unique" => "O nome da marca ja existe",
            "nome.min" => "O nome deve ter no minimo 3 caracteres",
            "imagem.mimes" => "O tipo do arquivo deve ser .png"
        ];
    }

    public function Modelos()
    {
        //Uma marca possui muitos modelos
        return $this->hasMany('App\Models\Modelo');
    }
}
