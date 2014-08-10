<?php

class Reply extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function topic()
    {
        return $this->belongsTo('Topic');
    }

    public function texts()
    {
        return $this->morphMany('Text', 'textable');
    }

    public function getText()
    {
        return $this->texts()->first();
    }

    public function markup()
    {
        $text = $this->getText();

        return $text ? $text->markup : null;
    }

    public function markdown()
    {
        $text = $this->getText();

        return $text ? $text->markdown : null;
    }
}
