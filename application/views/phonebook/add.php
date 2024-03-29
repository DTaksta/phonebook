<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Phonebook</title>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
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
                    <h2>Contacts</h2>
                    <div id='contactsList'>
                        <table class='contactsEditor'>
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Phone numbers</th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td>
                                        <input name="first_name" value=""  />
                                    </td>
                                    <td><input name="last_name" value=""  /></td>
                                    <td>
                                        <table class="phone-table">
                                            <tbody>
												<tr class="tr_clone">
													<td><input name="phoneTypes[]" value=""/></td>
													<td><input name="phoneNumbers[]" value=""/></td>
													<td><a href='#' class="tr_remove">Delete&nbsp;</a></td>
													<td><a href="#" class="tr_clone_add">Add</a></td>
												</tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>
                                        <table class="email-table">
                                            <th>Emails</th>
                                            <tbody>
												<tr class="tr_clone">
													<td><input name="emailTypes[]" value="" /></td>
													<td><input name="emails[]" value=""/></td>
													<td><a href='#' class="tr_remove" >Delete&nbsp;</a></td>
													<td><a href="#" class="tr_clone_add">Add</a></td>
												</tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <a href="<?= site_url('phonebook/index') ?>" class="btn btn-danger">Cancel</a>
                </form>
        	</div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!--dynamic form fields-->
	<script src="<?= base_url('assets/js/custom-edit-form.js') ?>"></script>
</body>
</html>