<?php namespace Eyeweb\MissionControl\Console;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

/**
 * Class GenerateSitemap
 * @package Eyeweb\MissionControl\Console
 */
class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Generate sitemap.';

    /**
     * InstallMC constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));
    }
}
