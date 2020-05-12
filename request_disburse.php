<?php
include 'class/disburse.php';

$data         = new Database();
$dataDisburse = $data->get("SELECT * FROM disburse_items");
foreach ($dataDisburse as $item) {
    echo "processing disburse account number ". $item["account_number"] . " ";
    $disburse = new Disburse($item["bank_code"], $item["account_number"], $item["amount"], $item["remark"]);
    $result   = json_decode($disburse->disburse());
    $disburse->update_disburse($result->account_number, $result->id, $result->status, $result->timestamp, $result->beneficiary_name, $result->fee);
}

echo "disburse request finish";
