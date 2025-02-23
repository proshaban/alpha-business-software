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

  $output='<fieldset>
  <table>
    <legend>Edit Product</legend>
    <tr align="center">
      <td colspan="2">
        <h1>Edit Product informations</h1>
      </td>
    </tr>
    <tr align="right">
      <td></td>
      <td colspan="1"><input type="button" class="actionBtn" style="font-size:14px; width:50%; cursor:pointer; color:red;" onclick="$(\'.action\').hide();$(\'.DeleteData\').show();$(\'.proId\').val('.$proId.')" value="Delete "></input></td>
    </tr>
    <tr>
    <input type="text" name="proId" class="proId" value="'.$proId.'" hidden>
    </tr>

    <tr>
      <td>Name
      </td>
      
      <td><input type="text" name="proName" class="proName" value="'.$proName.'" required /></td>
    </tr>
    <tr>
      <td>Model No.</td>
      <td><input type="text" name="proModel" class="proModel" value="'.$proModel.'" required  /></td>
      

    </tr>
    <tr>
      <td>Stock</td>
      <td><input type="text" name="proStock" id="" class="proStock" value="'.$proStock.'" required /></td>
    </tr>
    <tr>
      <td>Buy Price</td>
      <td><input type="text" name="proBprice" id="" class="proBprice" value="'.$proBprice.'" required  /></td>
    </tr>
    <tr>
      <td>Sell Price</td>
      <td><input type="text" name="proMRP" id="" class="proMRP" value="'.$proMRP.'"  required /></td>
    </tr>
    <tr style="text-align: center">
      <td>
        <button class="actionBtn" onclick="$(\'.action\').hide(); " type="reset">
          Cancel
        </button>
      </td>
      <td><button class="actionBtn" type="submit">Save</button></td>
    </tr>
  </table>
</fieldset> ';
  


  echo $output;


?>