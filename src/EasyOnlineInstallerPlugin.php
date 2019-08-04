<?php

namespace zikwall\EasyOnlineComposer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class EasyOnlineInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new EasyOnlineInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}
