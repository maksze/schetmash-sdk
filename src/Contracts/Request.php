<?php

declare(strict_types=1);

namespace SchetmashSDK\Contracts;

interface Request
{
  public function getMethod(): string;
  public function getAddress(): string;
}
