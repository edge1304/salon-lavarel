<?php

namespace App\Components;
class Recusive
{

    private $data;
    private $htmlSelect = '';

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecusive($id = 0, $text = '')
    {
        foreach ($this->data as $category) {
            if ($category->id_parent == $id) {
                $this->htmlSelect .= "<option value=" . $category->id . ">" . $text . $category->category_name . "</option>";
                $this->categoryRecusive($category->id, $text . '--');
            }
        }
        return $this->htmlSelect;
    }
}
