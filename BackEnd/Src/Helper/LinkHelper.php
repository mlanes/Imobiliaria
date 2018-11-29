<?php

use Core\Helper;

class LinkHelper extends Helper
{
    private $title;
    private $link;
    private $attr;

    public function __construct()
    {
        parent::__construct();
    }

    public function link($title, $link, $attr)
    {
        $this->title = $title;
        $this->link = $link;
        $this->attr = $attr;

        $this->prepareAttr();
        $this->prepareLink();
        $a = '<a href="' .  HOME_URL . $this->link . '" ' . $this->attr . '>' . $this->title . '</a>';
        return $a;
    }

    private function prepareAttr()
    {
        $attr = '';
        foreach ($this->attr as $attribute => $value) {
            $attr .= $attribute . '="' . $value . '" ';
        }
        $this->attr = $attr;
    }

    private function prepareLink()
    {
        $link = '';
        foreach ($this->link as $attribute => $value) {
            if ($attribute === 'Controller' || $attribute === 'Action') {
                $link .= $value . '/';
            }
            else {
                if (is_array($value)) {
                    for ($i = 0; $i < count($value); $i++) {
                        $link .= $value[$i] . '/';
                    }
                }
            }
        }
        $this->link = $link;
    }
}
