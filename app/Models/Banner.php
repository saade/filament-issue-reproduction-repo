<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'campaign_id',
    ];

    /** Uncomment this if using ->multiple() on the FileUpload */
    // protected $casts = [
    //     'image_url' => 'array',
    // ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
