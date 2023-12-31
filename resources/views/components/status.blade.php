@if ( session('status') == 'store')
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil Simpan!</strong> Data telah disimpan!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if ( session('status') == 'update')
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil Update!</strong> Data telah diupdate!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if ( session('status') == 'destroy')
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil Dihapus!</strong> Data telah dihapus!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
