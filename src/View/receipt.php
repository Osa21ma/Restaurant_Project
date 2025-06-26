<!DOCTYPE html>
<html lang="en">
<?php 
include_once('inc/header.php');
?>
<body>

<style>
    html, body{
        width:100% !important;
        min-height:unset !important;
        min-width:unset !important;
    }
</style>

    <div class="style px-2 py-1" line-height="1em">
        <div class="mb-0 text-center font-weight-bolder">Unofficial Receipt</div>
        <hr>
        <div class="d-flex w-100">
            <div class="col-auto">Transaction Code:</div>
            <div class="col-auto flex-shrink-1 flex-grow-1 pl-2"><?= $data['orderList']->code ?></div>
        </div>
        <div class="d-flex w-100">
            <div class="col-auto">Date & Time:</div>
            <div class="col-auto flex-shrink-1 flex-grow-1 pl-2"><?= $data['orderList']->date_created ?></div>
        </div>
        <div class="d-flex w-100">
            <div class="col-auto">Processed By:</div>
            <div class="col-auto flex-shrink-1 flex-grow-1 pl-2"><?= $data['processdBy']?></div>
        </div>
        <hr>
        <div class="w-100 border-bottom border-dark" style="display:flex">
            <div style="width:15%" class="font-weight-bolder text-center">QTY</div>
            <div style="width:55%" class="font-weight-bolder text-center">Items</div>
            <div style="width:30%" class="font-weight-bolder text-center">Total</div>
        </div>
        <div class="w-100" style="display:flex">
            <div style="width:15%" class="text-center"><?= $data['orderItem']->quantity ?></div>
            <div style="width:55%" class="">
                <div style="line-height:1em">
                    <div><?= $data['orderItem']->item ?></div>
                    <small class="text-muted"></small>
                </div>
            </div>
            <div style="width:30%" class="text-right"><?= number_format($data['orderItem']->price * $data['orderItem']->quantity,2) ?></div>
        </div>
        <div class="border border-dark mb-1"></div>
        <div class="border border-dark"></div>
        <div class="w-100 mb-2" style="display:flex">
            <h5 style="width:70%" class="mb-0 font-weight-bolder">Grand Total</h5>
            <h5 style="width:30%" class="mb-0 font-weight-bolder text-right"><?=number_format( $data['orderList']->total_amount,2) ?></h5>
        </div>
        <div class="w-100 mb-2" style="display:flex">
            <div style="width:70%" class="mb-0 font-weight-bolder">Tendered</div>
            <div style="width:30%" class="mb-0 font-weight-bolder text-right"><?=number_format( $data['orderList']->tendered_amount,2) ?></div>
        </div>
        <div class="w-100 mb-2" style="display:flex">
            <div style="width:70%" class="mb-0 font-weight-bolder">Change</div>
            <div style="width:30%" class="mb-0 font-weight-bolder text-right"><?= number_format($data['orderList']->total_amount - $data['orderList']->tendered_amount,2)?></div>
        </div>
        <div class="border border-dark mb-1"></div>
        <div class="py-3">
            <center>
                <div class="font-weight-bolder">Queue #</div>
            </center>
            <h3 class="text-center foont-weight-bolder mb-0"><?= $data['orderList']->queue ?></h3>
        </div>
        <div class="border border-dark mb-1"></div>
    </div>   
</body>
<script>
    document.querySelector('title').innerHTML = "Unofficial Receipt - Print View"
</script>
</html>