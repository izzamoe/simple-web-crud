<!DOCTYPE html>
   <html>
   <head>
       <title>Edit Produk</title>
   </head>
   <body>
       <h1>Edit Produk</h1>
       <form action="/produk/{{ $produk->id_produk }}" method="POST">
           @csrf
           @method('PUT')
           <label>Nama Produk:</label>
           <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" required>
           <br>
           <label>Harga:</label>
           <input type="number" name="harga" value="{{ $produk->harga }}" required>
           <br>
           <label>Kategori:</label>
           <select name="kategori_id" required>
               @foreach ($kategoris as $kategori)
                   <option value="{{ $kategori->id_kategori }}" {{ $kategori->id_kategori == $produk->kategori_id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
               @endforeach
           </select>
           <br>
           <label>Status:</label>
           <select name="status_id" required>
               @foreach ($statuses as $status)
                   <option value="{{ $status->id_status }}" {{ $status->id_status == $produk->status_id ? 'selected' : '' }}>{{ $status->nama_status }}</option>
               @endforeach
           </select>
           <br>
           <button type="submit">Update</button>
       </form>
   </body>
   </html>