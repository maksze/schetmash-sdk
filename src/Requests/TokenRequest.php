<?php

declare(strict_types=1);

namespace SchetmashSDK\Requests;

use SchetmashSDK\Contracts\Request;
use SchetmashSDK\Common\RequestTrait;

class TokenRequest implements Request
{
  use RequestTrait;

  const METHOD = 'POST';
  const ADDRESS = 'v1/token';
  const WITH_CREDENTIALS = true;
  const WITH_PAYLOAD = false;
}
