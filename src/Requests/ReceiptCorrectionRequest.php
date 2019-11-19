<?php

declare(strict_types=1);

namespace SchetmashSDK\Requests;

use SchetmashSDK\Common\RequestTrait;
use SchetmashSDK\Contracts\Request;
use SchetmashSDK\Entity\ReceiptCorrection;

class ReceiptCorrectionRequest implements Request
{
  use RequestTrait;

  const METHOD = 'POST';
  const ADDRESS = 'v1/{shopid}/{operation}?token={token}';
  const WITH_CREDENTIALS = false;
  const WITH_PAYLOAD = true;

  /** @var string */
  private $token;
  
  /** @var string */
  private $shop_id;
  
  /** @var string */
  private $operation;

  /** @var ReceiptCorrection */
  private $receipt;

  public function __construct(string $token, string $shop_id, string $operation, ReceiptCorrection $receipt)
  {
    $this->token = $token;
    $this->shop_id = $shop_id;
    $this->operation = $operation;
    $this->receipt = $receipt;
  }

  public function getAddress(): string
  {
    return "v1/{$this->shop_id}/{$this->operation}?token={$this->token}";
  }

  public function getPayload(): array #TODO: use serializer
  {
    return [
      "timestamp" => $this->receipt->getTimestamp(),
      "external_id" => $this->receipt->getExternalId(),
      "service" => [
        "callback_url" => $this->receipt->getCallbackUrl() 
      ],
      "correction" => [
        "check" => [
          "inn" => $this->receipt->getInn(),
          "payment_address" => $this->receipt->getPaymentAaddress(),
        ],
        "info" => [
          "type" => $this->receipt->getInfoType(),
          "date" => $this->receipt->getInfoDate(),
          "number" => $this->receipt->getInfoNumber(),
          "description" => $this->receipt->getInfoDescription(),
        ],
        "payments" => [
          [
            "type" => $this->receipt->getPaymentsType(),
            "sum" => $this->receipt->getPaymentsSum(),
          ]
        ],
        "vats" => [
          "type" => $this->receipt->getVatsType(),
          "sum" => $this->receipt->getVatsSum(),
        ]
      ] 
    ]; 
  }
}
