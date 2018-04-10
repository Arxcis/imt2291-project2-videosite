<?php namespace App\Models;


class UsersModel extends \MVC\Core\Model {

  public $table = 'users';
  public $id;
  public $name;
  public $email;
  public $usergroup = 1;
  public $requestedgroup = 1;
  public $password;

  //public $tests = [TestModel::class];

  public $exclude = ['id', 'usergroup', 'requestedgroup'];
}