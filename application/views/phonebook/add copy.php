<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Phonebook</title>
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
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
                		<input type="text" name="name" id="name" class="form-control" value="<?=set_value('name'); ?>">
                	</div>
                	<div class="form-group">
                		<label for="email">Email</label>
                		<input type="email" name="email" id="email" class="form-control" value="<?= set_value('email'); ?>">
                	</div>
                	<div class="form-group">
                		<label for="phone">Phone</label>
                		<input type="text" name="phone" id="phone" class="form-control" value="<?= set_value('phone'); ?>">
                	</div>
                	<button type="submit" class="btn btn-default">Submit</button>
                    <a href="<?= site_url('phonebook/index') ?>" class="btn btn-danger">Cancel</a>
                </form>
        </div>
		</div>
	</div>

    <script src="<?= base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>