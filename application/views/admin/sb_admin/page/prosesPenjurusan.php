<div class="row" style="margin-bottom: 50px;">
	<form action="<?php echo base_url('admin/Penjurusan/prosesPenjurusan');?>" method="post">
		<div class="col-sm-2"><h4>Tahun Ajaran</h4></div>
		<div class="col-sm-3">
			<select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
				<?php foreach ($tahun_ajaran as $row) {
				?>
					<option value="<?php echo $row->id_tahun_ajaran ?>"> <?php echo $row->tahun_ajaran ?></option>
				<?php
				} ?>
			</select>
		</div>
		<input type="submit" name="proses" id="proses" value="Proses" class="btn btn-primary">
	</form>

	<?php echo $hasil; ?>
</div>