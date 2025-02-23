<?php
include 'conc.php';


  $eid = $_POST['eid'];
  $sql = mysqli_query($conn, "SELECT * FROM `productlist` WHERE `id` = '$eid' ");
  $pro = mysqli_fetch_assoc($sql);
  $proId = $pro['id'];
  $proName = $pro['name'];
  $proModel = $pro['model'];
  $proStock = $pro['stock'];
  $proBprice = $pro['Bprice'];
  $proMRP = $pro['MRP'];
  $table = $_POST['table'];
  $destid = $_POST['destid'];
  
  
  $output='<fieldset>
  <table>
  <input type="text" name="table" value="'.$table.'" hidden>
  <input type="text" name="destid" value="'.$destid.'" hidden>
  <input type="text" name="proId" value="'.$proId.'" hidden>
      <legend>Add Products</legend>
      <tr>
          <td colspan="3">
              <p>Name OF Product* : <span id="productname" class="resetdata" style="color:black;"> '.$proName.' </span> </p>
              <input type="text" name="name" id="productnamein" value="'.$proName.'" required hidden>
          </td>

          <td colspan="2">
              <p> Model* : <span id="model" class="resetdata" style="color:black;"> '.$proModel.' </span> </p>
              <input type="text" name="model" id="modelin" value="'.$proModel.'" placeholder="Enter name Or model No."
                   required hidden>
          </td>

      </tr>
      <tr>

          <td colspan="2">Quantity* <br></td>

          <td colspan="2" >Rate* (Exclusive Of Tax) </td>


      </tr>
      <tr>
          <td colspan="2" >
              <input type="text" name="quantity" id="quantityP" placeholder="Quantity of product" required>
          </td>
          <td colspan="2">
              <input type="text" name="rateE" id="rateP" placeholder="Enter Rate Without Tax" required>
          </td>

      </tr>
      <tr>



          <td>CGST*</td>
          <td>CGST Amount*</td>
          
          <td>SGST*</td>
          <td>SGST* Amount</td>
      </tr>
      <tr>
          <td><input type="text" name="cgstp" id="cgstpP" placeholder="in percentage" required></td>
          <td><input type="text" name="cgst" id="cgstP" placeholder="Amount" required></td>

          <td><input type="text" name="sgstp" id="sgstpP" placeholder="in percentage" required></td>
          <td><input type="text" name="sgst" id="sgstP" placeholder="Amount" required></td>
      </tr>
      <tr>
          <td>Discount (if any) </td>
          <td>Net Buying Rate* </td>
          <td>MRP*</td>
          <td> Total Amount </td>
         
      </tr>
      <tr>
          <td><input type="text" id="discountP" placeholder="in percentage"></td>
          <td><input type="text" name="rate" id="netrateP" placeholder="Amount" required></td>
          <td><input type="text" name="MRP"  placeholder="Amount" required></td>
          <td colspan="2"><input type="text" name="total" id="totalP"  placeholder="Amount" required></td>
      </tr>
      <tr style="text-align:center;">
          <td colspan="2">
              <input type="reset" class="btns"
                  onclick="$(\'#productname \').html(\'\');$(\'#model\').html(\'\')" value="Clear">
          </td>
          <td colspan="2">
              <input type="submit" class="btns" value ="submit">
          </td>
      </tr>


      </table>
      </fieldset>';
  


  echo $output;


?>