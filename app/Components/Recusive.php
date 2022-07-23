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

    public function categoryRecusive($id_parent = null, $id = 0, $text = '')
    {
        foreach ($this->data as $category) {
            if ($category->id_parent == $id) {
                $isSelected = "";
                if(!empty($id_parent) && $id_parent == $category->id_parent) $isSelected = "selected";
                $this->htmlSelect .= "<option $isSelected value=" . $category->id . ">" . $text . $category->category_name . "</option>";
                $this->categoryRecusive($id_parent,$category->id, $text . '--');
            }
        }
        return $this->htmlSelect;
    }
}
