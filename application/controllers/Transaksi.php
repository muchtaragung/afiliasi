<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function duitku()
    {
        $merchantCode = 'D10742'; // from duitku
        $merchantKey = '9826e5b58d5d3fc42ce0a277fced94d7'; // from duitku

        $paymentAmount = $this->input->post('paymentAmount', true);
        // isset($_POST['paymentAmount']) ? $_POST['paymentAmount'] : null; // Amount
        $email = $this->input->post('email', true);
        // isset($_POST['email']) ? $_POST['email'] : null; // your customer email
        $phoneNumber =  $this->input->post('phoneNumber', true);
        // isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : null; // your customer phone number (optional)
        $productDetails = $this->input->post('productDetail', true);
        // isset($_POST['productDetail']) ? $_POST['productDetail'] : null;
        $merchantOrderId = time(); // from merchant, unique   
        $additionalParam = ''; // optional
        $merchantUserInfo = ''; // optional
        $customerVaName =  $this->input->post('name', true); // display name on bank confirmation display
        $callbackUrl = 'http://localhost/duitmu'; // url for callback
        $returnUrl = 'http://localhost/duitmu'; // url for redirect
        $expiryPeriod = 10; // set the expired time in minutes
        $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $merchantKey);
        // Customer Detail
        $firstName = $this->input->post('first_name', true);
        $lastName = $this->input->post('name', true);


        $customerDetail = array(
            'lastName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'phoneNumber' => $phoneNumber
        );


        $item1 = array(
            'name' => $productDetails,
            'price' => (int)$paymentAmount,
            'quantity' => 1
        );


        $itemDetails = array(
            $item1
        );

        $params = array(
            'merchantCode' => $merchantCode,
            'paymentAmount' => (int)$paymentAmount,
            'merchantOrderId' => (string)$merchantOrderId,
            'productDetails' => $productDetails,
            'additionalParam' => $additionalParam,
            'merchantUserInfo' => $merchantUserInfo,
            'customerVaName' => $customerVaName,
            'email' => $email,
            'phoneNumber' => $phoneNumber,
            'itemDetails' => $itemDetails,
            'customerDetail' => $customerDetail,
            'callbackUrl' => $callbackUrl,
            'returnUrl' => $returnUrl,
            'signature' => $signature,
            'expiryPeriod' => $expiryPeriod
        );

        $params_string = json_encode($params);
        $url = 'https://api-sandbox.duitku.com/api/merchant/createInvoice';

        $ch = curl_init();
        $timestamp = round(microtime(true) * 1000);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($params_string),
                'x-duitku-signature:' . hash('sha256', $merchantCode . $timestamp . $merchantKey),
                'x-duitku-timestamp:' . $timestamp,
                'x-duitku-merchantcode:' . $merchantCode
            )
        );


        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        //execute post
        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpCode == 200) {
            $result = json_decode($request, true);
            echo $request;
        } else {
            echo $request;
        }
    }
}
