<?php

declare(strict_types=1);

namespace SchetmashSDK\Requests;

use SchetmashSDK\Common\RequestTrait;
use SchetmashSDK\Contracts\Request;

class ReceiptStatusRequest implements Request
{
  use RequestTrait;

  const METHOD = 'GET';
  const WITH_CREDENTIALS = false;
  const WITH_PAYLOAD = false;

  /** @var string */
  private $token;
  
  /** @var string */
  private $shop_id;

  private $receipt_id;
    
  private $receipt_external_id;

  public function __construct(string $token, string $shop_id, $receipt_id, $receipt_external_id = null)
  {
    $this->token = $token;
    $this->shop_id = $shop_id;
    $this->receipt_id = $receipt_id;
    $this->receipt_external_id = $receipt_external_id;
  }

  public function getAddress(): string
  {
    if ($this->receipt_external_id)
    {
      return "v1/{$this->shop_id}/report?token={$this->token}&external_id={$this->receipt_external_id}";
    } else {
      return "v1/{$this->shop_id}/report/{$this->receipt_id}?token={$this->token}";
    }
  }
}
