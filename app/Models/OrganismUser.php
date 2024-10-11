<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Organism;
use App\Models\User;

class OrganismUser extends Model
{
    use HasFactory;
    protected $table = 'organisms_users';
    protected $fillable = ['id_organism', 'id_user'];

    public function organism(): BelongsTo
    {
        return $this->belongsTo(Organism::class, 'id_organism');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
