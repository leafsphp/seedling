<!-- markdownlint-disable no-inline-html -->
<p align="center">
    <br><br>
    <img src="https://github.com/user-attachments/assets/3a50d848-4290-4a46-8ab1-bc0a148da375" height="100"/>
</p>

<h1 align="center">Seedling</h1>

[![Latest Stable Version](https://poser.pugx.org/leafs/seedling/v/stable)](https://packagist.org/packages/leafs/seedling)
[![Total Downloads](https://poser.pugx.org/leafs/seedling/downloads)](https://packagist.org/packages/leafs/seedling)
[![License](https://poser.pugx.org/leafs/seedling/license)](https://packagist.org/packages/leafs/seedling)

Seedling is a lightweight PHP micro-framework for building CLI apps in minutes. It's built on top of Leaf Sprout and provides a simple and elegant syntax for defining commands, interacting with users, and handling input and output.

## 📦 Setting Up

You can create a seedling project using the Leaf CLI

```bash
leaf create my-seedling-app --console
```

Or with composer

```bash
composer create-project leafs/seedling my-seedling-app
```

Once installed, Seedling will automatically configure itself, so you can type out `php leaf` to run your app.

## Quick Start

In development, you can always access your commands as well as some built-in seedling commands by running

```bash
php leaf
```

But once you publish your package to composer, your users will be able to run your app using the name of the file in the `bin` directory. For example, if your file is named `greeter`, they can run

```bash
./vendor/bin/greeter
```

Or if installed globally

```bash
greeter
```

## Creating Commands

You can create your own commands by using the `g:command` command. For example, to create a `greet` command, you can run

```bash
php leaf g:command greet
```

This will create a new command in the `app/console` directory as `GreetCommand.php`, which will have some boilerplate code to get you started.

```php
<?php

namespace App\Console;

use Leaf\Sprout\Command;

class GreetCommand extends Command
{
    protected $signature = 'greet
        {name : The name of the person}
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
```

You can then run your command using

```bash
php leaf greet John --greeting Hi
```
