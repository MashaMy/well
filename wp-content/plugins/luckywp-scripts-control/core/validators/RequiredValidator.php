<?php

namespace luckywp\scriptsControl\core\validators;

class RequiredValidator extends Validator
{

    /**
     * @var bool
     */
    public $skipOnEmpty = false;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = sprintf(
                esc_html__('%s cannot be blank.', 'luckywp-scripts-control'),
                '{attribute}'
            );
        }
    }

    /**
     * @param mixed $value
     * @return array|null
     */
    protected function validateValue($value)
    {
        if (!$this->isEmpty(is_string($value) ? trim($value) : $value)) {
            return null;
        }
        return [$this->message, []];
    }
}
