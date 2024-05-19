
<div class="flex justify-center items-center h-full">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Akun Pemerintah</h5>
            <form action="<?= urlpath('tambahakun/tambahakunpemerintah'); ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control" id="role">
                        <option value="pemerintah">Pemerintah</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Akun</button>
            </form>
        </div>
    </div>
</div>
<?php include 'view/master.php'; ?>