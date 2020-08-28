<?php

/**
 * Laravel DBML Tools
 *
 * @author    Marek Wysocki <maras3000@gmail.com>
 * @copyright 2020 Marek Wysocki / BigByte.pl (https://www.bigbyte.pl)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/bigbyte-pl/laravel-dbml-tools
 */

namespace BigbytePl\LaravelDbmlTools\Console;

//use BigbytePl\LaravelDbmlTools\Dbml;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

/**
 * A command to create DB migrations using DBML schema
 *
 * @author Marek Wysocki <maras3000@gmail.com>
 */
class MigrationCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'dbml-tools:migration';

    /**
     * @var Filesystem $files
     */
    protected $files;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create DB migrations using DBML schema';

    /**
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        echo "DBML Tools: Hello world";
        // @TODO: Write Create DB from DBML schema
    }
}
