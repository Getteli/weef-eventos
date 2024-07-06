<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nome',
        'date_evento',
        'estado',
        'cidade',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'telefone',
        'imagem',
        'is_active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_evento' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

	/**
	 * Get users
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function users()
	{
		return $this->BelongsTo(User::class,'user_id');
	}

    public function getId()
    {
        return $this->id;
    }
}