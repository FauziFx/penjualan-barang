
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tambah User
                                
                            </h2>
					</div>
					<div class="body">
              <form method="POST">

         					<label for="">Username</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="username" class="form-control" />
                                </div>
                            </div>

                            <label for="">Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" class="form-control" />
                                </div>
                            </div>


                            <label for="">Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="password"  class="form-control" />
                                </div>
                            </div>
                         

                            <label for="">Level</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <!-- <input style="text-transform: uppercase;" type="text" value="karyawan" name="level"  class="form-control" /> -->
                                    <select name="level" id="" class="form-control" required>
                                        <option value="">-- Pilih Level --</option>
                                        <option value="admin">ADMIN</option>
                                        <option value="karyawan">KARYAWAN</option>
                                    </select>
                                </div>
                            </div>




                           <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">

                        </form>

           <?php 

           	if (isset($_POST['simpan'])) {
           		$username = $_POST['username'];
           		$name = $_POST['name'];
           		$password = $_POST['password'];
           		$level = $_POST['level'];
           	

           	$sql = $koneksi->query("insert into user (username,name,password,level) values('$username','$name','$password','$level')");

           	if ($sql) {
           		?>

           		<script type="text/javascript">
           			alert("Data Berhasil di Simpan");
           			window.location.href="?page=user";
           		</script>


           		<?php
           	}
		}
     ?>