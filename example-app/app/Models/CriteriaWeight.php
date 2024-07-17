<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaWeight extends Model
{
    use HasFactory;

    protected $fillable = ['alternative_id', 'entry_id', 'weight'];

    public function alternative()
    {
        return $this->belongsTo(Alternative::class);
    }

    public function entry()
    {
        return $this->belongsTo(Entry::class);
    }
}
