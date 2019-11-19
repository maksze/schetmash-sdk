<?php

declare(strict_types=1);

namespace SchetmashSDK\Entity;

class Item 
{
  /** @var string */
  private $name;

  /** @var string */
  private $type;

  /** @var string */
  private $mode;

  /** @var string */
  private $price;

  /** @var integer */
  private $quantity;

  /** @var string */
  private $tax;

  /** @var string */
  private $tax_sum;

  public function __construct()
  {
    $this->type = 1;
    $this->mode = 4;
    $this->tax = 'none';
  }

  /**
   * Get name.
   *
   * @return name.
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set name.
   *
   * @param name the value to set.
   */
  public function setName($name): self
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get price.
   *
   * @return price.
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * Set price.
   *
   * @param price the value to set.
   */
  public function setPrice($price): self
  {
    $this->price = $price;

    return $this;
  }

  /**
   * Get quantity.
   *
   * @return quantity.
   */
  public function getQuantity()
  {
    return $this->quantity;
  }

  /**
   * Set quantity.
   *
   * @param quantity the value to set.
   */
  public function setQuantity(int $quantity): self
  {
    $this->quantity = $quantity;

    return $this;
  }

  /**
   * Get sum.
   *
   * @return sum.
   */
  public function getSum()
  {
    return $this->price * $this->quantity;
  }
  
  /**
   * Get tax.
   *
   * @return tax.
   */
  public function getTax()
  {
    return $this->tax;
  }

  /**
   * Set tax.
   *
   * @param tax the value to set.
   */
  public function setTax($tax): self
  {
    $this->tax = $tax;

    return $this;
  }

  /**
   * Get tax_sum.
   *
   * @return tax_sum.
   */
  public function getTaxSum()
  {
    return $this->tax_sum;
  }

  /**
   * Set tax_sum.
   *
   * @param tax_sum the value to set.
   */
  public function setTaxSum($tax_sum): self
  {
    $this->tax_sum = $tax_sum;

    return $this;
  }

  /**
   * Get type.
   *
   * @return type.
   */
  public function getType()
  {
    return $this->type;
  }

  /**
   * Set type.
   *
   * @param type the value to set.
   */
  public function setType($type)
  {
    $this->type = $type;
  }

  /**
   * Get mode.
   *
   * @return mode.
   */
  public function getMode()
  {
    return $this->mode;
  }

  /**
   * Set mode.
   *
   * @param mode the value to set.
   */
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
}
