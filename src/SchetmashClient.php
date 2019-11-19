<?php

declare(strict_types=1);

namespace SchetmashSDK;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use SchetmashSDK\Contracts\Request;
use SchetmashSDK\Entity\Receipt;
use SchetmashSDK\Requests\ReceiptCorrectionRequest;
use SchetmashSDK\Requests\ReceiptRegistrationRequest;
use SchetmashSDK\Requests\ReceiptStatusRequest;
use SchetmashSDK\Requests\TokenRequest;
use SchetmashSDK\Responses\ReceiptRegistrationResponse;
use SchetmashSDK\Responses\TokenResponse;
use function GuzzleHttp\default_user_agent;

final class SchetmashClient implements LoggerAwareInterface
{
  use LoggerAwareTrait;

  const BASE_URL = 'https://online.schetmash.com/lk/api/';

  const DEFAULT_TIMEOUT = 60;

  /** @var ClientInterface */
  private $http;

  /** @var string */
  private $account;

  /** @var string */
  private $password;
  
  /** @var string */
  private $shop_id;

  public function __construct(string $account, string $password, string $shop_id, ClientInterface $http = null)
  {
    $this->account = $account;
    $this->password = $password; 
    $this->shop_id = $shop_id; 

    $this->http = $http ?? new GuzzleClient([
      'base_uri' => self::BASE_URL,
      'timeout'  => self::DEFAULT_TIMEOUT,
      'headers'  => [
        'User-Agent' => $this->getDefaultUserAgent(),
      ],
    ]);
  }

  private function getDefaultUserAgent(): string
  {
    return default_user_agent();
  }

  private function sendRequest(Request $request)
  {
    try {
      $method = $request->getMethod();
      $address = $request->getAddress();

      if ($this->logger) {
        $this
          ->logger
          ->debug(sprintf(
            "SchetmashSDK: request address %s, method %s",
            $address,
            $method
          ));
      }

      $response = $this->http->request(
        $method,
        $address,
        $this->extractOptions($request)
      );

      return $this->createResponse($request, $response);
    } catch (Exception $e) {
      if ($this->logger) {
        $this
          ->logger
          ->error(sprintf(
            "SchetmashSDK: %s",
            $e->getMessage()
          ));
      }
    }
  }

  private function extractOptions(Request $request)
  {
    $options = [
      'headers' => [
        'Content-Type' => 'application/json',
      ]
    ];

    if ($request->useCredanials())
    {
      $options['body'] = \json_encode([
        'login' => $this->account,
        'password' => $this->password
      ]);
    }
    
    if ($request->usePayload())
    {
      $options['body'] = \json_encode($request->getPayload());
    }

    return $options;
  }

  private function createResponse(Request $request, ResponseInterface $response)
  {
    $responseBody = $response->getBody()->getContents();

    if ($this->logger) {
      $this
        ->logger
        ->debug(sprintf(
          "SchetmashSDK: response body: %s",
          $responseBody
        ));
    }

    $body = \json_decode($responseBody);

    if ($request instanceof TokenRequest)
    {
      return new TokenResponse($body->token);
    } else if ($request instanceof ReceiptRegistrationRequest)
    {
      return new ReceiptRegistrationResponse($body->id, $body->status, $body->payload);
    } else if ($request instanceof ReceiptRegistrationRequest)
    {
      return new ReceiptCorrectionRequest($body->id, $body->status);
    } else if ($request instanceof ReceiptStatusRequest)
    {
      return new ReceiptRegistrationResponse($body->id, $body->status); #TODO: status with payload
    } 

    throw new \Exception('no response');
  }

  public function sendTokenRequest()
  {
    return $this->sendRequest(new TokenRequest());
  }  

  public function sendReceiptRegistrationSellRequest(string $token, Receipt $data)
  {
    return $this->sendRequest(new ReceiptRegistrationRequest(
      $token,
      $this->shop_id,
      'sell',
      $data
    ));
  }

  public function sendReceiptRegistrationSellRefundRequest(string $token, Receipt $data)
  {
    return $this->sendRequest(new ReceiptRegistrationRequest(
      $token,
      $this->shop_id,
      'sell_refund',
      $data
    ));
  }

  public function sendReceiptRegistrationBuyRequest(string $token, Receipt $data)
  {
    return $this->sendRequest(new ReceiptRegistrationRequest(
      $token,
      $this->shop_id,
      'buy',
      $data
    ));
  }

  public function sendReceiptRegistrationBuyRefundRequest(string $token, Receipt $data)
  {
    return $this->sendRequest(new ReceiptRegistrationRequest(
      $token,
      $this->shop_id,
      'buy_refund',
      $data
    ));
  }

  public function sendReceiptSellCorrectionRequest(string $token, ReceiptCorrection $data)
  {
    return $this->sendRequest(new ReceiptRegistrationRequest(
      $token,
      $this->shop_id,
      'sell_correction',
      $data
    ));
  }

  public function sendReceiptBuyCorrectionRequest(string $token, ReceiptCorrection $data)
  {
    return $this->sendRequest(new ReceiptRegistrationRequest(
      $token,
      $this->shop_id,
      'buy_correction',
      $data
    ));
  }

  public function sendReceiptStatusRequest(string $token, $receipt_id, $receipt_external_id = null)
  {
    return $this->sendRequest(new ReceiptStatusRequest(
      $token,
      $this->shop_id,
      $receipt_id,
      $receipt_external_id
    ));
  }
}
