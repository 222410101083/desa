<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Register for Contact App</h5>
                    <form action="<?= urlpath('register'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" id="role">
                                <option value="admin">Admin</option>
                                <option value="pemerintah" selected>Pemerintah</option>
                                <option value="masyarakat">Masyarakat</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>
                    <div class="d-flex justify-content-between">
                        <a href="<?=BASEURL?>">Home</a>
                        <a href="<?= urlpath('login'); ?>">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>