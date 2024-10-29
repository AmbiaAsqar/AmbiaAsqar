@extends('main-admin')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">konfigurasi Slide</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Admin/Slide</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@elseif(session('error'))
<div class="alert alert-danger">
    @elseif(session('error'))
</div>
@endif
<div class="card">
    <div class="card-body">
        <h4 class="mb-3 header-title mt-0">Tambah Gambar</h4>
        <form action="{{ route('berita.post') }}" method="POST" enctype="multipart/form-data" id="berita">
            @csrf
            <div class="form-group">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Foto Banner</label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control" name="banner" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Deskripsi</label>
                    <div class="col-lg-10">
                        <textarea name="deskripsi" class="form-control" id="summernote" required></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Tipe</label>
                    <div class="col-lg-10">
                        <select class="form-control"name="tipe">
                            <option value="home">Home</option>
                            <option value="popup">PopUp</option>
                            <option value="mobile-game">Mobile Game</option>
                            <option value="pc-game">PC Game</option>
                            <option value="streaming-app">Streaming App</option>
                            <option value="pulsa-utilitas">Pulsa & Utilitas</option>
                            <option value="e-wallet">E-Wallet</option>
                            <option value="jasa-joki">Jasa Joki</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-1">Semua Gambar</h4>
                <div class="table-responsive-xxl">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Path</th>
                                <th>Tipe</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;?>
                            @foreach( $berita as $data)
                            <tr>
                                <th scope="row">{{ $no }}</th>
                                <td>{{ $data->path }}</td>
                                <td>{{ $data->tipe }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>{!! ($data->status == 1) ? '<span class=\'text-success\'>aktif</span>' : '<span class=\'text-danger\'>non-aktif</span>' !!}
                                <td>
                                    {{-- <a class="btn-sm btn-danger mt-2" href="/berita/hapus/{{ $data->id }}">Non-aktifkan</a> --}}
                                    @if($data->status == 0)
                                    <a class="btn-sm btn-success mt-2" href="/berita/activate/{{ $data->id }}">Aktifkan</a>
                                    @else
                                    <a class="btn-sm btn-danger mt-2" href="/berita/inactive/{{ $data->id }}">Non-aktifkan</a>
                                    @endif
                                </td>
                            </tr>
                            <?php $no++ ;?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.table').DataTable({
          
        });
    });
    
    function modal(name, link) {
        var myModal = new bootstrap.Modal($('#modal-detail'))
        $.ajax({
            type: "GET",
            url: link,
            beforeSend: function() {
                $('#modal-detail-title').html(name);
                $('#modal-detail-body').html('Loading...');
            },
            success: function(result) {
                $('#modal-detail-title').html(name);
                $('#modal-detail-body').html(result);
            },
            error: function() {
                $('#modal-detail-title').html(name);
                $('#modal-detail-body').html('There is an error...');
            }
        });
        myModal.show();
    }
</script>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal-detail" style="border-radius:7%">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-detail-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-detail-body"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote();
        // var quill = new Quill('#snow-editor', {
        //     theme: 'snow',
        //     modules: {
        //         'toolbar': [[{ 'font': [] }, { 'size': [] }], ['bold', 'italic', 'underline', 'strike'], [{ 'color': [] }, { 'background': [] }], [{ 'script': 'super' }, { 'script': 'sub' }], [{ 'header': [false, 1, 2, 3, 4, 5, 6] }, 'blockquote', 'code-block'], [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }], ['direction', { 'align': [] }], ['link', 'image', 'video', 'formula'], ['clean']]
        //     },
        // })
        // $("#berita").on("submit",function() {
        //     $("#deskripsi").val(myEditor.children[0].innerHTML);
        // })
    });
</script>
@endsection