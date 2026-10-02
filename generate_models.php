<?php
$models = [
    'Category' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass Category extends Model\n{\n    protected \$guarded = [];\n\n    public function posts()\n    {\n        return \$this->hasMany(Post::class);\n    }\n}",
    'Post' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\nuse Illuminate\Database\Eloquent\SoftDeletes;\n\nclass Post extends Model\n{\n    use SoftDeletes;\n\n    protected \$guarded = [];\n\n    protected \$casts = [\n        'published_at' => 'datetime',\n    ];\n\n    public function category()\n    {\n        return \$this->belongsTo(Category::class);\n    }\n\n    public function user()\n    {\n        return \$this->belongsTo(User::class);\n    }\n}",
    'Announcement' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\nuse Illuminate\Database\Eloquent\SoftDeletes;\n\nclass Announcement extends Model\n{\n    use SoftDeletes;\n\n    protected \$guarded = [];\n\n    protected \$casts = [\n        'is_active' => 'boolean',\n    ];\n\n    public function user()\n    {\n        return \$this->belongsTo(User::class);\n    }\n}",
    'Event' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass Event extends Model\n{\n    protected \$guarded = [];\n\n    protected \$casts = [\n        'start_date' => 'datetime',\n        'end_date' => 'datetime',\n    ];\n}",
    'Gallery' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass Gallery extends Model\n{\n    protected \$guarded = [];\n\n    public function user()\n    {\n        return \$this->belongsTo(User::class);\n    }\n\n    public function items()\n    {\n        return \$this->hasMany(GalleryItem::class);\n    }\n}",
    'GalleryItem' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass GalleryItem extends Model\n{\n    protected \$guarded = [];\n\n    public function gallery()\n    {\n        return \$this->belongsTo(Gallery::class);\n    }\n}",
    'Staff' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\nuse Illuminate\Database\Eloquent\SoftDeletes;\n\nclass Staff extends Model\n{\n    use SoftDeletes;\n\n    protected \$guarded = [];\n}",
    'Extracurricular' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass Extracurricular extends Model\n{\n    protected \$guarded = [];\n}",
    'Achievement' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass Achievement extends Model\n{\n    protected \$guarded = [];\n\n    protected \$casts = [\n        'date' => 'date',\n    ];\n}",
    'Page' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass Page extends Model\n{\n    protected \$guarded = [];\n}",
    'Facility' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass Facility extends Model\n{\n    protected \$guarded = [];\n}",
    'Download' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass Download extends Model\n{\n    protected \$guarded = [];\n\n    public function user()\n    {\n        return \$this->belongsTo(User::class);\n    }\n}",
    'ContactMessage' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass ContactMessage extends Model\n{\n    protected \$guarded = [];\n\n    protected \$casts = [\n        'is_read' => 'boolean',\n    ];\n}",
    'Setting' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\nuse Illuminate\Support\Facades\Cache;\n\nclass Setting extends Model\n{\n    protected \$guarded = [];\n\n    protected static function booted()\n    {\n        static::saved(function (\$setting) {\n            Cache::forget('setting_' . \$setting->key);\n        });\n\n        static::deleted(function (\$setting) {\n            Cache::forget('setting_' . \$setting->key);\n        });\n    }\n}",
    'Testimonial' => "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass Testimonial extends Model\n{\n    protected \$guarded = [];\n}",
];

foreach ($models as $name => $content) {
    file_put_contents(__DIR__ . '/app/Models/' . $name . '.php', $content);
}
echo "Models generated.\n";
