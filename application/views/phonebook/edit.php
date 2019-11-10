<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Phonebook</title>
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<!--dynamic form fields.-->
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="<?= base_url('assets/css/dynamicformfields.css') ?>" rel="stylesheet">
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

                <form action="" method="post">
                	<div class="form-group">
                		<label for="name">Name</label>
                		<input type="text" name="name" id="name" class="form-control" value="<?= $record->name ?>">
					</div>
					<!-- Dynamic Form Fields BEGIN. -->
					<div class="container">
						<div class="row">
							<input type="hidden" name="count" value="1" />
							<div class="control-group" id="fields">
								<label class="control-label" for="field1">Nice Multiple Form Fields</label>
								<div class="controls" id="profs"> 
									<form class="input-append">
										<div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
									</form>
								<br>
								<small>Press + to add another form field :)</small>
								</div>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<input type="hidden" name="count" value="1" />
							<div class="control-group" id="fields">
								<label class="control-label" for="field1">Nice Multiple Form Fields</label>
								<div class="controls" id="profs"> 
									<form class="input-append">
										<div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
									</form>
								<br>
								<small>Press + to add another form field :)</small>
								</div>
							</div>
						</div>
					</div>
					<!-- Dynamic Form Fields END. -->
                	<!-- <div class="form-group">
                		<label for="email">Email</label>
                		<input type="email" name="email" id="email" class="form-control" value="<?= $record->email ?>">
                	</div>
                	<div class="form-group">
                		<label for="phone">Phone</label>
                		<input type="text" name="phone" id="phone" class="form-control" value="<?= $record->phone ?>">
                	</div> -->
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
	<script src="<?= base_url('assets/js/dynamicformfields.js') ?>"></script>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>