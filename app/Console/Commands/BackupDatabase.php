<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()

        {
            if (!file_exists(storage_path('app/backup'))) {
                mkdir(storage_path('app/backup'), 0755, true);
            }


            $databaseName = env('DB_DATABASE');
            $username = env('DB_USERNAME');
            $password = env('DB_PASSWORD');
            $host = env('DB_HOST');
            $port = env('DB_PORT', '3306');
    
            $date = now()->format('Y-m-d_H-i-s');
            $backupFile = "backup/{$databaseName}_{$date}.sql";
            $mysqldumpPath ='C:\xampp\mysql\bin\mysqldump.exe';
            $command = "{$mysqldumpPath} --user={$username} --password={$password} --host={$host} --port={$port} {$databaseName} > " . storage_path("app/{$backupFile}");
        
            exec($command, $output, $return);
    
            if ($return === 0) {
                $this->info('Backup successfully created: ' . storage_path("app/{$backupFile}"));
            } else {
                $this->error('Backup failed.');
            }
        }
    }
