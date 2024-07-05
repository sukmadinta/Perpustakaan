@extends('index')
@section('title', 'Pengembalian')

@section('isihalaman')
<br>
    <h3><center>Daftar Pengembalian Perpustakaan SMP Muhammadiyah 2 Minggir</center></h3>
    <br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPengembalianTambah"> 
        Tambah Data Pengembalian 
    </button>
    <br>
    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pengembalian</td>
                <td align="center">ID Pinjam</td>
                <td align="center">Tanggal Pengembalian</td>
                <td align="center">Denda</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pengembalians as $index => $pengembalian)
                <tr>
                    <td align="center" scope="row">{{ $index + $pengembalians->firstItem() }}</td>
                    <td>{{ $pengembalian->id_pengembalian }}</td>
                    <td>{{ $pengembalian->id_pinjam }}</td>
                    <td>{{ $pengembalian->tanggal_pengembalian }}</td>
                    <td>{{ $pengembalian->denda }}</td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPengembalianEdit{{$pengembalian->id_pengembalian}}"> 
                            Edit
                        </button>

                         <!-- Awal Modal EDIT data Pengembalian -->
                        <div class="modal fade" id="modalPengembalianEdit{{$pengembalian->id_pengembalian}}" tabindex="-1" role="dialog" aria-labelledby="modalPengembalianEditLabel{{$pengembalian->id_pengembalian}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPengembalianEditLabel{{$pengembalian->id_pengembalian}}">Form Edit Data Pengembalian</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form name="formPengembalianEdit" id="formPengembalianEdit{{$pengembalian->id_pengembalian}}" action="/pengembalian/edit/{{ $pengembalian->id_pengembalian }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_pinjam" class="col-sm-4 col-form-label">ID Pinjam</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id_pinjam{{$pengembalian->id_pengembalian}}" name="id_pinjam" value="{{ $pengembalian->id_pinjam }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tanggal_pengembalian" class="col-sm-4 col-form-label">Tanggal Pengembalian</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control tanggal_pengembalian" id="tanggal_pengembalian{{$pengembalian->id_pengembalian}}" name="tanggal_pengembalian" value="{{ $pengembalian->tanggal_pengembalian }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="denda" class="col-sm-4 col-form-label">Denda</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="denda{{$pengembalian->id_pengembalian}}" name="denda" value="{{ $pengembalian->denda }}" readonly>
                                                </div>
                                            </div>

                                            <!-- Tambahkan input untuk data pengembalian lainnya sesuai kebutuhan -->

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Pengembalian -->
                        |
                        <form action="/pengembalian/hapus/{{ $pengembalian->id_pengembalian }}" method="POST" onsubmit="return confirm('Yakin mau dihapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $pengembalians->currentPage() }} <br />
    Jumlah Data : {{ $pengembalians->total() }} <br />
    Data Per Halaman : {{ $pengembalians->perPage() }} <br />
    <br>
    <br>

    {{ $pengembalians->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Pengembalian -->
    <div class="modal fade" id="modalPengembalianTambah" tabindex="-1" role="dialog" aria-labelledby="modalPengembalianTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPengembalianTambahLabel">Form Input Data Pengembalian</h5>
                </div>
                <div class="modal-body">
                    <!-- Form untuk menambahkan data pengembalian -->
                    <form name="formPengembalianTambah" id="formPengembalianTambah" action="{{ url('/pengembalian/tambah') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="id_pinjam">ID Pinjam</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" placeholder="Masukkan ID Pinjam" data-tanggal-pinjam="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_pengembalian" class="col-sm-4 col-form-label">Tanggal Pengembalian</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" placeholder="Masukan Tanggal Pengembalian">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="denda" class="col-sm-4 col-form-label">Denda</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="denda" name="denda" readonly>
                            </div>
                        </div>

                        <!-- Tambahkan input untuk data pengembalian lainnya sesuai kebutuhan -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="pengembaliamtambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Pengembalian -->
    
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    // Script untuk form tambah pengembalian
    $('#modalPengembalianTambah #tanggal_pengembalian').on('change', function(){
        var tanggalPinjam = $('#modalPengembalianTambah #id_pinjam').data('tanggal-pinjam');
        var tanggalKembali = $(this).val();
        
        $.ajax({
            url: '/hitung-denda',
            type: 'POST',
            data: {
                tanggal_pinjam: tanggalPinjam,
                tanggal_kembali: tanggalKembali,
                _token: '{{ csrf_token() }}'
            },
            success: function(data){
                $('#modalPengembalianTambah #denda').val(data);
            }
        });
    });

    // Script untuk form edit pengembalian
    @foreach ($pengembalians as $pengembalian)
        $('#modalPengembalianEdit{{$pengembalian->id_pengembalian}} #tanggal_pengembalian{{$pengembalian->id_pengembalian}}').on('change', function(){
            var tanggalPinjam = $('#modalPengembalianEdit{{$pengembalian->id_pengembalian}} #id_pinjam{{$pengembalian->id_pengembalian}}').data('tanggal-pinjam');
            var tanggalKembali = $(this).val();
            
            $.ajax({
                url: '/hitung-denda',
                type: 'POST',
                data: {
                    tanggal_pinjam: tanggalPinjam,
                    tanggal_kembali: tanggalKembali,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data){
                    $('#modalPengembalianEdit{{$pengembalian->id_pengembalian}} #denda{{$pengembalian->id_pengembalian}}').val(data);
                }
            });
        });
    @endforeach
});
</script>
