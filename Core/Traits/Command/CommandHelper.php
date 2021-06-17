<?php

namespace Core\Traits\Command;

/**
 * @author @smhdhsn
 * 
 * @version 1.0.0
 */
trait CommandHelper
{
    /**
     * Creates an Instance Of This Class.
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    public function __construct()
    {
        $this->argument = $_SERVER['argv'][1] ?? null;
    }

    /**
     * Saving Command's Information.
     * 
     * @since 1.0.0
     * 
     * @param string $commandName
     * @param mixed $callback
     * 
     * @return void
     */
    private function saveCommand(string $commandName, $callback): void
    {
        $this->commands[$commandName] = $callback;
    }

    /**
     * Getting Command's Callback.
     * 
     * @since 1.0.0
     * 
     * @return mixed
     */
    private function getCallback()
    {
        return $this->commands[$this->argument];
    }

    /**
     * Saving Passed Params Via Command Line.
     * 
     * @since 1.0.0
     * 
     * @return void
     */
    private function saveParams(): void
    {
        for ($i = 2; $i < count($_SERVER['argv']); $i++) {
            $this->params[] = $_SERVER['argv'][$i];
        }
    }
}