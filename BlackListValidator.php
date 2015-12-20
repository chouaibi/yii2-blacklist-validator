<?php
namespace chouaibi\validators;

use \yii\validators\Validator;

class BlackListValidator extends Validator
{
    /**
     * @var array Blacklist
     */
    public $blacklist;

    /**
     * @var bool strict array search to be used when calling in_array (extra check for type)
     */
    public $strict = false;

    public function init()
    {
        if (!count($this->blacklist)) {
            throw new \InvalidArgumentException('blacklist must contain at least one element');
        }
        if (!is_array($this->blacklist)) {
            throw new \InvalidArgumentException('blacklist should be an array');
        }

        if ($this->message === null) {
            $blacklist = '[' . implode(', ', $this->blacklist) . ']';
            $this->message = \Yii::t('yii',
                '{attribute} {value} is blacklisted, please check the list of reserved values:' . $blacklist);
        }
    }

    /**
     * Check if the value is blacklisted
     * @param mixed $value
     * @return array
     */
    public function validateValue($value)
    {
        if (in_array($value, $this->blacklist, $this->strict)) {
            return [
                $this->message,
            ];
        }
    }
}
