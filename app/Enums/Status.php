<?php

namespace App\Enums;

class Status
{
    const ACTIVE = 'active';
    const EXPIRED = 'expired';
    const INACTIVE = 'inactive';

    const STATUSES = [
      self::ACTIVE,
      self::EXPIRED,
      self::INACTIVE
    ];
}
