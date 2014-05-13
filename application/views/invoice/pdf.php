<html>
    <head>
        <style>
            @page { margin: 10pt 10pt !important; }
            .totals{
                border-left:1px solid #C0C0C0 ;}
            .title td{
                border-bottom:1px solid #C0C0C0 ;
                padding: 10px 0px 10px 0px;
                width: 15%;
            }
            td{
                padding: 10px 0px 10px 0px;
            }
            table{
                font-family: sans-serif;
                margin-left: 10px;
                border-collapse:collapse;
                width: 95%;
                font-size: 12pt;
                color: #63473b;}

            input{ vertical-align:middle;
                   margin:0;
                   padding:0;}
            select{ vertical-align:middle;
                    margin:0;
                    padding:0;}
            label{font-weight: bolder;}
            .title1{font-size: 30px;}
            .header td{width: 55%; }
            div{bottom: 50px;padding: 10px 10px 10px 10px;}
            .total{position: absolute;left: 580px;}
            .detail{font-size: 9pt;}

            .details{font-size: 8pt;width: 400px;}
        </style>
    </head>
    <body>

        <table>
            <tr >
                <td id="header"><h1>GCOM COMPUTER LTD.</h1></td>
                <td id="detail"><b>Invoice#<?php echo "$paddedNum"; ?></b><br/><b>Date:<?php echo "$date"; ?></b><br/><br/>GST#:83846 0954 RT0001</td>
            </tr>

            <tr  class="address">

                <td>#100,10524-178ST, Edmonton, AB<br/>Canada T5S 2J1 <br/>Tel. (780)757-6828<br/>WebSite: www.gcomcomputer.com</td>

                <td></td>
            </tr>
                    <!--<tr>
                     <td>10932-97st, Edmonton, AB<br/>Canada T5H 2M9 <br/>Tel(780-756-6828<br/>www.gcomcomputer.com</td>
                    
                      <td></td>
                    <td></td>
                    </tr>
            -->
        </table>
        <table>
            <tr class="title">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr>
                <td colspan="4"><b>Customer Name:</b><?php echo "$name"; ?></td>
                <td> <b>Phone:</b><?php echo "$phone"; ?></td>



            </tr>
            <tr class="address title">
                <td colspan="5"><b>Address:</b> <?php echo "$address"; ?></td>


            </tr>
            <tr class="title">
                <td><b>Qty</b></td>
                <td><b>Item#</b></td>
                <td><b>Description</b></td>
                <td><b>Unit Price</b></td>
                <td><b>Amount</b></td>
            </tr>
            <?php
            foreach ($invoiceArray as $row3) {
                $itemnumb = $row3['itemnumb'];
                $description = $row3['description'];
                $price = $row3['price'];
                $Qty = $row3['Qty'];
                $soldprice = $Qty * $price;
                $subtotal += $soldprice;
                echo "<tr class=\"detail\">";
                echo "<td>$Qty</td>";
                echo "<td>$itemnumb</td>";
                echo "<td>$description</td>";
                echo "<td>$ $price</td>";
                echo "<td>$ $soldprice</td>";
                echo "</tr>";
            }
            $GST = $subtotal * 0.05;
            $total = $GST + $subtotal;
            ?>

        </table>

        <div>
            <table><tr class="title">
                    <td></td>
                    <td></td><td></td><td></td><td></td>
                </tr></table>
            <table class="total">  
                <tr>
                    <td></td>
                </tr>  <tr>
                    <td></td>
                </tr>  
                <tr>

                    <td class="totals"><b>Sub-Total:</b>$<?php echo "$subtotal"; ?></td> 
                </tr>
                <tr>

                    <td  class="totals"><b>GST(5%):</b>$<?php echo "$GST"; ?></td> 
                </tr>

                <tr>

                    <td  class="totals"><b>Total:</b>$<?php echo "$total"; ?></td> 
                </tr>
                <tr>

                    <td  class="totals"><b>Paid By:</b><?php echo "$payment"; ?></td> 
                </tr>

            </table>
            <p class="details">GCOM COMPUTER LTD. Warranty: <br/>*NO RETURN OR EXCHANGE FOR CONSUMABLE PRODUCTS, SOFTEWARE OR FINAL SELL ITEMS. <br/>*No return or exchange after 7 days from date of purchase. <br/>*All returns are subject to approval plus 25% restocking charge. <br/>*All GCOM COMPUTER LTD. Systems are depot warranty for 30 days.<br/>This includes all Notebooks/Laptops, Printers, Scanners, Monitors, UPS, Keyboards, Mouse, Hardware components, etc. <br/>*GCOM COMPUTERS LTD.<br/> Warranty does not cover invalid software configuration, software corruption, system misuse or modifications by the user. <br/>*Technical Support for known and documented procedures will be billed at the standard shop rate. <br/>PLEASE RETAIN ORIGINAL INVOICE FOR WARRANTY</p>


            <p><b>Signature</b></p></div>
    </body>
</html>