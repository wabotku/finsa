<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2019 - 2022, CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @copyright	Copyright (c) 2019 - 2022, CodeIgniter Foundation (https://codeigniter.com/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/userguide3/libraries/config.html
 */
class CI_Model
{

	/**
	 * Common HTTP status codes and their respective description.
	 *
	 * @link http://www.restapitutorial.com/httpstatuscodes.html
	 */
	// Informational responses
	const HTTP_CONTINUE = 100;
	const HTTP_SWITCHING_PROTOCOLS = 101;
	const HTTP_PROCESSING = 102;

	// Success responses
	const HTTP_OK = 200;
	const HTTP_CREATED = 201;
	const HTTP_ACCEPTED = 202;
	const HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
	const HTTP_NO_CONTENT = 204;
	const HTTP_RESET_CONTENT = 205;
	const HTTP_PARTIAL_CONTENT = 206;
	const HTTP_MULTI_STATUS = 207;
	const HTTP_ALREADY_REPORTED = 208;
	const HTTP_IM_USED = 226;

	// Redirection messages
	const HTTP_MULTIPLE_CHOICES = 300;
	const HTTP_MOVED_PERMANENTLY = 301;
	const HTTP_FOUND = 302;
	const HTTP_SEE_OTHER = 303;
	const HTTP_NOT_MODIFIED = 304;
	const HTTP_USE_PROXY = 305;
	const HTTP_TEMPORARY_REDIRECT = 307;
	const HTTP_PERMANENT_REDIRECT = 308;

	// Client error responses
	const HTTP_BAD_REQUEST = 400;
	const HTTP_UNAUTHORIZED = 401;
	const HTTP_PAYMENT_REQUIRED = 402;
	const HTTP_FORBIDDEN = 403;
	const HTTP_NOT_FOUND = 404;
	const HTTP_METHOD_NOT_ALLOWED = 405;
	const HTTP_NOT_ACCEPTABLE = 406;
	const HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;
	const HTTP_REQUEST_TIMEOUT = 408;
	const HTTP_CONFLICT = 409;
	const HTTP_GONE = 410;
	const HTTP_LENGTH_REQUIRED = 411;
	const HTTP_PRECONDITION_FAILED = 412;
	const HTTP_PAYLOAD_TOO_LARGE = 413;
	const HTTP_URI_TOO_LONG = 414;
	const HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
	const HTTP_RANGE_NOT_SATISFIABLE = 416;
	const HTTP_EXPECTATION_FAILED = 417;
	const HTTP_IM_A_TEAPOT = 418;
	const HTTP_MISDIRECTED_REQUEST = 421;
	const HTTP_UNPROCESSABLE_ENTITY = 422;
	const HTTP_LOCKED = 423;
	const HTTP_FAILED_DEPENDENCY = 424;
	const HTTP_UPGRADE_REQUIRED = 426;
	const HTTP_PRECONDITION_REQUIRED = 428;
	const HTTP_TOO_MANY_REQUESTS = 429;
	const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
	const HTTP_CONNECTION_CLOSED_WITHOUT_RESPONSE = 444;
	const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = 451;
	const HTTP_CLIENT_CLOSED_REQUEST = 499;

	// Server error responses
	const HTTP_INTERNAL_SERVER_ERROR = 500;
	const HTTP_NOT_IMPLEMENTED = 501;
	const HTTP_BAD_GATEWAY = 502;
	const HTTP_SERVICE_UNAVAILABLE = 503;
	const HTTP_GATEWAY_TIMEOUT = 504;
	const HTTP_VERSION_NOT_SUPPORTED = 505;
	const HTTP_VARIANT_ALSO_NEGOTIATES = 506;
	const HTTP_INSUFFICIENT_STORAGE = 507;
	const HTTP_LOOP_DETECTED = 508;
	const HTTP_NOT_EXTENDED = 510;
	const HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;
	const HTTP_NETWORK_CONNECT_TIMEOUT_ERROR = 599;


	// Informational responses
	public $HTTP_CONTINUE = 100;
	public $HTTP_SWITCHING_PROTOCOLS = 101;
	public $HTTP_PROCESSING = 102;

	// Success responses
	public $HTTP_OK = 200;
	public $HTTP_CREATED = 201;
	public $HTTP_ACCEPTED = 202;
	public $HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
	public $HTTP_NO_CONTENT = 204;
	public $HTTP_RESET_CONTENT = 205;
	public $HTTP_PARTIAL_CONTENT = 206;
	public $HTTP_MULTI_STATUS = 207;
	public $HTTP_ALREADY_REPORTED = 208;
	public $HTTP_IM_USED = 226;

	// Redirection messages
	public $HTTP_MULTIPLE_CHOICES = 300;
	public $HTTP_MOVED_PERMANENTLY = 301;
	public $HTTP_FOUND = 302;
	public $HTTP_SEE_OTHER = 303;
	public $HTTP_NOT_MODIFIED = 304;
	public $HTTP_USE_PROXY = 305;
	public $HTTP_TEMPORARY_REDIRECT = 307;
	public $HTTP_PERMANENT_REDIRECT = 308;

	// Client error responses
	public $HTTP_BAD_REQUEST = 400;
	public $HTTP_UNAUTHORIZED = 401;
	public $HTTP_PAYMENT_REQUIRED = 402;
	public $HTTP_FORBIDDEN = 403;
	public $HTTP_NOT_FOUND = 404;
	public $HTTP_METHOD_NOT_ALLOWED = 405;
	public $HTTP_NOT_ACCEPTABLE = 406;
	public $HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;
	public $HTTP_REQUEST_TIMEOUT = 408;
	public $HTTP_CONFLICT = 409;
	public $HTTP_GONE = 410;
	public $HTTP_LENGTH_REQUIRED = 411;
	public $HTTP_PRECONDITION_FAILED = 412;
	public $HTTP_PAYLOAD_TOO_LARGE = 413;
	public $HTTP_URI_TOO_LONG = 414;
	public $HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
	public $HTTP_RANGE_NOT_SATISFIABLE = 416;
	public $HTTP_EXPECTATION_FAILED = 417;
	public $HTTP_IM_A_TEAPOT = 418;
	public $HTTP_MISDIRECTED_REQUEST = 421;
	public $HTTP_UNPROCESSABLE_ENTITY = 422;
	public $HTTP_LOCKED = 423;
	public $HTTP_FAILED_DEPENDENCY = 424;
	public $HTTP_UPGRADE_REQUIRED = 426;
	public $HTTP_PRECONDITION_REQUIRED = 428;
	public $HTTP_TOO_MANY_REQUESTS = 429;
	public $HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
	public $HTTP_CONNECTION_CLOSED_WITHOUT_RESPONSE = 444;
	public $HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = 451;
	public $HTTP_CLIENT_CLOSED_REQUEST = 499;

	// Server error responses
	public $HTTP_INTERNAL_SERVER_ERROR = 500;
	public $HTTP_NOT_IMPLEMENTED = 501;
	public $HTTP_BAD_GATEWAY = 502;
	public $HTTP_SERVICE_UNAVAILABLE = 503;
	public $HTTP_GATEWAY_TIMEOUT = 504;
	public $HTTP_VERSION_NOT_SUPPORTED = 505;
	public $HTTP_VARIANT_ALSO_NEGOTIATES = 506;
	public $HTTP_INSUFFICIENT_STORAGE = 507;
	public $HTTP_LOOP_DETECTED = 508;
	public $HTTP_NOT_EXTENDED = 510;
	public $HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;
	public $HTTP_NETWORK_CONNECT_TIMEOUT_ERROR = 599;


	public $HTTP_RESP = [
		// Informational responses
		100 => 'CONTINUE',
		101 => 'SWITCHING PROTOCOLS',
		102 => 'PROCESSING',

		// Success responses
		200 => 'OK',
		201 => 'CREATED',
		202 => 'ACCEPTED',
		203 => 'NON-AUTHORITATIVE INFORMATION',
		204 => 'NO CONTENT',
		205 => 'RESET CONTENT',
		206 => 'PARTIAL CONTENT',
		207 => 'MULTI-STATUS',
		208 => 'ALREADY REPORTED',
		226 => 'IM USED',

		// Redirection messages
		300 => 'MULTIPLE CHOICES',
		301 => 'MOVED PERMANENTLY',
		302 => 'FOUND',
		303 => 'SEE OTHER',
		304 => 'NOT MODIFIED',
		305 => 'USE PROXY',
		307 => 'TEMPORARY REDIRECT',
		308 => 'PERMANENT REDIRECT',

		// Client error responses
		400 => 'BAD REQUEST',
		401 => 'UNAUTHORIZED',
		402 => 'PAYMENT REQUIRED',
		403 => 'FORBIDDEN',
		404 => 'NOT FOUND',
		405 => 'METHOD NOT ALLOWED',
		406 => 'NOT ACCEPTABLE',
		407 => 'PROXY AUTHENTICATION REQUIRED',
		408 => 'REQUEST TIMEOUT',
		409 => 'CONFLICT',
		410 => 'GONE',
		411 => 'LENGTH REQUIRED',
		412 => 'PRECONDITION FAILED',
		413 => 'PAYLOAD TOO LARGE',
		414 => 'URI TOO LONG',
		415 => 'UNSUPPORTED MEDIA TYPE',
		416 => 'RANGE NOT SATISFIABLE',
		417 => 'EXPECTATION FAILED',
		418 => 'I’M A TEAPOT',
		421 => 'MISDIRECTED REQUEST',
		422 => 'UNPROCESSABLE ENTITY',
		423 => 'LOCKED',
		424 => 'FAILED DEPENDENCY',
		426 => 'UPGRADE REQUIRED',
		428 => 'PRECONDITION REQUIRED',
		429 => 'TOO MANY REQUESTS',
		431 => 'REQUEST HEADER FIELDS TOO LARGE',
		444 => 'CONNECTION CLOSED WITHOUT RESPONSE',
		451 => 'UNAVAILABLE FOR LEGAL REASONS',
		499 => 'CLIENT CLOSED REQUEST',

		// Server error responses
		500 => 'INTERNAL SERVER ERROR',
		501 => 'NOT IMPLEMENTED',
		502 => 'BAD GATEWAY',
		503 => 'SERVICE UNAVAILABLE',
		504 => 'GATEWAY TIMEOUT',
		505 => 'HTTP VERSION NOT SUPPORTED',
		506 => 'VARIANT ALSO NEGOTIATES',
		507 => 'INSUFFICIENT STORAGE',
		508 => 'LOOP DETECTED',
		510 => 'NOT EXTENDED',
		511 => 'NETWORK AUTHENTICATION REQUIRED',
		599 => 'NETWORK CONNECT TIMEOUT ERROR',
	];

	/**
	 * Class constructor
	 *
	 * @link	https://github.com/bcit-ci/CodeIgniter/issues/5332
	 * @return	void
	 */
	public function __construct()
	{
	}

	public function debug($array)
	{
		echo '<pre>';
		print_r($array);
		echo '</pre>';
		die;
	}

	/**
	 * __get magic
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string	$key
	 */
	public function __get($key)
	{
		// Debugging note:
		//	If you're here because you're getting an error message
		//	saying 'Undefined Property: system/core/Model.php', it's
		//	most likely a typo in your model code.
		return get_instance()->$key;
	}

}
