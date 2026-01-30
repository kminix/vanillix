<?php
declare(strict_types =1);

namespace App\Support;

final class View
{
    public static function render(string $view, array $data = [], ?string $layout = "layouts/main"): string
    {
     
        $content = self::renderFile($view, $data);

        if($layout === null){
            return $content;
        }

        return self::renderFile($layout, array_merge($data, [
            'content'=>$content,
        ]));
    }

    public static function e(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    private static function renderFile(string $view, array $data): string
    {
        $base = dirname(__DIR__) . '/Views';
        $path = $base . '/' . str_replace('.', '/', $view) . '.php';

        if(!is_file($path)){
            throw new \RuntimeException("View Not Found: {$path}");
        }

        extract($data, EXTR_SKIP);
        ob_start();
        require $path;
        return (string) ob_get_clean();
    }


    //Helper Function
    public static function partial(string $view, array $data = []) : string
    {
        // We do not want to render the whole layouts section for partials
        return self::renderFile($view, $data);
    }


}