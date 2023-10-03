<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Categorie extends Model
{
protected $fillable = ['category_name'];

public function services()
{
return $this->hasMany(Service::class);
}
}