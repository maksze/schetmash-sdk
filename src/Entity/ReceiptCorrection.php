<?php

declare(strict_types=1);

namespace SchetmashSDK\Entity;

class ReceiptCorrection
{
  /** @var datetime */
  private $timestamp;

  /** @var string */
  private $external_id;

  /** @var string */
  private $callback_url;

  /** @var string */
  private $inn;
  
  /** @var string */
  private $payment_address;

  /** @var string */
  private $payment_address;

  /** @var integer */
  private $info_type;

  /** @var string */
  private $info_date;

  /** @var string */
  private $info_number;

  /** @var string */
  private $info_description;

  /** @var string */
  private $payments_type;

  /** @var string */
  private $payments_sum;

  /** @var string */
  private $vats_type;

  /** @var string */
  private $vats_sum;
  
  public function __construct()
  {
    $this->timestamp = new \DateTime();
  }
    
    /**
     * Get timestamp.
     *
     * @return timestamp.
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
    
    /**
     * Set timestamp.
     *
     * @param timestamp the value to set.
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }
    
    /**
     * Get external_id.
     *
     * @return external_id.
     */
    public function getExternal_id()
    {
        return $this->external_id;
    }
    
    /**
     * Set external_id.
     *
     * @param external_id the value to set.
     */
    public function setExternal_id($external_id)
    {
        $this->external_id = $external_id;
    }
    
    /**
     * Get callback_url.
     *
     * @return callback_url.
     */
    public function getCallback_url()
    {
        return $this->callback_url;
    }
    
    /**
     * Set callback_url.
     *
     * @param callback_url the value to set.
     */
    public function setCallback_url($callback_url)
    {
        $this->callback_url = $callback_url;
    }
    
    /**
     * Get inn.
     *
     * @return inn.
     */
    public function getInn()
    {
        return $this->inn;
    }
    
    /**
     * Set inn.
     *
     * @param inn the value to set.
     */
    public function setInn($inn)
    {
        $this->inn = $inn;
    }
    
    /**
     * Get payment_address.
     *
     * @return payment_address.
     */
    public function getPayment_address()
    {
        return $this->payment_address;
    }
    
    /**
     * Set payment_address.
     *
     * @param payment_address the value to set.
     */
    public function setPayment_address($payment_address)
    {
        $this->payment_address = $payment_address;
    }
    
    /**
     * Get info_type.
     *
     * @return info_type.
     */
    public function getInfo_type()
    {
        return $this->info_type;
    }
    
    /**
     * Set info_type.
     *
     * @param info_type the value to set.
     */
    public function setInfo_type($info_type)
    {
        $this->info_type = $info_type;
    }
    
    /**
     * Get info_date.
     *
     * @return info_date.
     */
    public function getInfo_date()
    {
        return $this->info_date;
    }
    
    /**
     * Set info_date.
     *
     * @param info_date the value to set.
     */
    public function setInfo_date($info_date)
    {
        $this->info_date = $info_date;
    }
    
    /**
     * Get info_number.
     *
     * @return info_number.
     */
    public function getInfo_number()
    {
        return $this->info_number;
    }
    
    /**
     * Set info_number.
     *
     * @param info_number the value to set.
     */
    public function setInfo_number($info_number)
    {
        $this->info_number = $info_number;
    }
    
    /**
     * Get info_description.
     *
     * @return info_description.
     */
    public function getInfo_description()
    {
        return $this->info_description;
    }
    
    /**
     * Set info_description.
     *
     * @param info_description the value to set.
     */
    public function setInfo_description($info_description)
    {
        $this->info_description = $info_description;
    }
    
    /**
     * Get payments_type.
     *
     * @return payments_type.
     */
    public function getPayments_type()
    {
        return $this->payments_type;
    }
    
    /**
     * Set payments_type.
     *
     * @param payments_type the value to set.
     */
    public function setPayments_type($payments_type)
    {
        $this->payments_type = $payments_type;
    }
    
    /**
     * Get payments_sum.
     *
     * @return payments_sum.
     */
    public function getPaymentsSum()
    {
        return $this->payments_sum;
    }
    
    /**
     * Set payments_sum.
     *
     * @param payments_sum the value to set.
     */
    public function setPaymentsSum($payments_sum)
    {
        $this->payments_sum = $payments_sum;
    }
    
    /**
     * Get vats_type.
     *
     * @return vats_type.
     */
    public function getVats_type()
    {
        return $this->vats_type;
    }
    
    /**
     * Set vats_type.
     *
     * @param vats_type the value to set.
     */
    public function setVats_type($vats_type)
    {
        $this->vats_type = $vats_type;
    }
    
    /**
     * Get vats_sum.
     *
     * @return vats_sum.
     */
    public function getVatsSum()
    {
        return $this->vats_sum;
    }
    
    /**
     * Set vats_sum.
     *
     * @param vats_sum the value to set.
     */
    public function setVatsSum($vats_sum)
    {
        $this->vats_sum = $vats_sum;
    }
}
