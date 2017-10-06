<?php
/**
 * Created by PhpStorm.
 * User: Amaia.H
 * Date: 06/10/2017
 * Time: 15:24
 */

class Template
{
    public static $data = array();

    public static function addData($name, $value){
        self::$data[$name] = $value ;
    }

    public static function getData($name)
    {
        return self::$data[$name];
    }

    public static function show($view)
    {
        if($view == null){
            throw new Exception('La vue n\'est vide !');
        }else{
            if (!file_exists('view/'. $view . '.php')){
                throw new Exception('La vue n\'existe pas !');
            }else{
                require_once 'view/'. $view . '.php';
            }
        }
    }
}