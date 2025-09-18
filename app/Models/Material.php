<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
        use HasFactory;
            protected $fillable = ['description', 'user_id', 'title','subject','tags','level','file_path'];


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
