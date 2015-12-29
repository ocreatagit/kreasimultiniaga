<div class="container">
    <div class="col-sm-offset-4 col-sm-4">
        <form class="form-horizontal" action="<?php current_url() ?>" method="POST">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input name="username" required type="username" class="form-control" id="inputEmail3" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <input name="password" required type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>            
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button name="btn_login" value="btn_login" type="submit" class="btn btn-default col-sm-12">Sign in</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>/backend/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>/backend/js/bootstrap.min.js"></script>
<link href="<?php echo base_url(); ?>/backend/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" />

</body>

</html>
