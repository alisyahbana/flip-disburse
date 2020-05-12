<?php
include 'class/disburse.php';

$data         = new Database();
$dataDisburse = $data->get("SELECT * FROM disburse_items");
foreach ($dataDisburse as $item) {
    echo "check disburse id_disburse " . $item["id_disburse"] . " ";
    $disburse = new Disburse($item["bank_code"], $item["account_number"], $item["amount"], $item["remark"]);
    $result   = json_decode($disburse->check_status($item["id_disburse"]));
    $disburse->update_status($result->status, $result->time_served, $result->receipt, $result->id);
}

echo "disburse request finish";
