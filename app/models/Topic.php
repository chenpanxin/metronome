<?php

class Topic extends Eloquent {

    protected $fillable = ['category_id', 'title', 'body'];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function replies()
    {
        return $this->hasMany('Reply');
    }

    public function texts()
    {
        return $this->morphMany('Text', 'textable');
    }

    public function likers()
    {
        return $this->belongsToMany('User', 'likes');
    }

    public function blog()
    {
        return $this->hasOne('Metronome\Models\Blog');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('ranking', 'desc')->orderBy('created_at', 'desc');
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('title', 'LIKE', Str::matching($keyword))->popular()->paginate(16);
    }

    public function createdAt()
    {
        $datetime = new Metronome\Utils\DateTime($this->created_at);
        return $datetime->pretty();
    }
}
