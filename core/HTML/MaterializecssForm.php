<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 04/08/17
 * Time: 21:42
 */

namespace core\HTML;


class MaterializecssForm extends Form
{
    protected function surround($html,$option=null)
    {
        if($option==='file')
            return "<div class=\"file-field input-field col s12\">{$html}</div>";
        return "<div class=\"input-field col s12\">{$html}</div>";
    }


    public function input($name,$label,$option = [])
    {
        $type = isset($option['type']) ? $option['type'] : 'text';
        $accept = isset($option['accept']) ? $option['accept'] : 'image/*';
        $labell = '<label for="'.$name.'">'.$label.'</label>';
        $input = '<input id="'.$name.'" type="'.$type.'"name="'.$name.'"  class="validate" value="'.$this->getValue($name).'"required>';

        if($type==='textarea'){
            $input= '<textarea required id="'.$name.'"  class="materialize-textarea" name="'.$name.'">'.$this->getValue($name). '</textarea>';
        }
        elseif($type==='file')
        {
            $input = '
                            <div class="btn">
                                <span>'.$label.'</span>
                                <input type="file"  name="'.$name.'" accept="'.$accept.'" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" name="'.$name.'" type="text">
                            </div>
                        ';
            return  $this->surround( $input,'file');
        }
    {

        }
        return  $this->surround( $input.$labell,null);
    }

    public function submit()
    {
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }

    public function select($name,$label,$options)
    {
        $labell = '<label>'.$label.'</label>';
        $input = '<select  name="'.$name.'" required>';
        //$input.=' <option value="" disabled selected>'.$label.'</option>';

        foreach ($options as $k => $v)
        {
            $attributes = '';
            if($k == $this->getValue($name))
            {
                 $attributes = 'selected';
            }
            $input .="<option value='$k' $attributes>$v </option>";
        }
        $input.='</select>';
        return  $this->surround(  $input .$labell   ,null);

    }
}