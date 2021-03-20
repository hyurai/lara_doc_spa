<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade as GoutteFacade;


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
        $URL = "https://talent-dictionary.com/hoge";
        $goutte = GoutteFacade::request('GET', $URL);
        $goutte->filter('.article_header')->each(function ($ul) {

            $ul->filter('.header_top')->each(function ($li) {
                
                $name = $li->filter('h1')->text();
                $entertainer = Entertainer::firstOrNew(['name' => $name]);
               
                if($entertainer->wasResentlyCreated){
                    $entertainer->name = $name;
                    $image_url = $li->filter('img')->attr('src');
                    $entertainer->image_url = $image_url;
                    $classage = $li->filter('.age')->text();
                    $age = rtrim($classage,'歳');
                    $entertainer->age = $age;
                    $entertainer->save();
                }
            });
        });
    }
}