# easy-online-composer
🔧 Package manager for EasyOnline System

### Setup 

##### Add next lines to `extra` section for you `composer.json`

```json
{
  "extra": {
    "installer-types": ["easy-online-module", "easy-online-theme"],
      "installer-paths": {
        "vendor/zikwall/easy-online/modules/{$name}/": ["type:easy-online-module"],
        "vendor/zikwall/easy-online/themes/{$name}/": ["type:easy-online-theme"]
      }
  }
}

```
