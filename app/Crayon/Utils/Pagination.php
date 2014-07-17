<?php namespace Crayon\Utils;

use Illuminate\Pagination\Presenter;

class Pagination extends Presenter {

    public function getPageLinkWrapper($url, $page, $rel = null)
    {
        $rel = is_null($rel) ? '' : ' rel="'.$rel.'"';

        return '<li><a href="'.$url.'"'.$rel.'>'.$page.'</a></li>';
    }

    public function getDisabledTextWrapper($text)
    {
        return '<li class="nil"><span>'.$text.'</span></li>';
    }

    public function getActivePageWrapper($text)
    {
        return '<li class="active"><span>'.$text.'</span></li>';
    }

    public function render()
    {
        $content = $this->lastPage < 13
            ? $this->getPageRange(1, $this->lastPage)
            : $this->getPageSlider();

        return join($content, [$this->getPrevious('<i class="icon-nav-left"></i>'), $this->getNext('<i class="icon-nav-right"></i>')]);
    }
}
