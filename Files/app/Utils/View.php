<?php

namespace App\Utils;

class View
{

    private static function getContentView(string $view): string
    {
        $file = __DIR__ . '/../../resources/view/' . $view  . '.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    public static function render(string $view, array $vars = []): string
    {
        //Conteúdo da view
        $contentView = self::getContentView($view);

        //Chaves do Array de Vars
        $keys = array_keys($vars);
        $keys = array_map(function ($item){
            return '{{' . $item . '}}';
        }, $keys);

        //Retorna o conteúdo renderizado
        return str_replace($keys, array_values($vars), $contentView);
    }
}