<?php

/**
 * LimeSurvey
 * Copyright (C) 2007-2015 The LimeSurvey Project Team / Carsten Schmitz
 * All rights reserved.
 * License: GNU/GPL License v2 or later, see LICENSE.php
 * LimeSurvey is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

use \LimeSurvey\ExtensionInstaller\ExtensionUpdaterFactory;

/**
 */
class ExtensionUpdaterController extends Survey_Common_Action
{
    /**
     * Used to check for available updates for all plugins.
     * This method should be run at super admin login, max once every day.
     * Run by Ajax to avoid increased page load time.
     * @return void
     */
    public function checkAll()
    {
        $factory = new ExtensionUpdaterFactory();

        // Get one updater class for each extension type (PluginUpdater, ThemeUpdater, etc).
        $updaters = $factory->getAllUpdaters();

        // Get an extension updater for each extension installed.
        // TODO: Too many objects?
        $extensionUpdaters = [];
        foreach ($updaters as $updater) {
            $extensionUpdaters[] = array_merge($updater->createUpdaters(), $extensionUpdaters);
        }

        foreach ($extensionUpdaters as $extensionUpdater) {
            
        }
    }
}
