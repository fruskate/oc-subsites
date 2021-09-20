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
        $httpHost = Request::getHttpHost();

        $site = SiteModel::where('domain', $httpHost)->first();

        if ($site) {
            Theme::setActiveTheme($site->theme);
        } else {
            Theme::setActiveTheme('demo');
        }

    }
}
