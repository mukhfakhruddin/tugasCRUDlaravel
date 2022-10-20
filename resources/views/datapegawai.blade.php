<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-4">Data Pegawai</h1>

      <div class="container">
        <a href="/tambahpegawai" class="btn btn-primary">Tambah Pegawai</a>
        <div class="row">
          @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
          @endif
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Foto</th>
                <th scope="col">Alamat</th>
                <th scope="col">No.Telpon</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1;
              @endphp

              @foreach ($data as $row)
                <tr>
                  <th scope="row">{{ $no++ }}</th>
                  <td>{{ $row->nama }}</td>
                  <td>
                    <img src="{{ asset('fotopegawai/'.$row->foto) }}" alt="" style="width: 40px;">
                  </td>
                  <td>{{ $row->alamat }}</td>
                  <td>0{{ $row->notelpon }}</td>
                  <td>{{ $row->created_at->format('D M Y') }}</td>
                  <td>
                    <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Hapus</a>
                  </td>
                </tr>
              @endforeach
              
              
            </tbody>
          </table>
        </div>
      </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.6.1.slim.js"
  integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk="
  crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
  <script>
    $('.delete').click(function() {
      let pegawaiid = $(this).attr('data-id')
      let nama = $(this).attr('data-nama')

      swal({
        title: "Apakah Kamu Yakin?",
        text: "Kamu akan menghapus data pegawai yang bernama "+nama+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/delete/"+pegawaiid+""
          swal("Data Berhasil dihapus", {
            icon: "success",
          });
        } else {
          swal("Data tidak jadi dihapus");
        }
      });
    });
    
  </script>
</html>