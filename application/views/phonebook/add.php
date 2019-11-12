<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Phonebook</title>
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<!--dynamic form fields.-->
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- KO Styles -->
	<link href="<?= base_url('assets/css/knockout-custom.css') ?>" rel="stylesheet">
	<!-- <link href="https://knockoutjs.com/css/tripoli.simple.css" rel="stylesheet">
	<link href="https://knockoutjs.com/css/styles.css" rel="stylesheet">
	<link href="https://knockoutjs.com/css/smallScreen.css" rel="stylesheet"> -->
</head>
<body>
	<div class="wrapper">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
                <h2>Phonebook</h2>

				<hr>

                <?php if ($error_message != '') : ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Error!</strong> <?= $error_message ?>
                </div>
                <?php endif; ?>

                <!-- <form action="" method="post"> -->
				<form data-bind = "submit: submitWithKnockoutJS">
					<h2>Contacts</h2>
					<div id='contactsList'>
						<table class='contactsEditor'>
							<tr>
								<th>First name</th>
								<th>Last name</th>
								<th>Phone numbers</th>
							</tr>
							<tbody data-bind="foreach: contacts">
								<tr>
									<td>
										<input name="first_name" data-bind='value: firstName' />
										<!-- <div><a href='#' data-bind='click: $root.removeContact'>Delete</a></div> -->
									</td>
									<td><input name="last_name" data-bind='value: lastName' /></td>
									<td>
										<table>
											<tbody data-bind="foreach: phones">
												<tr>
													<td><input name="phoneType[]" data-bind="value: type"/></td>
													<td><input name="phoneNumber[]" data-bind="value: number" /></td>
													<td><a href='#' data-bind='click: $root.removePhone'>Delete</a></td>
												</tr>
											</tbody>
										</table>
										<a href='#' data-bind='click: $root.addPhone'>Add number</a>
									</td>
								</tr>
								<tr>
									<td colspan="2"></td>
									<td>
										<table>
											<th>Emails</th>
											<tbody data-bind="foreach: emails">
												<tr>
													<td><input name="emailType[]" data-bind="value: type" /></td>
													<td><input name="emailAddress[]" data-bind="value: email" /></td>
													<!-- Impliment remove email. -->
													<td><a href='#' data-bind='click: $root.removeEmail'>Delete</a></td>
												</tr>
											</tbody>
										</table>
										<a href='#' data-bind='click: $root.addEmail'>Add email</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
	
					<p>
						<button data-bind='click: addContact'>Add a contact</button>
						<button data-bind='click: save, enable: contacts().length > 0'>Save to JSON</button>
					</p>
					
					<textarea data-bind='value: lastSavedJson' rows='5' cols='60' disabled='disabled'> </textarea>
                	<button type="submit" class="btn btn-default">Submit</button>
					<a href="<?= site_url('phonebook/index') ?>" class="btn btn-danger">Cancel</a>
				</form>
				

        </div>
		</div>
	</div>

    <script src="<?= base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<!--dynamic form fields-->
	<script src="<?= base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>
	<script src="https://knockoutjs.com/downloads/knockout-3.2.0.js"></script>
	<script src="<?= base_url('assets/js/knockout-custom.js') ?>"></script>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>