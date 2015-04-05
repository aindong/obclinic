<?php
namespace Aindong\Features\Medias\Models;

class Media extends \Eloquent {
    protected $table = 'medias';
    protected $fillable = ['name'];

    public $rules = [];

    public function imageable()
    {
        return $this->morphTo();
    }
}