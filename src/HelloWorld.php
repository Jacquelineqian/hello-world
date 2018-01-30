<?php

namespace Vbot\HelloWorld;

use Illuminate\Support\Collection;
use Hanson\Vbot\Extension\AbstractMessageHandler;

class HelloWorld extends AbstractMessageHandler
{
    public $author = 'QianJiqQi';

    public $version = '1.0';

    public $name = 'hello_world';

    public $zhName = '你好世界';

   
    public function handler(Collection $collection)
    {
        if ($collection['type'] === 'text' && $collection['content'] === 'hello') {
            if (($collection['fromType'] === 'Group' && $collection['isAt']) || $collection['fromType'] === 'Friend') {
                Text::send($collection['from']['UserName'], 'world');
            }
        }
    }

    /**
     * 注册拓展时的操作.
     */
    public function register()
    {
        $default_config = [
            'status'        => true
        ];
        $this->config = array_merge($default_config, [$this->config]);
        $this->status = $this->config['status'];
    }
}
