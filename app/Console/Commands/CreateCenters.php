<?php

namespace App\Console\Commands;

use App\Models\Center;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Console\View\Components\TwoColumnDetail;
use Illuminate\Support\Facades\DB;

class CreateCenters extends Command
{
    const CENTERS = [
        ['id' => 1, 'name' => 'Lery technologies', 'address' => '1 Rue de Paris 35510, Cesson-Sévigné',]
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:centers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Centers for App';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        try {
            foreach (self::CENTERS as $center) {
                if (!Center::where('name', $center['name'])->exists()) {
                    DB::table('centers')->insert([
                        $center
                    ]);
                    with(new TwoColumnDetail($this->getOutput()))->render(
                        '<fg=yellow;options=bold>CENTER : </>' . $center['name'],
                        '<fg=yellow;options=bold>ADDED</>'
                    );
                } else {
                    with(new TwoColumnDetail($this->getOutput()))->render(
                        '<fg=yellow;options=bold>CENTER : </>' . $center['name'],
                        '<bg=red;options=bold>EXISTS</>'
                    );
                }
            }
        } catch (Exception $e) {

            with(new TwoColumnDetail($this->getOutput()))->render(
                '<fg=red;options=bold>Error: </>' . $e->getMessage(),
                '<fg=red;options=bold>Failed to insert centers</>'
            );
        }
        return self::SUCCESS;
    }

}
