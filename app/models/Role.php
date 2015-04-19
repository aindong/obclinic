<?php

class Role extends Eloquent {
    protected $table = 'roles';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasMany('User');
    }
}