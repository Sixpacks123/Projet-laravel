<?php

namespace App\Console\Commands;

use App\Models\Feature;
use Illuminate\Console\Command;

class CreateFeatures extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:features';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Dummy Features for your App';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
