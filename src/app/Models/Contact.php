<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function scopeKeywordSearch($query, $keyword)
    {
        if(!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                ->orwhere('email', 'like', '%' . $keyword . '%');
      });
    }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if(!empty($gender)) {
            $query->where('gender', $gender);
        }
    }

    public function scopeCategorySearch($query, $category)
    {
        if(!empty($category)) {
            $query->where('category', $category);
        }
    }

    public function scopeContactDateSearch($query, $date)
    {
        if(!empty($date)) {
            $query->whereDate('created_at', $date);
        }
    }


}