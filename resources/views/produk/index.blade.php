<!DOCTYPE html>
   <html>
   <head>
       <title>Produk</title>
   </head>
   <body>
       <h1>Produk</h1>
       <a href="/produk/create">Tambah Produk</a>
       @if (session('success'))
           <p>{{ session('success') }}</p>
       @endif
       <table border="1">
           <tr>
               <th>ID</th>
               <th>Nama Produk</th>
               <th>Harga</th>
               <th>Kategori</th>
               <th>Status</th>
               <th>Aksi</th>
           </tr>

           @foreach ($produks as $produk)
               <tr>
                   <td>{{ $produk->id_produk }}</td>
                   <td>{{ $produk->nama_produk }}</td>
                   <td>{{ $produk->harga }}</td>
                   <td>{{ $produk->kategori->nama_kategori }}</td>
                   <td>{{ $produk->status->nama_status }}</td>
                   <td>
                       <a href="/produk/{{ $produk->id_produk }}/edit">Edit</a>
                       <form action="/produk/{{ $produk->id_produk }}" method="POST" style="display:inline;">
                           @csrf
                           @method('DELETE')
                           <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                       </form>
                   </td>
               </tr>
           @endforeach
       </table>
   </body>
</html>
