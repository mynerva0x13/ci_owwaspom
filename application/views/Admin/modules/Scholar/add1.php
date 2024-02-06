<?php
$url =  null;
$val = null;
$desc = null;
if(!empty($_GET['view']) && $_GET['view']=="update") {
    $url = "SubAdmin/scholar/scholar1/doEdit?id=".$con->id."&link=$link2";
    $desc = $con->desc;
}
else {
    $url = "SubAdmin/scholar/scholar1/doInsert?link=$link2";
}
?>
<style>
	select {

		font-family: arial, sans-serif;
		outline: 0;
		padding: 5px;
		margin-left: 10px;
		margin-right: 10px;
		border-radius: 5px;
		width: 50%;
	}

	.provinces {
		display: flex;
	}

</style>
<form class="row g-3" action="<?php echo base_url($url)?>" method="POST">

	<div class="row">
		<div class="col-lg-12">
			<h3>Scholar Information</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-1">
			<label class="bmd-label-floating">Program:</label>
		</div>
		<div class="col-md-2">
			<select class="form-control input-sm" name="program" id="program" required>
				<option value="" disabled selected>Select a program</option>
				<option value="ODSP">ODSP</option>
				<option value="ODSP+">ODSP+</option>
				<option value="EDSP">EDSP</option>
				<option value="EDSP+">EDSP+</option>
				<option value="ELAP">ELAP</option>
			</select>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label class="bmd-label-floating">First Name:</label>
				<input class="form-control input-sm" id="firstname" name="firstname" required>
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label class="bmd-label-floating">Middle Name:</label>
				<input class="form-control input-sm" id="middlename" name="middlename" type="text">
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label class="bmd-label-floating">Last Name:</label>
				<input class="form-control input-sm" id="lastname" name="lastname" type="text" required>
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label class="bmd-label-floating">Suffix:</label>
				<input class="form-control input-sm" id="suffix" name="suffix">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-2">
			<div class="form-group">
				<label class="bmd-label-floating">Age:</label>
				<input class="form-control input-sm" id="age" name="age" type="number" required>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label class="bmd-label-floating">Gender:</label>
				<select class="form-control input-sm" name="gender" id="gender" required>
					<option value="" disabled selected>Select Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label class="bmd-label-floating">Birthdate:</label>
				<input class="form-control input-sm" id="birthdate" name="birthdate" onfocus="(this.type='date')"
					onblur="this.type='text'" type="text" required>
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label class="bmd-label-floating">Email:</label>
				<input class="form-control input-sm" id="email" name="email" type="email" required onblur="">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label class="bmd-label-floating">Phone Number: 0000-0000-0000</label>
				<input class="form-control input-sm" id="phone_num" name="phone_num" type="tel"
					pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" required>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="bmd-label-floating">Street/Barangay/Municipality:</label>
				<input class="form-control input-sm" id="address" name="address" type="text" required>
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label class="bmd-label-floating">Province:</label>
				<select class="form-control input-sm" name="region" id="region" required>
					<option value="" disabled selected>Select Province</option>
					<option value="Mindoro Oriental">Mindoro Oriental</option>
					<option value="Mindoro Occidental">Mindoro Occidental</option>
					<option value="Marinduque">Marinduque</option>
					<option value="Romblon">Romblon</option>
					<option value="Palawan">Palawan</option>
				</select>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<h3>Name of OWWA Member</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label class="bmd-label-floating">First Name:</label>
				<input class="form-control input-sm" id="OFW_firstname" name="OFW_firstname" type="text" required>
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label class="bmd-label-floating">Middle Name:</label>
				<input class="form-control input-sm" id="OFW_middlename" name="OFW_middlename" type="text">
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label class="bmd-label-floating">Last Name:</label>
				<input class="form-control input-sm" id="OFW_lastname" name="OFW_lastname" type="text" required>
			</div>
		</div>

		<div class="col-md-3">
			<div class="form-group">
				<label class="bmd-label-floating">Suffix:</label>
				<input class="form-control input-sm" id="OFW_suffix" name="OFW_suffix">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label class="bmd-label-floating">Relationship to OFW Member:</label>
				<input class="form-control input-sm" id="OFW_relationship" name="OFW_relationship" type="text" required>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label class="bmd-label-floating">Email:</label>
				<input class="form-control input-sm" id="OFW_email" name="OFW_email" type="email" required>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<label class="bmd-label-floating">Category:</label>
				<select class="form-control input-sm" name="category" id="category" required>
					<option value="" disabled selected>Select category</option>
					<option value="Land based">Land based</option>
					<option value="Sea based">Sea based</option>
				</select>
			</div>
		</div>
	</div>

	<!-- buttons -->

	<div class="row">
		<div class="text-right">
			<div class="col-md-6">
				<button class="btn btn-success btn-floating" name="save" type="submit">Save</button>
			</div>
		</div>
		<div class="text-right">
			<div class="col-md-6">
				<button class="btn btn-danger btn-floating" name="cancel" value="Cancel"
					onclick="history.back()">Cancel</button>
			</div>
		</div>
	</div>

	<!--/.fluid-container-->
</form>
