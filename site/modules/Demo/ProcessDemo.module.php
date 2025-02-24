<?php

namespace ProcessWire;

class ProcessDemo extends Process
{
  public static function getModuleInfo()
  {
    return [
      'version' => '1.0.0',
      'requires' => [],
      'installs' => [],
      'page' => [
        'name' => 'demo',
        'parent' => 2,
        'title' => 'JS Hooks Demo',
      ],
    ];
  }

  public function init()
  {
    parent::init(); // always remember to call the parent init
  }

  public function execute()
  {
    $url = wire()->config->urls($this);
    wire()->config->scripts->add($url . 'modals.js');
    wire()->config->scripts->add($url . 'counter.js');
    wire()->config->scripts->add('https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js');
    return wire()->files->render(__DIR__ . '/demo.php');
  }
}
