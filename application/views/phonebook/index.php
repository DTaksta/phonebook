<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Phonebook</title>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/knockout-custom.css') ?>" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Phonebook</h2>
                <hr>
                <?php if ($success_message != '') : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Success!</strong> <?= $success_message ?>
                </div>
                <?php endif; ?>

                <?php if ($error_message != '') : ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Error!</strong> <?= $error_message ?>
                </div>
                <?php endif; ?>
                <form action="" method="post">
                    <input type="text" id="search_term" name="search_term" placeholder="What are you looking for?">
                    <button type="submit" value="submit" class="btn">add</button>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($records as $record) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $record->first_name ?></td>
                            <td><?= $record->last_name ?></td>
                            <td><?= $record->email ?></td>
                            <td><?= $record->phone_number ?></td>
                            <td>
                                <!-- Record Edit IDs. -->
                                <a href="<?= site_url('phonebook/edit/' . $record->contact_id) ?>" class="btn btn-warning btn-xs">Edit</a>
                                <a href="<?= site_url('phonebook/delete/' . $record->contact_id) ?>" class="btn btn-danger btn-xs confirm">Delete</a>
                            </td>
                        <?php $no++; endforeach; ?>
                    </tbody>
                </table>

                <?= $pagination ?>

                <div class="pull-right">
                    <a href="<?=site_url('phonebook/add')?>" class="btn btn-success">Add</a>
                </div>

            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <script src="<?= base_url('assets/js/knockout-3.2.0.js') ?>"></script>
    <script src="<?= base_url('assets/js/knockout-custom.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.confirm').click(function() {
                var answer = confirm('Are you sure want to delete this record?');
                if (! answer) return false;
            });
        });
    </script>
</body>
</html>