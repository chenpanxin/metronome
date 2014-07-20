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
        foreach (range(512, 92, -105) as $size) {
            $this->avatar->fit($size)->save($this->avatarUrl($size));
        }
    }

    private function avatarUrl($size = null)
    {
        return join('/', [\public_path(), 'avatars', join('', [md5($this->filename), 's', $size, '.jpg'])]);
    }
}
