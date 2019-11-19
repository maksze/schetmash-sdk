<?php

declare(strict_types=1);

namespace SchetmashSDK\Common;

trait RequestTrait
{
  public function getMethod(): string
  {
    return self::METHOD;
  }
  
  public function getAddress(): string
  {
    return self::ADDRESS;
  }
  
  public function useCredanials(): bool
  {
    return self::WITH_CREDENTIALS || false;
  }
  
  public function usePayload(): bool
  {
    return self::WITH_PAYLOAD || false;
  }
}
