<?php

namespace zikwall\EncoreInstaller;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

/**
 * Class EasyOnlineInstaller
 * @package zikwall\EasyOnlineInstaller
 *
 * example usage in composer.json:
 * <code>
 * "extra": {
 *      "installer-types": ["mycustom-module"],
 *      "installer-paths": {
 *          "modules/{$name}/": ["type:mycustom-module"]
 *      }
 * },
 *
 * </code>
 *
 * for working example
 *
 * <code>
 *
 * "installer-types": ["easy-online-module", "easy-online-theme"],
 * "installer-paths": {
 *    "vendor/zikwall/easy-online/modules/{$name}/": ["type:easy-online-module"],
 *    "vendor/zikwall/easy-online/themes/{$name}/": ["type:easy-online-theme"]
 * }
 *
 * </code>
 */
class EasyOnlineInstaller extends \Composer\Installers\Installer
{
    protected $packageTypes;

    public function getInstallPath(PackageInterface $package)
    {
        $installer = new EasyOnlineInstallerHelper($package, $this->composer, $this->io);
        $path = $installer->getInstallPath($package, $package->getType());
        return $path !== false ? $path : LibraryInstaller::getInstallPath($package);
    }

    public function supports($packageType)
    {
        if (!isset($this->packageTypes)) {
            $this->packageTypes = false;
            if ($this->composer->getPackage()) {
                $extra = $this->composer->getPackage()->getExtra();
                if (!empty($extra['installer-types'])) {
                    $this->packageTypes = (array) $extra['installer-types'];
                }
            }
        }

        return is_array($this->packageTypes) && in_array($packageType, $this->packageTypes);
    }

}
