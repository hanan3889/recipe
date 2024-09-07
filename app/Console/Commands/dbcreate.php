<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new MysQL database based on config file or the provided parameter';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //Create DB
        $schemaName = $this->argument('name') ?:config('database.connections.mysql.database');
        $charset = config('database.connections.mysql.charset', 'utf8mb4');
        $collation = config('database.connections.mysql.collation', 'utf8mb4_general_ci');

        //Création de la requête
        config(['database.connections.mysql.database' => null]);

        //On drop d'abord
        $query = "DROP DATABASE $schemaName";
        DB::statement($query);

        //Puis on la recrée
        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation";
        DB::statement($query);

        echo "Database $schemaName created successfully";

        config(['database.connections.mysql.database' => $schemaName]);
    }
}
