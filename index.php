<?php include('header.php');?>
<?php require 'config.php'; ?>

 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Import Excel To MySQL</title>
	</head>
	<body>
		<form class="" action="" method="post" enctype="multipart/form-data">
			<input type="file" name="excel" required value="">
			<button type="submit" name="import" width>Import</button>
		</form>
		<hr>
		<table border="1">
			<tr>
				
				<td><b><h5>#</h5></b></td>
				<td><h5>REGIONS</h5></td>
				<td><h5>PROVINCE</h5></td>
				<td><h5>RTOM_CODE</h5></td>
				<td><h5>LEA</h5></td>
				<td><h5>SO_ID</h5></td>
				<td><h5>PRODUCT_LABEL</h5></td> 
			    <td><h5>SO_DATECREATED</h5></td>
				<td><h5>SO_ORDT_TYPE</h5></td>
				<td><h5>SERVICE_TYPE</h5></td>
				<td><h5>CR</h5></td>
				<td><h5>ACCT_NUMBER</h5></td>
				<td><h5>SO_STATUS</h5></td>
				<td><h5>SO_STATUSDATE</h5></td>
				<td><h5>SOD_APPROVED_DATE</h5></td>
				<td><h5>MILESTONE_1_ACTUAL_END_DATE</h5></td>
				<td><h5>SALES_CHANNEL</h5></td>
				<td><h5>SALES_PERSON</h5></td>
				<td><h5>SO_INITIATOR</h5></td>
				<td><h5>ACTUAL_DSP_DATE</h5></td>
				<td><h5>IPTV_PACKAGE</h5></td>
				<td><h5>BB_PACKAGE</h5></td>
				<td><h5>IPTV_PREVIOUS_PACKAGE</h5></td>
				<td><h5>BB_PREVIOUS_PACKAGE</h5></td>
				<td><h5>CUSTOMER_CONTACT</h5></td>
				<td><h5>IMEI_NO</h5></td>
				<td><h5>PAYMENT_METHOD</h5></td>
				
				
			
				
				
			</tr>
			<?php
			$i = 1;
			$rows = mysqli_query($conn, "SELECT * FROM tb_data");
			foreach($rows as $row) :
			?>
			<tr>

				<td> <?php echo $i++; ?> </td>
				<td> <?php echo $row["regions"]; ?> </td>
				<td> <?php echo $row["province"]; ?> </td>
				<td> <?php echo $row["rtom_code"]; ?> </td>
				<td> <?php echo $row["lea"]; ?> </td>
				<td> <?php echo $row["so_id"]; ?> </td>
				<td> <?php echo $row["product_label"]; ?> </td>
				<td> <?php echo $row["so_datecreated"]; ?> </td>
				<td> <?php echo $row["so_ordt_type"]; ?> </td>
				<td> <?php echo $row["service_type"]; ?> </td>
				<td> <?php echo $row["cr"]; ?> </td>
				<td> <?php echo $row["acct_number"]; ?> </td>
				<td> <?php echo $row["so_status"]; ?> </td>
				<td> <?php echo $row["so_statusdate"]; ?> </td>
				<td> <?php echo $row["sod_approved_date"]; ?> </td>
				<td> <?php echo $row["milestone_1_actual_end_date"]; ?> </td>
				<td> <?php echo $row["sales_channel"]; ?> </td>
				<td> <?php echo $row["sales_person"]; ?> </td>
				<td> <?php echo $row["so_initiator"]; ?> </td>
				<td> <?php echo $row["actual_dsp_date"]; ?> </td>
				<td> <?php echo $row["iptv_package"]; ?> </td>
				<td> <?php echo $row["bb_package"]; ?> </td>
				<td> <?php echo $row["iptv_previous_package"]; ?> </td>
				<td> <?php echo $row["bb_previous_package"]; ?> </td>
				<td> <?php echo $row["customer_contact"]; ?> </td>
				<td> <?php echo $row["imei_no"]; ?> </td>
				<td> <?php echo $row["payment_method"]; ?> </td>
				
				<td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>

			</tr>
			<?php endforeach; ?>
		</table>

		<?php

if(isset($_GET['delete_msg'])){
    echo "<h6>".$_GET['delete_msg']."</h6>";
}

?>
		<?php
		if(isset($_POST["import"])){
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
            $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

			error_reporting(0);
			ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				$regions = $row[0];
				$province = $row[1];
				$rtom_code = $row[2];
				$lea = $row[3];
				$so_id = $row[4];
				$product_label = $row[5];
				$so_datecreated = $row[6];
				$so_ordt_type = $row[7];
				$service_type = $row[8];
				$cr = $row[9];
				$acct_number = $row[10];
				$so_status = $row[11];
				$so_statusdate = $row[12];
				$sod_approved_date = $row[13];
				$milestone_1_actual_end_date = $row[14];
				$sales_channel = $row[15];
				$sales_person = $row[16];
				$so_initiator = $row[17];
				$actual_dsp_date = $row[18];
				$iptv_package = $row[19];
				$bb_package = $row[20];
				$iptv_previous_package = $row[21];
				$bb_previous_package = $row[22];
				$customer_contact = $row[23];
				$imei_no = $row[24];
				$payment_method = $row[25];
				
				
				mysqli_query($conn, "INSERT INTO tb_data VALUES('', '$regions', '$province', '$rtom_code', '$lea', '$so_id', '$product_label', '$so_datecreated' , '$so_ordt_type', '$service_type', '$cr', 
				'$acct_number', '$so_status' , '$so_statusdate' , '$sod_approved_date' , '$milestone_1_actual_end_date' , '$sales_channel' , '$sales_person' , '$so_initiator' , '$actual_dsp_date' , '$iptv_package' , '$bb_package' , '$iptv_previous_package' , '$bb_previous_package' , '$customer_contact' , '$imei_no' , '$payment_method')");
			}

			echo
			"
			<script>
			alert('Succesfully Imported');
			document.location.href = '';
			</script>
			";
		}
		?>
	</body>
</html>

<?php include('footer.php');?>