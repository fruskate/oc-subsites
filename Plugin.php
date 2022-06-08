<?php namespace Frukt\SubSites;

use System\Classes\PluginBase;
use Request;
use Cms\Classes\Theme;
use Frukt\SubSites\Models\Site as SiteModel;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
        return [
            'location' => [
                'label'       => 'Дополнительные домены',
                'description' => 'Управление доменами на проекте.',
                'category'    => 'domains',
                'icon'        => 'icon-globe',
                'url'         => \Backend::url('frukt/subsites/sites'),
                'order'       => 500,
                'keywords'    => 'domains'
            ]
        ];
    }

    public function boot()
    {
        \Event::listen('cms.theme.getActiveTheme', function () {

            $httpHost = Request::getHttpHost();
            $url = parse_url(env('APP_URL'), PHP_URL_HOST);

            if ($httpHost != $url) {
                $site = SiteModel::where('domain', $httpHost)->first();
                if ($site) {
                    return $site->theme;
                }
            }
        });

    }
}
