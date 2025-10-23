<?php

namespace App\Console;

use Leaf\Sprout\Command;

class GreetCommand extends Command
{
    protected $signature = 'greet
        {name=everyone : The name of the person}
        {--greeting=Hello : The greeting to use}';
    protected $description = 'An example command that greets a person with a specified greeting';
    protected $help = 'This command allows you to greet a person with a custom greeting.';

    protected function handle(): int
    {
        $name = $this->argument('name');
        $greeting = $this->option('greeting');

        $this->info("$greeting, $name!");

        return 0;
    }
}
