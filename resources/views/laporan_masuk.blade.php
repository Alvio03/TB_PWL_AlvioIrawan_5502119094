<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center">Data Barang Masuk</h1>
    <br>
    <table id="table-data" class="table table-bordered">
    <thead>
              <tr>
                <th>NO</th>
                <th>FOTO</th>
                <th>NAMA</th>
                <th>KATEGORI</th>
                <th>MEREK</th>
                <th>HARGA</th>
                <th>STOK</th>
              </tr>
            </thead>
            <tbody>
              @php $no=1; @endphp
              @foreach($barang as $key)
              <tr>
                <td>{{$no++}}</td>
                <td>
                  @if($key->photo !== null)
                  <img src="{{ public_path('storage/photo_barang/'.$key->photo) }}" width="100px" />
                  @else
                  [Picture Not Found]
                  @endif
                </td>
                <td>{{$key->name}}</td>
                <td>{{$key->kategori->name}}</td>
                <td>{{$key->merek->name}}</td>
                <td>{{$key->harga}}</td>
                <td>{{$key->stok}}</td>
              </tr>
              @endforeach
            </tbody>
    </table>
</body>
</html>