<!DOCTYPE html>
   <html>
   <head>
       <title>Tambah Produk</title>
   </head>
   <body>
       <h1>Tambah Produk</h1>
       <form action="/produk" method="POST">
           @csrf
           <label>Nama Produk:</label>
           <input type="text" name="nama_produk" required>
           <br>
           <label>Harga:</label>
           <input type="number" name="harga" required>
           <br>
           <label>Kategori:</label>
           <select name="kategori_id" required>
               @foreach ($kategoris as $kategori)
                   <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
               @endforeach
           </select>
           <br>
           <label>Status:</label>
           <select name="status_id" required>
               @foreach ($statuses as $status)
                   <option value="{{ $status->id_status }}">{{ $status->nama_status }}</option>
               @endforeach
           </select>
           <br>
           <button type="submit">Simpan</button>
       </form>
   </body>
</html>