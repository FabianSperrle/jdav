<?php

class UserRoleField extends SelectField {

  public function __construct() {
    $this->type    = 'text';
    $this->icon    = 'user';
    $this->label   = l::get('fields.user.label', 'User');
    $this->options = array();

    foreach(kirby()->site()->users()->filterBy('role', $role) as $user) {
      $this->options[$user->username()] = $user->username();
    }

  }

}
