<?php
if(!isset($_COOKIE['usid']))
{
    ?>

    <script>
        alert("!Login Session Expired!");
        location.href="/index.php";
    </script>
<?php

}
else
{
include 'conc.php';

$id = $_GET['id'];

$proid = $id[8].$id[9].$id[10].$id[11].$id[12];

$get = mysqli_query($conn , "SELECT * FROM `productlist` WHERE `id` = '$proid' ");

$data = mysqli_fetch_assoc($get);

$proname= $data['name'];

$table = $_GET['id'];


$sql = mysqli_query($conn,"SELECT * FROM $table " );


if($sql)
{
    if(mysqli_num_rows($sql)>0)
    {

        $firstrow = '<table>
        <thead>

            <th>
                <strong> Sl.No</strong>
            </th>
            <th>
                <strong> Date </strong>
            </th>
            <th>
                <strong>Price</strong>
            </th>
            <th>
                <strong>Stock</strong>
            </th>
            <th>
                <strong>Destributer Id </strong>
                
            </th>

            <th>Delete</th>
            
        </thead>
        <tbody>';

        $slno = 1;
        $rows ="";
        while($row = mysqli_fetch_assoc($sql))
        {
            
            $rows .= '<tr>
            <td>' .$slno .'</td>
            <td>'.$row['date'].'</td>
            <td>'.$row['price'].'</td>
            <td>'.$row['stock'].'</td>
            
            <td>'.$row['dest'].'</td>
            <td align="center" onclick="" style="color:red; cursor: pointer;"><i class="fas fa-trash"></i></td>
           
        </tr>';
        $slno++;
        }


        $lastrow = '</tbody>
        </table>';

        $output = $firstrow.$rows.$lastrow;
    }
    else
    {
        $output = "!!No previous data found!!";
    }
   
}
else
{
    $output = "Connection Faild";
}




}

?>
<!DOCTYPE html>
<head>
  <title>Products || Alpha Business</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/style.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  
</head>

<body>
  <div class="container">
    <header>
      <img src="/Logo.png" alt="Logo HERE" width="80" height="80" />
      <div class="title">
                <h1>Smart Business Software</h1>
                <p>By Shaban Khan</p>
      </div>
      <div class="pagetitle">
        <p><i class="fas fa-shopping-cart"></i><?php echo $proname ?></p>
      </div>
    </header>
    <section class="data">
      <div class="details">
        
        <div class="actions">
          <button onclick="location.href='/products/products.php';"><i class="fas fa-arrow-left"></i> Go Back</button>

        </div>

        <form action="editpro.php" method="post" class="action EditData">
          <fieldset>
            <table>
              <legend>Edit Product</legend>
              <tr align="center">
                <td colspan="2">
                  <h1>Edit Product informations</h1>
                </td>
              </tr>
              <tr align="right">
                <td></td>
                <td colspan="1"><input type="button" class="actionBtn" style="font-size:14px; width:50%; cursor:pointer; color:red;" onclick="$('.action').hide();$('.DeleteData').show();" value="Delete "></input></td>
              </tr>
              <tr>
              <input type="text" name="proId" class="proId" value="" hidden>
              </tr>
  
              <tr>
                <td>Name
                </td>
                
                <td><input type="text" name="proName" class="proName" required /></td>
              </tr>
              <tr>
                <td>Model No.</td>
                <td><input type="text" name="proModel" class="proModel" required  /></td>
                

              </tr>
              <tr>
                <td>Stock</td>
                <td><input type="text" name="proStock" id="" class="proStock" required /></td>
              </tr>
              <tr>
                <td>Buy Price</td>
                <td><input type="text" name="proBprice" id="" class="proBprice" required  /></td>
              </tr>
              <tr>
                <td>Sell Price</td>
                <td><input type="text" name="proMRP" id="" class="proMRP"  required /></td>
              </tr>
              <tr style="text-align: center">
                <td>
                  <button class="actionBtn" onclick="$('.action').hide();" type="reset">
                    Cancel
                  </button>
                </td>
                <td><button class="actionBtn" type="submit">Save</button></td>
              </tr>
            </table>
          </fieldset>
        </form>

      </div>

        
        
      <div class="dataTable ScrollTable">
        <?php echo $output?>
      </div>
    </section>


  </div>

  <script>


$('.editform').on("submit",function(e)
        {
           
            $('.EditData').show();
        $.ajax({

                    type: "post",
                    url: "editloader.php",
                    data: $('.editform').serialize(),
                    dataType : "text",
                    success: function (result) {
                        
                        
                        $('.EditData').html(result);
                       
                        }

        });
            
        e.preventDefault();


        
    });



  </script>
</body>
