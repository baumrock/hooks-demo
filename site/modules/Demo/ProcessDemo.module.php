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
    return wire()->files->render(__DIR__ . '/demo.php');
  }
}
