<?php namespace Metronome\Utils;

use Illuminate\Pagination\Presenter;

class Pagination extends Presenter {

    public function getPageLinkWrapper($url, $page, $rel = null)
    {
        $rel = is_null($rel) ? '' : ' rel="'.$rel.'"';

        return '<li><a href="'.$url.'"'.$rel.'>'.$page.'</a></li>';
    }

    public function getDisabledTextWrapper($text)
    {
        return '<li><span>'.$text.'</span></li>';
    }

    public function getActivePageWrapper($text)
    {
        return '<li class="actived"><span>'.$text.'</span></li>';
    }

    public function render()
    {
        $content = $this->lastPage < 13
            ? $this->getPageRange(1, $this->lastPage)
            : $this->getPageSlider();

        return join($content, [$this->getPrevious('<span class="icon-prev"></span>'), $this->getNext('<span class="icon-next"></span>')]);
    }
}
