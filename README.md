Yii 2 blacklist validator
==============

A Validator that will check if a model attribute is blacklisted.


Installation and usage
=====================
#### Installation
    $ composer require chouaibi/yii2-notinarray-validator
or

Add the package to your composer.json file.
``` json
{
  "require": {
    "chouaibi/yii2-blacklist-validator" : "dev-master"
  }
}
```
then run

    $ composer update


#### Usage

``` php

    use chouaibi\validators\BlackListValidator;

    public function rules() {
        return [
            [['attribute'], BlackListValidator::className(), 'array' => ['black','listed','values']],
        ];
    }
```

With custom message
``` php

    use chouaibi\validators\BlackListValidator;

    public function rules() {
        return [
            [['attribute'], BlackListValidator::className(), 'array' => ['black','listed','values'],'message' => 'The attribute value is reserved. Please check our reserved values ...'],
        ];
    }
```
