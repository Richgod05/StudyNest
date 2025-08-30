<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}

public function likes()
{
    return $this->hasMany(MaterialLike::class);
}

public function saves()
{
    return $this->hasMany(MaterialSave::class);
}

public function reports()
{
    return $this->hasMany(MaterialReport::class);
}
}
