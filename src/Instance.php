<?php

namespace jwwisniewski\Jigsaw\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use jwwisniewski\Jigsaw\Core\Traits\MultiLangSupport;

class Instance extends Model
{
    use SoftDeletes, MultiLangSupport;

    protected $casts = [
        'title' => 'array',
        'url' => 'array',
        'keywords' => 'array',
        'description' => 'array',
    ];

    protected $multiLang = ['title', 'url', 'keywords', 'description'];
    protected $fillable = ['title', 'url', 'keywords', 'description', 'module'];

}
