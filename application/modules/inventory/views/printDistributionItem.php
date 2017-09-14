<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/desktop/css/report.css'; ?>"/>	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/desktop/css/report.css'; ?>" media="print"/>	
</head>
<body>
	<?php
		$set_width = 800;
	?>
	<div class="report_area" style="width:<?php echo $set_width.'px'; ?>;">
		<div class="fleft" style="width:260px; margin-right:10px;">
			<h1>PURCHASE REQUEST</h1>
		
			<table>
				<tr class="f14 xbold">
					<td class="f14 xbold" width="40">PR.NO</td>
					<td class="f14 xbold" width="5">:</td>
					<td class="f14 xbold"><?php echo $ro_data['ro_number']; ?></td>
				</tr>
				<tr>
					<td>DATE</td>
					<td>:</td>
					<td><?php echo date("d/m/Y", strtotime($ro_data['ro_date'])); ?></td>
				</tr>
				<tr>
					<td>FROM</td>
					<td>:</td>
					<td><?php echo $ro_data['ro_from']; ?></td>
				</tr>
			</table>
		</div>
		<div class="fright" style="width:330px;">
			<table>
				<tr>
					<td width="50">SUPPLIER</td>
					<td width="5">:</td>
					<td><?php echo $ro_data['supplier_name']; ?></td>
				</tr>
				<tr>
					<td>ADDRESS</td>
					<td>:</td>
					<td><?php echo $ro_data['supplier_address']; ?></td>
				</tr>
				<tr>
					<td>PHONE</td>
					<td>:</td>
					<td><?php echo $ro_data['supplier_phone']; ?></td>
				</tr>
				<tr>
					<td>FAX</td>
					<td>:</td>
					<td><?php echo $ro_data['supplier_fax']; ?></td>
				</tr>
				<tr>
					<td>EMAIL</td>
					<td>:</td>
					<td><?php echo $ro_data['supplier_email']; ?></td>
				</tr>
			</table>
		</div>
		<div class="fclear"></div>
		<br/>
		<table width="<?php echo $set_width; ?>">
			<!-- HEADER -->
			<tr class="tbl-header">
				<td class="first xleft" width="30">NO</td>
				<td class="xleft width="100">KODE</td>
				<td class="xleft" >NAMA BARANG</td>
				<td class="xcenter" width="100">QTY</td>
				<td class="xcenter" width="150">UNIT</td>
			</tr>
			
			<?php
			if(!empty($ro_detail)){
			
				$no = 1;
				$total_qty = 0;
				foreach($ro_detail as $det){
					?>
					<tr class="tbl-data">
						<td class="first xleft"><?php echo $no; ?></td>
						<td class="xleft"><?php echo $det['item_code']; ?></td>
						<td class="xleft"><?php echo $det['item_name']; ?></td>
						<td class="xcenter"><?php echo $det['ro_detail_qty']; ?></td>
						<td class="xcenter"><?php echo $det['unit_name']; ?></td>
					</tr>
					<?php	
					$total_qty += $det['ro_detail_qty'];
					$no++;
				}
				
				?>
				<tr class="tbl-total">
					<td class="first xright" colspan="3"> TOTAL </td>
					<td class="xcenter"><?php echo $total_qty; ?></td>
					<td class="xcenter">&nbsp;</td>
				</tr>
				<?php	
			}
			?>
			
		</table>
		<br/>
		<br/>
		<?php
			if(!empty($ro_data['ro_memo'])){
		?>
			<div class="fleft" style="width:400px; padding:10px; border:1px solid #d8d8d8;">
				<b>Memo:</b><br/>
				<?php echo $ro_data['ro_memo']; ?>
			</div>
		<?php
			} 
		?>
		<div class="fright" style="width:200px;">
			<table>
				<tr class="tbl-footer">
					<td class="xcenter" width="200"><?php echo $report_place_default.', '.date("d")." ".get_month(date("m"))." ".date("Y"); ?></td>
				</tr>
				<tr class="tbl-footer">
					<td class="xcenter">Purchasing<br/><br/><br/><br/></td>
				</tr>
				<tr class="tbl-footer">
					<td class="xcenter"><?php echo $user_fullname; ?></td>
				</tr>
			</table>
		</div>
		<div class="fclear"></div>
		<br/>
	</div>
	
	<?php
		if($do == 'print'){
		?>
		<script type="text/javascript">
			window.print();
		</script>
		<?php
		}
	?>
</body>
</html>