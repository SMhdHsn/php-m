<?php

namespace Core\Traits\Making\Commands;

use Core\Classes\{CommandLineInterface as CLI, Str};

/**
 * @author @SMhdHsn
 * 
 * @version 1.0.0
 */
trait MakingService
{
    /**
     * Making a Repository With Given Information.
     * 
     * @since 1.0.0
     * 
     * @param array $params
     * 
     * @return string
     */
    protected function service(array $params): string
    {
        if (! $params[1])
            return CLI::out('Please Enter A Name For Your Service !', CLI::RED);

        $fileName = ucfirst($params[1]);

        $blueprint = $this->getBlueprint('Service');
        $originPath = $this->originPath('App', 'Services', $fileName);

        $finalContent = Str::placeValue([
            '{%author%}' => '@' . ltrim($_ENV['CURRENT_AUTHOR'], '@'),
            '{%version%}' => $_ENV['CURRENT_VERSION'],
            '{%PascalCase%}' => $fileName,
        ], $blueprint);

        $this->createFile($finalContent, $originPath);

        return CLI::out("Service created successfully.", CLI::BLUE);
    }
}
