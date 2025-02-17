<?php

namespace App\Console\Commands;

use App\Models\Entertainer;
use Exception;
use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade as GoutteFacade;
use Validator;


class Scraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:Scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
    }
}