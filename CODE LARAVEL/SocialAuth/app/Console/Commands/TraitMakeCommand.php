<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;


class TraitMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:trait';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trait';


    //metodo es para definir la llamada al codigo ejecutar

    protected function getStub()
    {
        return __DIR__.'/stubs/trait.stub';

    }

    protected function getDefaultNameSpace($rootNameSpace)
    {
        return $rootNameSpace.'\Traits';

    }
}