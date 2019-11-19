<?php

declare(strict_types=1);

namespace SchetmashSDK\Requests;

use SchetmashSDK\Common\RequestTrait;
use SchetmashSDK\Contracts\Request;
use SchetmashSDK\Entity\Receipt;

class ReceiptRegistrationRequest implements Request
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

  /** @var Receipt */
  private $receipt;

  public function __construct(string $token, string $shop_id, string $operation, Receipt $receipt)
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
    $items = [];
    $total = 0;

    foreach ($this->receipt->getItems() as $item) {
      $items[] = [
        "name" => $item->getName(),
        "type" => $item->getType(),
        "mode" => $item->getMode(),
        "price" => $item->getPrice(),
        "quantity" => $item->getQuantity(),
        "sum" => $item->getSum(),
        "tax" => $item->getTax(),
        "tax_sum" => $item->getTaxSum(),
      ]; 

      $total += $item->getSum();
    }

    return [
      "timestamp" => $this->receipt->getTimestamp(),
      "external_id" => $this->receipt->getExternalId(),
      "service" => [
        "callback_url" => $this->receipt->getCallbackUrl() 
      ],
      "receipt" => [
        "attributes" => [
          "email" => $this->receipt->getBuyerEmail(),
          "phone" => $this->receipt->getBuyerPhone(),
          "name" => $this->receipt->getBuyerName(),
          "inn" => $this->receipt->getBuyerInn(),
        ],
        "items" => $items,
        "total" => $total,
        "payments" => [
          [
            "type" => 1,
            "sum" => $total
          ]
        ]
      ] 
    ]; 
  }
}
