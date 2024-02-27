<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyIndustry extends Model
{
    use HasFactory;
    public function rCompany(){

        return $this->hasMany(Company::class);
    }
}
