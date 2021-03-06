<?php

/**
 * GoCardless PHP library, core class
 *
 * @package GoCardless
 */

if (!function_exists('curl_init')) {
  throw new Exception('GoCardless needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('GoCardless needs the JSON PHP extension.');
}

// Include subclasses
require 'gocardless/utils.php';
require 'gocardless/exceptions.php';
require 'gocardless/bill.php';
require 'gocardless/user.php';
require 'gocardless/client.php';
require 'gocardless/merchant.php';
require 'gocardless/subscription.php';
require 'gocardless/pre_authorization.php';

/**
 * GoCardless class
 *
 */
class GoCardless {

  const VERSION = '0.1.1';

  /**
   * The environment: sandbox or live
   *
   * @var array $environment
   */
  public static $environment;

  /**
   * The environment: sandbox or live
   *
   * @var object $client
   */
  public static $client;

  /**
   * Initialization function called with account details
   *
   * @param $account_details array Array of account details
   */
  public static function set_account_details($account_details) {
    GoCardless::$client = new GoCardless_Client($account_details);
  }

  /**
   * Generate a URL to give a user to create a new subscription
   *
   * @param array $params Parameters to use to generate the URL
   *
   * @return string The generated URL
   */
  public static function new_subscription_url($params) {
    return GoCardless::$client->new_subscription_url($params);
  }

  /**
   * Generate a URL to give a user to create a new pre-authorized payment
   *
   * @param array $params Parameters to use to generate the URL
   *
   * @return string The generated URL
   */
  public static function new_pre_authorization_url($params) {
    return GoCardless::$client->new_pre_authorization_url($params);
  }

  /**
   * Generate a URL to give a user to create a new bill
   *
   * @param array $params Parameters to use to generate the URL
   *
   * @return string The generated URL
   */
  public static function new_bill_url($params) {
    return GoCardless::$client->new_bill_url($params);
  }

  /**
   * Generate a URL to give a user to create a new bill
   *
   * @param array $params Parameters to use to generate the URL
   *
   * @return string The generated URL
   */
  public static function confirm_resource($params) {
    return GoCardless::$client->confirm_resource($params);
  }

  /**
   * Validate the payload of a webhook
   *
   * @param array $params The payload of the webhook
   *
   * @return boolean True if webhook signature is valid
   */
  public static function validate_webhook($params) {
    return GoCardless::$client->validate_webhook($params);
  }

}

?>
