<?php namespace Crayon\Utils;

use Image;

class Avatar {

    protected $file;
    protected $avatar;
    protected $filename;

    public function __construct($file)
    {
        $this->file = $file;
        $this->avatar = Image::make($this->file->getRealPath());
    }

    public function touch($filename)
    {
        $this->filename = $filename;
        return $this;
    }

    public function save()
    {
        $this->avatar->fit(256)->save($this->avatarUrl());
        $this->avatar->fit(156)->save($this->avatarUrl(156));
        $this->avatar->fit(56)->save($this->avatarUrl(56));
    }

    private function avatarUrl($size = null)
    {
        return join('/', [\public_path(), 'avatars', join('', [md5($this->filename), 's', $size ?: '256', '.jpg'])]);
    }
}
