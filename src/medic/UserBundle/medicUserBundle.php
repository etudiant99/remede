<?php

namespace medic\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class medicUserBundle extends Bundle
{
  public function getParent()
  {
    return 'FOSUserBundle';
  }
}
