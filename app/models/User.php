<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'users';
  protected $guarded = ['id', 'password'];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = array('password');


  public static function boot() {
    parent::boot();

    static::saving(function($user) {
      $user->registration_token = str_random(40);
    });

//    static::observe(new Naoric\Observers\UserObserver);
  }

  /**
   * Get the unique identifier for the user.
   *
   * @return mixed
   */
  public function getAuthIdentifier() {
    return $this->getKey();
  }

  /**
   * Get the password for the user.
   *
   * @return string
   */
  public function getAuthPassword() {
    return $this->password;
  }

  /**
   * Generates an encrypted first login token
   * for account verification
   *
   * @return string
   */
  public function getFirstLoginToken() {
    $token = "{$this->registration_token};{$this->email}";
    return Crypt::encrypt($token);
  }

  /**
   * First login verification - given encrypted data
   * checks weather user token matches email address
   *
   * @param string $encrypted_token
   * @return boolean
   */
  public static function activateUser($encrypted_token) {
    $raw = Crypt::decrypt($encrypted_token);
    $token = split(';', $raw);

    $user = User::where('email', '=', $token[1])->first();
    if ($user->registration_token === $token[0]) {
      $user->active = TRUE;
    }

    return $user->active;
  }

  /**
   *
   * Hash password when user created or modified
   *
   * @param type $password
   */
  public function setPasswordAttribute($password) {
    $this->attributes['password'] = Hash::make($password);
  }

  /**
   * Get the e-mail address where password reminders are sent.
   *
   * @return string
   */
  public function getReminderEmail() {
    return $this->email;
  }

  /**
   * Get active status of the user
   *
   * @return boolean
   */
  public function isActive() {
    return $this->active;
  }

}
