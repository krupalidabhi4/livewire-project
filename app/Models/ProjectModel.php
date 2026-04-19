<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectModel extends Model
{

    public $table = 'projects';

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id', 'sub_category_id', 'country_id',
        'name_en', 'name_ar', 'contractor',
        'contractor_amount', 'cost', 'quantity',
        'project_type', 'slug',
        'execution_duration_contractor', 'execution_duration_donor',
        'status', 'is_bank_detail', 'bank_details',
        'is_additional_project', 'show_on_partner',
        'display_on', 'description_en', 'description_ar',
        'sms_text', 'sms_text_ar', 'image', 'thumbnail',
    ];

     /** casts() auto-converts DB values — no manual (int) needed */
    protected function casts(): array
    {
        return [
            'display_on'            => 'array',  // JSON auto-decode to array
            'contractor_amount'     => 'decimal:2',
            'cost'                  => 'decimal:2',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

}
