<?php


namespace App\Core\Install;


use Symfony\Component\Finder\Finder;

class DatabaseSchema
{
    public static function getSqlFile(string $fileName): string
    {
        try {
            $finder = new Finder();
            $finder->in(__DIR__."/../../../config/doctrine");
            $finder->name($fileName.'.sql');
            dump($finder->files()->directories());
            $content = __DIR__."../../../config/doctrine/".$fileName.".sql";
            dump('sql file content:',$content);
        } catch (\Exception $exception) {
            throw new \Exception("Impossible de récupérer le fichier: ".$exception->getMessage());
        }
    }
}