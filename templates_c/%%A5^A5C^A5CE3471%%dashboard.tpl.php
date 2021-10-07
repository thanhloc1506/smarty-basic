<?php /* Smarty version 2.6.31, created on 2021-10-07 18:38:36
         compiled from layout/dashboard.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'layout/dashboard.tpl', 1, false),array('modifier', 'json_decode', 'layout/dashboard.tpl', 97, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => 'foo.conf'), $this);?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <title> Dashboard </title>
</head>

<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../../controllers/users/update-user.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li><label for="">Id: </label><input style="margin-left: 5.5rem;" type="text" name="u_id"
                                    id="user_id" disabled></li>
                            <input style="margin-left: 5.5rem;" type="text" name="u_id" id="u_id" hidden>
                            <li><label for="">Name: </label><input style="margin-left: 3.65rem;" type="text"
                                    name="u_name" id="u_name"></li>
                            <li><label for="">Username: </label><input style="margin-left: 1.7rem;" type="text"
                                    name="u_username" id="u_username"></li>
                            <li><label for="">Password: </label><input style="margin-left: 1.9rem;" type="text"
                                    name="u_password" id="u_password"></li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button id="update" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../../controllers/users/create-user.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li><label for="">Id: </label><input style="margin-left: 5.5rem;" type="text" name="c_id"
                                    id="c_id"></li>
                            <li><label for="">Name: </label><input style="margin-left: 3.65rem;" type="text"
                                    name="c_name" id="c_name"></li>
                            <li><label for="">Username: </label><input style="margin-left: 1.7rem;" type="text"
                                    name="c_username" id="c_username"></li>
                            <li><label for="">Password: </label><input style="margin-left: 1.9rem;" type="text"
                                    name="c_password" id="c_password"></li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <button style="float: right; margin-right: 20px;"><a href="../../controllers/auth.controller.php?req=logout">
            Logout</a></button>
    <h4 style="float: right; margin-right: 20px;"> Hello <?php echo $this->_tpl_vars['user']['FULL_NAME']; ?>
</h4>
    <h1 class="title"> <?php echo $this->_config[0]['vars']['dashboardName']; ?>
 </h1>
    <table id="customers">
        <tr>
            <th>Id</th>
            <th>Full Name</th>
            <th>username</th>
            <th>password</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php $_from = ((is_array($_tmp=$this->_tpl_vars['user_list'])) ? $this->_run_mod_handler('json_decode', true, $_tmp) : json_decode($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['user']):
?>
            <tr>
                <td class="id"><?php echo $this->_tpl_vars['user']->UID; ?>
</td>
                <td class="name"><?php echo $this->_tpl_vars['user']->FULL_NAME; ?>
</td>
                <td class="username"><?php echo $this->_tpl_vars['user']->USERNAME; ?>
</td>
                <td class="Hpassword">********</td>
                <td class="password" hidden><?php echo $this->_tpl_vars['user']->PASS; ?>
</td>
                <td><button class="btn-edit" type="button" data-toggle="modal" data-target="#exampleModal">Update</button>
                </td>
                <td><a href="../../../controllers/users/delele-user.php?id=<?php echo $this->_tpl_vars['user']->UID; ?>
">Delete</a></td>
            </tr>
        <?php endforeach; endif; unset($_from); ?>
    </table>

    <button class="add_btn" data-toggle="modal" data-target="#createModal">Add user</button>

</body>

<?php echo '

    <script>
        $(document).ready(() => {
            $(".btn-edit").click(function() {
                var id = parseInt($(this).closest(\'tr\').find(\'.id\').text())
                var name = $(this).closest(\'tr\').find(\'.name\').text()
                var username = $(this).closest(\'tr\').find(\'.username\').text()
                var password = $(this).closest(\'tr\').find(\'.password\').text()
                $(\'#u_id\').val(id)
                $(\'#user_id\').val(id)
                $(\'#u_name\').val(name)
                $(\'#u_username\').val(username)
                $(\'#u_password\').val(password)
            })
        })
    </script>

'; ?>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>

</html>