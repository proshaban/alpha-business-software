<?php include 'roughbillB.php'?>

<!DOCTYPE html>

<head>
  <title>|| Rough Bill ||</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/style.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <style>
    body
    {
      width: 100%;
      
    }
    @media print
    {

        @page {
                size: 5.5in 10in;
                }
      head
      {
        display: none;
        font-size: 10px;
      }
      header img {
        top:80%;
      }
      body
      {
        width: 99%;
        margin:0 auto;
        padding: 0;
      }
      .container
     {
       width: 100%;
       box-shadow: none;
       border: 1px solid black;
       margin: 0 auto;
       padding: 0;
     }
    
      .data
      {
        display: block;
      }
      .details
      {
        background-color: white;
      }
      .actions
      {
        display: none;
      }
      .dataTable
      {
        width: 100%;
        margin:0 auto;
        border: none;
      }
      .dataTable table
      {
        width:98%;
        
        
        max-height: fit-content;
        border: none;
        font-size: 12px;
      }
      .dataTable table thead th
      {
        position: relative;
        background-color: white;
        color: black;
        text-align: left;
      }
      .dataTable table th,
      .dataTable table td {
       
        padding-bottom: 5px;
        padding: 0 0 15px 5px ;
        
        border: none;
        word-wrap: break-word;
      }
      .dataTable table tfoot th
      {
        text-align: left;
      }
    }
  </style>
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
        <p>Rough Estimate</p>
      </div>
    </header>
    <sdection class="data">
      <div class="details">
        <table>
          <tr>
            
            <td colspan="3"> Rough Estimate </td>
          </tr>
          <tr>
            <td>Bill No. </td>
            <td colspan="2">: <?php echo $table ?></td>
          </tr>
          <tr>
            <td>Date</td>
            <td colspan="2">: <?php echo $date ?></td>
          </tr>
          <tr>
            <td>Time</td>
            <td colspan="2">: <?php echo $time ?></td>
          </tr>
          
        </table>
        <div class="actions">
          <button onclick="location.href='sells.php';"><i class="fas fa-arrow-left"></i> Go Back</button>
          <button onclick="window.print()"><i class="fas fa-print"></i> Print Bill</button>
          <button onclick="$('.action').hide();$('.DeleteData').show();"><i class="fas fa-edit"></i> Delete This Bill</button>

        </div>

       
        
        <form class="action DeleteData">
          <fieldset>
            <table>
              <legend>Delete Data</legend>
              <tr align="center">
                <td colspan="2">
                  <h1>   Delete This Bill  ?</h1>
                </td>
              </tr>

              <tr>
                <td colspan="2">Enter Password to delete</td>
              </tr>
              <tr>
              <tr>
                <td colspan="2"><input type="text" name="" id="" required /></td>
              </tr>
              <tr style="text-align: center">
                <td>
                  <button onclick="$('.action').hide();" type="reset">
                    Cancel
                  </button>
                </td>
                <td><button type="submit">Save</button></td>
              </tr>
            </table>
          </fieldset>
        </form>
      </div>
      <div class="dataTable nonScrollTable">
      <?php echo  $head.$rows.$tail ?>
    </div>
    </section>
  </div>

  <script src="records.js"></script>
</body>
