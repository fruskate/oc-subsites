<?php namespace Frukt\SubSites\Models;

use Model;
use Cms\Classes\Theme;

/**
 * Model
 */
class Site extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'frukt_subsites_sites';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'domain' => 'required|unique:frukt_subsites_sites',
        'theme'  => 'required'
    ];

    public function getThemeOptions()
    {
        $themes = Theme::allAvailable();
        $returnArray = array();


        foreach ($themes as $theme) {
            $returnArray[$theme->getId()] = $theme->getDirName();
        }

        return $returnArray;
    }
}
