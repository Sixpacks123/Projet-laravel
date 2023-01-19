<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LaunchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.// Arrange
        $this->app->instance('command.mycommand', new \App\Console\Commands\LaunchData());
        $this->app->make('Illuminate\Contracts\Console\Kernel')->registerCommand(LaunchData::class);

        // Act
        $this->artisan('mycommand');

        // Assert
        // Vérifier que la commande a été exécutée correctement
     *
     * @return int
     */
    public function handle()
    {
        $this->call('create:roles');
        $this->call('create:companies');
        $this->call('create:users');
        $this->call('create:offers');
        $this->call('create:features');
        $this->call('create:themes');
        $this->call('create:criteria');
        $this->call('create:centers');

        return 0;
    }
}
