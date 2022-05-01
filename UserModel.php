<?php

namespace nikola\phpFramework;

use nikola\phpFramework\db\DbModel;

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}