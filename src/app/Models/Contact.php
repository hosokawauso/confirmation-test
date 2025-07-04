<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if(!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('last_name', 'like', '%' . $keyword . '%')
                ->orWhere('first_name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
      });

      return $query;
    }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if(!empty($gender)) {
            $query->where('gender', $gender);
        }

        return $query;
    }

    public function scopeCategorySearch($query, $categoryId)
    {
        if(!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        return $query;
    }

    public function scopeContactDateSearch($query, $date)
    {
        if(!empty($date)) {
            $query->whereDate('created_at', $date);
        }

        return $query;
    }


}