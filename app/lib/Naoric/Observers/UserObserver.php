<?php

namespace Naoric\Observers;

/**
 * Description of UserObserver
 *
 * @author naoric
 */
class UserObserver {

  public function creating($user) {
    $user->registration_token(str_random(40));
  }

}
