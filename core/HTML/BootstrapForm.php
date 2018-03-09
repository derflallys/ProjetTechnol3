<?php
namespace core\HTML;
/**
 * Created by PhpStorm.
 * User: ABOUBACAR
 * Date: 13/01/2017
 * Time: 00:49
 */
class BootstrapForm extends Form
{
    protected function surround($html,$option=null)
    {
        return "<div class=\"form-group row\">{$html}</div>";
    }

    protected function surroundInput($html)
    {
        return "<div class=\"col-sm-10\">{$html}</div>";
    }


    public function input($name,$label,$option = [])
    {
        $type = isset($option['type']) ? $option['type'] : 'text';
        $accept = isset($option['accept']) ? $option['accept'] : 'image/*';

        $labell = '<label for="'.$name.'" class="col-sm-2 col-form-label">'.$label.'</label>';
        $input = '<input id="'.$name.'" type="'.$type.'" name="'.$name.'" class="form-control" value="'.$this->getValue($name).'" required>';
        $input = $this->surroundInput($input);
        if($type==='textarea'){
            $input= '<textarea for="'.$name.'" class="form-control" name="'.$name.'">'.$this->getValue($name). '</textarea>';
        }
        if($type==='date')
        {

        }

       return  $this->surround($labell . $input);
   }

   public function submit()
   {
       return $this->surround('<button type="submit" class="btn btn-primary align-bo">Envoyer</button>');
   }

    public function select($name,$label,$options)
    {
        $labell = '<label for="'.$name.'" class="col-sm-2 col-form-label">'.$label.'</label>';
        $input = '<select class="form-control form-control-lg" name="'.$name.'">';

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
        return  $this->surround($labell . $input);

    }
}