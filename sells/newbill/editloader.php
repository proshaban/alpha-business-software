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

  $userid = $_POST['userid'];
  $number = 100000+$eid;
  $proTable = "PRO".$userid.$number;


   $pro = mysqli_query($conn,"SELECT * FROM $proTable ORDER BY `id` DESC LIMIT 3");

   $preData = "";
   
   while( $prodata = mysqli_fetch_assoc($pro))
   {
     $preData .= "Date : ".$prodata['date']." || Stock : ".$prodata['stock']." || Price : ".$prodata['price']."<br>";
   }


  $output='<fieldset>
  <table>
      <input type="text" name="table" value="'.$table.'" hidden required >
      <legend>Add Products</legend>
      <tr>
          <td>
              <p>Name OF Product : <span id="productname" class="resetdata" style="color:black;">'.$proName.'</span> </p>
              <input type="text" name="name" id="productnamein" value="'.$proName.'" hidden required>
          </td>
          
          <td>
              <p> Model : <span id="model" class="resetdata" style="color:black;">'.$proModel.'</span> </p>
              <input type="text" name="model" id="modelin" value="'.$proModel.'" 
              hidden required>
          </td>
          

      </tr>
      <tr>

          
          <td>Buying Price : <p id="hprice" ondblclick="$(\'#buyPrice\').show(); $(\'#hprice\').hide();" style = "color:black;cursor:pointer;"> XXXX </p> 
          <p id="buyPrice" style="color:black; display:none; cursor:pointer;" onclick="$(\'#buyPrice\').hide(); $(\'#hprice\').show();">'.$preData.' </p> <br>
          <p id="addon" style="color:black; cursor:pointer;"></p>
          </td>
          <td>MRP :<p id="MRP" class="resetdata" style="color:black;" >'.$proMRP.'</p></td>
      </tr>
      
      <tr>


          <td>In Stock</td>
          <td >Quantity</td>
          
      </tr>
      <tr>
          <td>
              <p id="stock" class="resetdata" style="color:black;">'.$proStock.'</p>
              <input type="number" name="instocks" id="instock" value="'.$proStock.'" hidden required>
          </td>
          <td>
              <input type="number" name ="quantity" id="quantity" required>
          </td>
      </tr>

      <tr>
      <td> Selling Price</td>
          <td>Total Amount</td>
      </tr>
      <tr>
          <td><input type="number" name="Sprice"  id="Sprice" value="'.$proMRP.'" ></td>
          <td><p id="totalA" class="resetdata"></td>
      </tr>
      
      <tr style="text-align:center;">
          <td>
              <input type="reset" class="actionBtn" onclick="$(\'.resetdata\').html(\'\');$(\'#hprice\').html(\'XXXX\'); $(\'#buyPrice\').html(\'\') ;$(\'#Sprice\').val(\'\') " class="btns"
                  onclick="$(\'#productname\').html(\'\');$(\'#model\').html(\'\')" value="Clear">
          </td>
          <td colspan="2">
              <input class="actionBtn" type="submit" class="btns" value="Add">
          </td>
      </tr>

  </table>
</fieldset>';
  


  echo $output;


?>