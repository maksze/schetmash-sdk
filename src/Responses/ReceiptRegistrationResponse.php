<?php

declare(strict_types=1);

namespace SchetmashSDK\Responses;

class ReceiptRegistrationResponse 
{
  /** @var string */
  private $id;

  /** @var string */
  private $status;

  /** @var array */
  private $payload;

  public function __construct($id, string $status, array $payload = [])
  {
    $this->id = $id;
    $this->status = $status;
    $this->payload = $payload;
  }

  /**
   * Get id.
   *
   * @return id.
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set id.
   *
   * @param id the value to set.
   */
  public function setId($id): self
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get status.
   *
   * @return status.
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * Set status.
   *
   * @param status the value to set.
   */
  public function setStatus($status): self
  {
    $this->status = $status;

    return $this;
  }

  /**
   * Get payload.
   *
   * @return payload.
   */
  public function getPayload(): array
  {
    return $this->payload;
  }

  /**
   * Set payload.
   *
   * @param payload the value to set.
   */
  public function setPayload(array $payload): self
  {
    $this->payload = $payload;

    return $this;
  }
}
