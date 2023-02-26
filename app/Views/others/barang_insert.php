<?= $this->extend('theme/index'); ?>
<?= $this->section('content'); ?>

<form method="post" action="<?= site_url('barang/insert') ?>">
  <?= csrf_field() ?>
  <h2 class="font-weight-bold">Insert Data</h2>
  <br>
  <table class="table table-striped">
    <tr>
      <td class="font-weight-bold">Nama Barang </td>
      <td>
      <input type="text" name="nama_barang" value="" class="form-control"/>
      </td>
    </tr>
    <tr>
      <td class="font-weight-bold">Jumlah</td>
      <td>
        <input type="number" name="jumlah" value="" class="form-control"/>
      </td>
    </tr>
    <tr>
      <td class="font-weight-bold">warranty</td>
      <td>
        <input type="date" name="warranty" value="" class="form-control"/>
      </td>
    </tr>
    <tr>
      <td class="font-weight-bold">Serial Number</td>
      <td>
        <input type="text" name="serial_number" value="" class="form-control"/>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
      </td>
    </tr>
  </table>
</form>

<?= $this->endSection('content'); ?>