<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.log
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

use Joomla\CMS\Factory;
    use Joomla\Utilities\ArrayHelper;

    defined('_JEXEC') or die;

/**
 * Joomla! System Logging Plugin.
 *
 * @since  1.5
 */
class PlgSystemJahrestage extends JPlugin
{

    protected $app;
    protected $document;

    /**
     * Render the checkboxes / radio
     * return HTML
     */


	public function onAfterRender()
    {
        $app    = Factory::getApplication();

        if($app->isClient('site'))
        {

            $params = $this->params;

            $jahrestageKomplett = (array) $params->get('jahrestage');

            $jahrestageArray = ArrayHelper::pivot($jahrestageKomplett, 'datum');
            $aktuellerTag = date("Y-m-d");

            $jahrestagAusgabe = null;

            if (array_key_exists($aktuellerTag,$jahrestageArray))
            {
                $jahrestagAusgabe = (array) $jahrestageArray[$aktuellerTag];
            }

            // das komplette HTML holen nach dem Rendern und nun bearbeiten

            $sHtml = $app->getBody();

            // Layout setzen, das geladen werden soll

            $layout = new JLayoutFile('jahrestage', JPATH_ROOT .'/plugins/system/jahrestage/layouts');
            $html = $layout->render($jahrestagAusgabe);

            // shortcode setzen: es wird nach dem Code [apotheken] im HTML gesucht und dieser wird durch das
            // Layout ersetzt

            $sHtml = str_replace('[jahrestage]', $html, $sHtml);

            $app->setBody($sHtml);
        }
    }
}
