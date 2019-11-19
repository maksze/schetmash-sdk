<?php

declare(strict_types=1);

namespace SchetmashSDK\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use SchetmashSDK\Entity\Item;

class Receipt
{
  /** @var datetime */
  private $timestamp;

  /** @var string */
  private $external_id;

  /** @var string */
  private $callback_url;

  /** @var string */
  private $buyer_phone;

  /** @var string */
  private $buyer_email;

  /** @var string */
  private $buyer_name;

  /** @var string */
  private $buyer_inn;

  /** @var array*/
  private $items;

  public function __construct()
  {
    $this->timestamp = new \DateTime();
    $this->items = new ArrayCollection(); 
  }

  /**
   * Get timestamp.
   *
   * @return timestamp.
   */
  public function getTimestamp()
  {
    return $this->timestamp->format("Y-m-d H:i:s");
  }

  /**
   * Set timestamp.
   *
   * @param timestamp the value to set.
   */
  public function setTimestamp(\DateTimeInterface $timestamp): self
  {
    $this->timestamp = $timestamp;

    return $this;
  }

  /**
   * Get external_id.
   *
   * @return external_id.
   */
  public function getExternalId()
  {
    return $this->external_id;
  }

  /**
   * Set external_id.
   *
   * @param external_id the value to set.
   */
  public function setExternalId($external_id): self
  {
    $this->external_id = $external_id;

    return $this;
  }

  /**
   * Get callback_url.
   *
   * @return callback_url.
   */
  public function getCallbackUrl()
  {
    return $this->callback_url;
  }

  /**
   * Set callback_url.
   *
   * @param callback_url the value to set.
   */
  public function setCallbackUrl($callback_url): self
  {
    $this->callback_url = $callback_url;

    return $this;
  }

  /**
   * Get buyer_phone.
   *
   * @return buyer_phone.
   */
  public function getBuyerPhone()
  {
    return $this->buyer_phone;
  }

  /**
   * Set buyer_phone.
   *
   * @param buyer_phone the value to set.
   */
  public function setBuyerPhone($buyer_phone): self
  {
    $this->buyer_phone = $buyer_phone;

    return $this;
  }

  /**
   * Get buyer_email.
   *
   * @return buyer_email.
   */
  public function getBuyerEmail()
  {
    return $this->buyer_email;
  }

  /**
   * Set buyer_email.
   *
   * @param buyer_email the value to set.
   */
  public function setBuyerEmail($buyer_email): self
  {
    $this->buyer_email = $buyer_email;

    return $this;
  }

  /**
   * Get buyer_name.
   *
   * @return buyer_name.
   */
  public function getBuyerName()
  {
    return $this->buyer_name;
  }

  /**
   * Set buyer_name.
   *
   * @param buyer_name the value to set.
   */
  public function setBuyerName($buyer_name): self
  {
    $this->buyer_name = $buyer_name;

    return $this;
  }

  /**
   * Get buyer_inn.
   *
   * @return buyer_inn.
   */
  public function getBuyerInn()
  {
    return $this->buyer_inn;
  }

  /**
   * Set buyer_inn.
   *
   * @param buyer_inn the value to set.
   */
  public function setBuyerInn($buyer_inn): self
  {
    $this->buyer_inn = $buyer_inn;

    return $this;
  }

  /**
   * Get items.
   *
   * @return items.
   */
  public function getItems(): Collection
  {
    return $this->items;
  }

  /**
   * Add items.
   *
   * @param item the value to set.
   */
  public function addItem(Item $item): self
  {
    if (!$this->items->contains($item)) {
      $this->items[] = $item;
    }

    return $this;
  }
}
