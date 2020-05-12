<?php
include_once './helper/database.php';

class Disburse
{
    protected $bank_code;
    protected $account_number;
    protected $amount;
    protected $remark;

    function __construct($bank_code, $account_number, $amount, $remark)
    {
        $this->bank_code      = $bank_code;
        $this->account_number = $account_number;
        $this->amount         = $amount;
        $this->remark         = $remark;
    }

    function disburse()
    {
        $data     = array(
            'bank_code'      => $this->bank_code,
            'account_number' => $this->account_number,
            'amount'         => $this->amount,
            'remark'         => $this->remark
        );
        $username = "HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41";
        $password = "";
        $payload  = json_encode($data);

        // Prepare new cURL resource
        $ch = curl_init('https://nextar.flip.id/disburse');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set HTTP Header for POST request 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization: Basic ' . base64_encode("$username:$password"),
                'Content-Length: ' . strlen($payload))
        );

        // Submit the POST request
        $result = curl_exec($ch);
        return $result;
        curl_close($ch);
    }

    public function update_disburse($account_number, $id, $status, $timestamp, $beneficiary_name, $fee)
    {
        $database = new Database();
        $result   = $database->execute("UPDATE disburse_items SET id_disburse = '$id', status = '$status', stamp = '$timestamp', 
            beneficiary_name = '$beneficiary_name',fee='$fee' WHERE account_number = '$account_number'");
        if ($result) {
            echo "succesfully update database \n";
        } else {
            echo "failed to update database";
        }
    }
}