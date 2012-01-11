<?php

/*
 * This file is a part of Sculpin.
 * 
 * (c) Dragonfly Development Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace sculpin\bundle\twigBundle;

use sculpin\Sculpin;

use sculpin\event\SourceFilesChangedEvent;

use sculpin\bundle\AbstractBundle;

class TwigBundle extends AbstractBundle
{

    const FORMATTER_NAME = 'twig';
    const CONFIG_VIEWS = 'twig.views';
    const CONFIG_EXTENSIONS = 'twig.extensions';
    
    /**
     * (non-PHPdoc)
     * @see sculpin\bundle.AbstractBundle::configureBundle()
     */
    public function configureBundle(Sculpin $sculpin)
    {
        $sculpin->exclude($sculpin->configuration()->get(self::CONFIG_VIEWS).'/**');
        $sculpin->registerFormatter(self::FORMATTER_NAME, new TwigFormatter(
            $sculpin->configuration()->getPath(self::CONFIG_VIEWS),
            $sculpin->configuration()->get(self::CONFIG_EXTENSIONS)
        ));
    }

}