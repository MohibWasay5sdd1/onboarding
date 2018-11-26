<!-- <?php
$inpectionid=$_SESSION['inspection'];

?> -->

<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>

    </style>
</head>
<body>
<div id="wrapper">
     
    <p style="text-align:center; font-weight:bold; padding-top:5mm;">INSPECTION REPORT for <?php echo $_SESSION['inspection']; ?> </p>
    <br />
    <table class="heading" style="width:100%;">
        <tr>
            <td style="width:80mm;">
                <h1 class="heading">ABC Company</h1>
                <h2 class="heading"></h2><br />
                    <span style="text-align:left; padding-top:5mm;" ><label class="boldlabel">Inspection Description : <span>Something</span></label></span><br />
                    <span style="text-align:left;  padding-top:5mm;" ><label  class="boldlabel">Equipment Category : <span>Something Category</span></label></span><br />
                   <span style="text-align:left; padding-top:5mm;" ><label class="boldlabel">Inspected By : <span>Someone</span></label></span><br />
                   <span style="text-align:left;  padding-top:5mm;" ><label class="boldlabel">Inspection Date : <span>Someday</span></label></span><br />   
                    <span style="text-align:left; padding-top:5mm;" ><label  class="boldlabel">Final Remark : <span>Some Remark</span></label></span><br />
                     <span style="text-align:left;  padding-top:5mm;" ><label  class="boldlabel">Fault Description : <span>Some Fault Description</span></label></span><br />

            </td>
            <td valign="top" align="right" style="padding:3mm;">
                <table>
                   <!--  <tr><td>Inspection No : </td><td>11-12-17</td></tr> -->
                    <tr><td>Dated : </td><td>01-Aug-2011</td></tr>
                   <!--  <tr><td>Currency : </td><td>USD</td></tr> -->
                </table>
            </td>
            
        </tr>
          <tr>
            <td>
                <b>To: </b> :<br />
                 <span style="text-align:left;  padding-top:5mm;" ><label  class="boldlabel">Report Sent To : <span>Some Manager</span></label></span><br />
           <!--  Client Address
                <br />
                City - Pincode , Country<br /> -->
            </td>
             <td valign="top" align="right" style="padding:3mm;">
               
            </td>
        </tr>
          <tr>
            <td style="width:80mm;">
               <span style="text-align:left; font-weight:bold; padding-top:5mm;" ><label>Equipment Image<img  src="images/camera.jpg"></label></span>
            </td>
            <td valign="top" align="right" style="padding:3mm;">
               
            <span style="text-align:left; font-weight:bold; padding-top:5mm;" ><label>Fault Image<img  src="images/camera.jpg"></label></span>
                  
            </td>
        </tr>
      
    </table>
         
         
    <div id="content">
         
        <div id="invoice_body">
            <table style="width:100%;">
            <tr style="background:#eee;">
                <td style="width:15%;"><b>Sl. No.</b></td>
                <td style="width:60%;"><b>Question</b></td>
                <td style="width:25%;"><b>Remark</b></td>
                <!-- <td style="width:15%;"><b>Rate</b></td>
                <td style="width:15%;"><b>Total</b></td> -->
            </tr>
            </table>
             
            <table>
                  <tr>
                <td style="width:15%;">1</td>
                <td style="width:60%;">Question1 About Something</td>
                <td style="width:25%;">Remark For Question1</td>
                <!-- <td style="width:15%;"><b>Rate</b></td>
                <td style="width:15%;"><b>Total</b></td> -->
            </tr>
              <tr>
                <td style="width:15%;">2</td>
                <td style="width:60%;">Question1 About Something</td>
                <td style="width:25%;">Remark For Question1</td>
                <!-- <td style="width:15%;"><b>Rate</b></td>
                <td style="width:15%;"><b>Total</b></td> -->
            </tr>
              <tr>
                <td style="width:15%;">3</td>
                <td style="width:60%;">Question1 About Something</td>
                <td style="width:25%;">Remark For Question1</td>
                <!-- <td style="width:15%;"><b>Rate</b></td>
                <td style="width:15%;"><b>Total</b></td> -->
            </tr>
          
         
         
        </table>
        </div>
      <!--   <div id="invoice_total">
            Total Amount :
            <table>
                <tr>
                    <td style="text-align:left; padding-left:10px;">One  Hundred And Fifty Seven  only</td>
                    <td style="width:15%;">USD</td>
                    <td style="width:15%;" class="mono">157.00</td>
                </tr>
            </table>
        </div> -->
        
         
       <!--  <table style="width:100%; height:35mm;">
            <tr>
                <td style="width:65%;" valign="top">
                    Payment Information :<br />
                    Please make cheque payments payable to : <br />
                    <b>ABC Corp</b>
                    <br /><br />
                    The Invoice is payable within 7 days of issue.<br /><br />
                </td>
                <td>
                <div id="box">
                    E &amp; O.E.<br />
                    For ABC Corp<br /><br /><br /><br />
                    Authorised Signatory
                </div>
                </td>
            </tr>
        </table> -->
    </div>
     
    <br />
     
    </div>
     
  <!--   <htmlpagefooter name="footer">
        <hr />
        <div id="footer"> 
            <table>
                <tr><td>Software Solutions</td><td>Mobile Solutions</td><td>Web Solutions</td></tr>
            </table>
        </div>
    </htmlpagefooter>
    <sethtmlpagefooter name="footer" value="on" /> -->
     
</body>
</html>