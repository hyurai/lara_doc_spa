<?php

namespace App\Console\Commands;

use App\Models\Entertainer;
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
       

        $URL = 'https://talent-dictionary.com/新田真剣佑';
        $goutte = GoutteFacade::request('GET', $URL);
    
        $a = $goutte->filter('.container');
        
        $b = $a->filter('.main');
        $c = $b->filter('h1')->text();
        dd($c);
        if($c == "ページが見つかりませんでした"){
            echo $c;
        }else{
            
            $d = $b->filter('img')->attr('src');
            $classage = $b->filter('.age')->text();
            $e = rtrim($classage,'歳');
            echo $c;
            echo $d;
            echo $e;
        }            
    }
}