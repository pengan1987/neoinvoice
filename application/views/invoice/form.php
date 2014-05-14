<?php
$this->load->helper('form');
$this->load->helper('url');
$this->load->helper('html');
?>

<html>
    <head>
        <style type="text/css">
            .title td{
                border-bottom:1px solid #C0C0C0 ;
                padding: 10px 0px 10px 0px;
            }
            td{
                padding: 10px 0px 10px 0px;
            }
            table{margin-left: 10%;
                  border-collapse:collapse;
                  width: 990px;
                  font-size: 9pt;
                  color: #63473b;}

            input{ vertical-align:middle;
                   margin:0;
                   padding:0;}
            select{ vertical-align:middle;
                    margin:0;
                    padding:0;}
            label{font-weight: bolder;}
            .address{width: 140%;}
        </style>

        <script type="text/javascript">
            function add() {
                var dataTable = document.getElementById("dataTable");
                var newTable = document.getElementById("newTitleRows").cloneNode(true).children;
                dataTable.appendChild(newTable[0]);
            }
        </script>

    </head>
    <body>
        <?php
        echo form_open('invoice/create', array('class' => 'myForm'));
        ?>
        <table id="dataTable">
            <tr class="title">
                <td><?= anchor('invoice/history/','History')?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td><?php
                    if (!isset($lastCid)) {
                        echo "New Invoice";
                    } else {
                        echo "Invoice was added.";
                        
                        echo anchor('invoice/pdf/'.$lastCid, "<br />Click to Download: $lastCid");
                    }
                    ?>
                </td>
                <td>Payment Method:
                    <select name="payment">
                        <option value="Credit">Credit</option>
                        <option value="Debit">Debit</option>
                        <option value="Cash">Cash</option>
                    </select>
                </td>
            </tr> 
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" class="address"/></td>

                <td></td>
            </tr>
            <tr class="title">
                <td><label>Customer Name</label></td>
                <td><label>Customer Phone</label></td>
                <td><label>Invoice Number</label></td>
                <td><label>Date</label></td>
            </tr>

            <tr>
                <td><input type="text" name="name" /></td>
                <td><input type="text" name="phone" /></td>
                <td><label><?php echo $paddedNum; ?></label></td>
                <td><label><?php echo date("Y/m/d"); ?></label></td>
            </tr>


            <tr class="title">
                <td><label>Qty</label></td>
                <td><label>Item#</label></td>
                <td><label>Description</label></td>
                <td><label>Price</label></td>
                <td><input type="submit" name="submit" value="submit" />&nbsp
                    <input type="button" name="more" value="more" onclick="add()" /></td>
            </tr>
            <tr>
                <td><input type="text" name="qty[]" /></td>
                <td><input type="text" name="itemnumb[]" /></td>
                <td><input type="text" name="description[]" /></td>
                <td><input type="text" name="price[]" /></td>
            </tr>
        </table>
        <table>

        </table>
        <?php
        echo form_close();
        ?>

        <table style="display:none" id="newTitleRows">
            <tr>
                <td><input type="text" name="qty[]" /></td>
                <td><input type="text" name="itemnumb[]" /></td>
                <td><input type="text" name="description[]" /></td>
                <td><input type="text" name="price[]" /></td>
            </tr>
        </table>
    </body>

</html>