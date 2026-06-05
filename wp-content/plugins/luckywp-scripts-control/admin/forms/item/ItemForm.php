<?php

namespace luckywp\scriptsControl\admin\forms\item;

use luckywp\scriptsControl\core\base\Model;
use luckywp\scriptsControl\plugin\entities\Item;

class ItemForm extends Model
{

    /**
     * @var string
     */
    public $caption;

    /**
     * @var string
     */
    public $body;

    public function __construct(Item $item = null, array $config = [])
    {
        if ($item) {
            $this->caption = $item->caption;
            $this->body = $item->body;
        }
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['caption', 'body'], 'filter', 'filter' => 'trim'],
            ['body', 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'caption' => esc_html__('Caption', 'luckywp-scripts-control'),
            'body' => esc_html__('Body', 'luckywp-scripts-control'),
        ];
    }

    public function toItem(Item $item)
    {
        $item->caption = $this->caption;
        $item->body = $this->body;
    }
}
