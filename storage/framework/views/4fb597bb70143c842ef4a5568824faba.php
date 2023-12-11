<h1>Edit Siswa</h1>
<a href="<?php echo e(route('siswa.index')); ?>">Kembali</a></br><br>
 
<form action="<?php echo e(route('siswa.update',$post->id)); ?>" method="POST" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <?php echo method_field('PUT'); ?>
  <label>Nama Siswa</label><br>
  <input type="text" name="nama" value="<?php echo e(old('nama',$post->nama)); ?>"> <br><br>
  <label>JK</label>
  <select name="jk" required>
    <option>Pilih JK</option>
    <option <?php echo e('Laki-laki' == $post->jk ? 'selected' : ''); ?> value="Laki-laki">Laki-laki</option>
    <option <?php echo e('Perempuan' == $post->jk ? 'selected' : ''); ?> value="Perempuan">Perempuan</option>
</select>
<br><br>
<label>Kelas<label><br>
<select name="kelas" required>
  <option>Pilih Kelas</option>
  <option <?php echo e('10' == $post->kelas ? 'selected' : ''); ?> value="10">10</option> 
  <option <?php echo e('11' == $post->kelas ? 'selected' : ''); ?> value="11">11</option>
  <option <?php echo e('12' == $post->kelas ? 'selected' : ''); ?> value="12">12</option>
</select>
<br><br>
<label>Jurusan<label><br>
<select name="jurusan" required>
  <option>Pilih Jurusan</option>
  <option <?php echo e('RPL' == $post->jurusan ? 'selected' : ''); ?> value="RPL">RPL</option> 
  <option <?php echo e('TKJ' == $post->jurusan ? 'selected' : ''); ?> value="TKJ">TKJ</option>
  <option <?php echo e('TKR' == $post->jurusan ? 'selected' : ''); ?> value="TKR">TKR</option>
</select>
<br><br>
<label>Foto Siswa</label><br>
<input type="file" name="image">
<br><br>
<button type="submit">SIMPAN DATA</button>
<button type="reset">RESET DATA</button>
</form><?php /**PATH C:\xampp2\htdocs\cd_lyra\resources\views/siswa/edit.blade.php ENDPATH**/ ?>