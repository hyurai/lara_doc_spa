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
        $goutte = GoutteFacade::request('GET', "https://talent-dictionary.com/広瀬すず");
        $goutte->filter('.article_header')->each(function ($ul) {
            $ul->filter('.header_top')->each(function ($li) {
                $is = $li->filter('img')->attr('src');
                echo $is;
                $age = $li->filter('.age')->text();
                $a = rtrim($age,'歳');
                echo $a;
                echo "-----------------------";
                $n = $li->filter('h1')->text();
                echo $n;
                echo "-----------------------";
            });
        });
    }
}