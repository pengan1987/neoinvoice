
<style type="text/css">
    .title td{
        border-bottom:1px solid #C0C0C0 ;
        padding: 10px 0px 10px 0px;
        font-weight: bolder;
        width: 20%;
    }
    td{
        padding: 10px 0px 10px 0px;
    }
    table{margin-left: 10%;
          border-collapse:collapse;
          width: 990px;
          font-size: 9pt;
          color: #63473b;
          border:1px solid #C0C0C0 ;}

    input{ vertical-align:middle;
           margin:0;
           padding:0;}
    select{ vertical-align:middle;
            margin:0;
            padding:0;}
    label{font-weight: bolder;}
</style>


<?php
$this->load->helper('html');
$this->load->helper('url');

foreach ($invoiceArray as $invoice):

    $baseInvoice = $invoice[0];
    $id = $baseInvoice['cid'];
    $name = $baseInvoice['name'];
    $phone = $baseInvoice['phone'];
    $payment = $baseInvoice['payment'];
    $date = $baseInvoice['date'];
    $address = $baseInvoice['address'];
    $subtotal = 0;
    $paddedNum = sprintf("%04d", @$id);
    ?>
    <br/>
    <table>
        <tr class='title'>
            <td colspan = '3'>Invoice# <?= $paddedNum ?></td>
            <td><?= $date ?></td>
        </tr>
        <tr class='title'>
            <td>Name:<?= $name ?></td>
            <td colspan = '2'>Phone:<?= $phone ?></td>
            <td>Payment:<?= $payment ?></td>
        </tr>
        <tr class='title'>
            <td>Address</td>
            <td colspan='3'><?= $address ?></td>
        </tr>
        <tr class='title'>
            <td>Qty</td>
            <td>Item#</td>
            <td>Description</td>
            <td>Price</td>
        <tr>
            <?php
            foreach ($invoice as $invoiceDetail) {
                $itemnumb = $invoiceDetail['itemnumb'];
                $description = $invoiceDetail['description'];
                $price = $invoiceDetail['price'];
                $Qty = $invoiceDetail['Qty'];
                $soldprice = $Qty * $price;
                $subtotal += $soldprice;

                echo "<tr><td>$Qty</td><td>$itemnumb</td><td>$description</td><td>$ $soldprice</td></tr>";
            }
            $GST = $subtotal * 0.05;
            $total = $GST + $subtotal;
            ?>
        <tr class="title">
            <td>Sub-Total $ <?= $subtotal ?></td>
            <td colspan='2'>GST $ <?= $GST ?></td>
            <td>Total $ <?= $total ?></td>
        </tr>
        <tr class="title">
            <td colspan='4'><?= anchor('invoice/pdf/' . $id, "PDF") ?></td>
        </tr>
    </table>

<?php endforeach; ?>
