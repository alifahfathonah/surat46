@extends ('adminlte')

@section ('sidebar')
    @include ('secretary/sidebar', ['section' => 'mail'])
@endsection

@section ('sidebar_type', 'sidebar-collapse')

@section ('custom_top_list')
    <li class="nav-item">
        <a href="{{ url('secretary/mail/inbox/add') }}" title="Tambah data surat masuk"><i class="fa fa-plus-circle"></i></a>
    </li>
@stop

@section ('search_form')
  <form class="form-inline ml-3" action="{{ url('secretary/mail/inbox/search') }}" method="GET">
          <div class="input-group input-group-sm">
            <input name="q" class="form-control form-control-navbar" type="search" placeholder="Cari data surat masuk..." value="{{ $q }}" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
            </div>
          </div>
        </form>
@endsection

@section ('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cari Surat Masuk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('secretary') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('secretary/mail') }}">Surat</a></li>
              <li class="breadcrumb-item"><a href="{{ url('secretary/mail/inbox') }}">Surat Masuk</a></li>
              <li class="breadcrumb-item active">Cari "<i>{{ $q }}</i>"</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
            <!-- general form elements disabled -->
            <div class="card card-primary">
            @if ( count($inboxs) > 0)
              <div class="card-body p-0">
                <div class="table-responsive tableFixHead">
                    <table class="table table-striped table-bordered">
                        <tr class="bg-primary">
                            <th style="width: 10%;">No. Agenda / Klasifikasi</th>
                            <th style="width: 40%;">Ringkasan / File</th>
                            <th style="width: 15%;">Asal Surat</th>
                            <th style="width: 25%;">No. Surat / Tanggal Surat</th>
                            <th style="width: 10%;"></th>
                        </tr>
                        @foreach ($inboxs as $inbox)
                        <tr class="data-{{ $inbox->id }}">
                            <td>
                                {{ $inbox->agenda_number }}
                                    <br><hr>
                                {{ $inbox->classification->code }} / {{ $inbox->classification->name }}
                            </td>
                            <td class="text-justify">
                                {{ $inbox->resume }}{{ $inbox->media[0]->file_name }}
                                    <br><hr>
                                    File:
                                    @if ( isset($inbox->media[0]))
                                    <a href="{{ $inbox->media[0]->getFullUrl() }}" target="_blank"></a>
                                    @else
                                    Tidak ada file
                                    @endif
                            </td>
                            <td class="yearColumn">{{ $inbox->mail_from }}</td>
                            <td>
                                {{ $inbox->mail_number }}
                                    <br><hr>
                                {{ date('d F Y', strtotime($inbox->mail_date)) }}
                            </td>
                            <td class="text-right" style="width: 20%;">
                                <a href="{{ url('secretary/mail/inbox/view/'. $inbox->id) }}" class="btn btn-primary btn-sm">LIHAT</a>
                                <a href="{{ url('secretary/mail/inbox/edit/'. $inbox->id) }}" class="btn btn-sm btn-warning m-1">EDIT</a>
                                <a href="#" data-id="{{ $inbox->id }}" class="btn btn-danger deleteBtn btn-sm" data-toggle="modal" data-target="#confirmDeleteDialog">HAPUS</a>
                                <a href="{{ url('secretary/mail/disposition/'. $inbox->id) }}" class="btn  btn-info m-1 btn-sm">DISPOSISI</a>
                                <form action="{{ url('secretary/mail/inbox/print') }}" method="POST">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="id" value="{{ $inbox->id }}">
                                  <input type="submit" value="PRINT" class="btn btn-success btn-sm">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                <div class="card-body">
                    <div class="alert alert-info">
                        Tidak ada hasil pencarian ditemukan. Coba kata kunci lain atau tambahkan data surat baru.
                    </div>
                @endif
              </div>
              <!-- /.card-body -->
              @if ( ! empty($inboxs->links()))
              <div class="card-footer">
                {{ $inboxs->links() }}
              </div>
              @endif
            </div>
            <!-- /.card -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section ('custom_html')
    <div class="modal fade" id="confirmDeleteDialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Data Angkatan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="confirmDeleteText">Yakin ingin menghapus data surat masuk? Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-primary confirmDoDeleteBtn">Hapus</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@push ('custom_js')
<script>
function doDeleteclsf (clsf_id) {
    $('.confirmDoDeleteBtn').click(function (e) {
        e.preventDefault();

        var con = $('.data-'+ clsf_id);
        var bo = $('.yearColumn', con);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        $.ajax({
            method: 'DELETE',
            url: '{{ url('secretary/mail/inbox/delete') }}',
            data: { id: clsf_id },
            beforeSend: function() {
                $('.confirmDeleteText').html('Sedang menghapus data. Harap menunggu...');
            },
            success: function(res) {
                if (res.success) {
                    $(con).css('background', '#eb3337');
                    $(con).css('color', 'white');
                    $('a', con).css('color', 'white');

                    bo.html('<i class="fa fa-spin fa-spinner"></i> Menghapus ...');
                    toastr.options = {
                        preventDuplicates: true
                    };
                    toastr.success('Data berhasil dihapus');
                    setTimeout(function() {
                        $('#confirmDeleteDialog').modal('hide');
                    }, 1000);
                    setTimeout(function() {
                        bo.html('<i class="fa fa-check"></i> Data berhasil dihapus');
                    }, 2000);
                    setTimeout(function() {
                        bo.html('<i class="fa fa-sync fa-spin"></i> Memuat ulang...');
                    }, 3000);
                    setTimeout(function() {
                        con.hide('slow');
                    }, 4000);
                }
            }
        });
    });
} 

$('.deleteBtn').click(function(e) {
    var clsf_id = $(this).data('id');
    doDeleteclsf (clsf_id);
});
</script>
@endpush