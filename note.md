pertemuan 23:
1. ambil semua data siswa
Siswa::whereNotIn('wali_id', [$id])->pluck('nama', 'id');
2. whereNotIn jangan tampilkan jika siswa sudah ada
3. validation exist:user, id = pastika data wali_id ada di tabel user
4. membuat flash message secara global
5. 
Pertemuan 24:
1. Menambar fitur hapus siswa, tp bukan hapus melainkan update data siswa.
2. Tambahkan button hapus di detail wali bagian data siswa
3. Terus lakukan update di controller WaliSiswaController, dengan cara ambil  dulu data berdasarkan id
   lalu ubah wali_di dan wali_status menjadi null, lalu save
4. buat flash untuk memberi tahu bahwa data sudah di hapus

Pertemuan 25:
1. Membuar eager Loading agar data yang di query tidak berulang-ulang
2. Jadi dapat meningkatkan kecepatan web kita

Pertemuan 26:
1. Mengganti baha indonesia dengan menggunakan sebuah package
2. Nama Packaged adalah laravel lang
3. Sebelum digunaan ubah dulu di app confgig menjadi bahas indonesia

pertmuan 27:
1. Form request
2. Memindah semua validasi yang ada di controlle ke dalam sebuah form request
3. Untuk membuat form request bisa menggunkan perinta php artisan make:request
4. Lalu pindah validasi ke dalam form request yang sudah di buat
5. Jangna lupa true di bagian authorize

Pertemuan 28:
1. Membuar CRUD Data biaya
2. Caranya hampir sama dengan data sisay

Pertemuan 29:
1. Menambahkan sebuah plugin yaitu Jquery masked input
2. Yang berguna memisakan angka 0 dengan titik ketika di inputakan di bagian julah biaya,

Pertemuan 30
1. menambahkan perparing input for validtion di form request biaya
2. guananya untuk menghilangkan titik yang ada di inputan jumlah
3. nama functionnya adalah prepareForValidaton

Pertemuan 31
1. Menggunkan event elquent
2. Contohnya di bagina user_id
3. Dipndahkan ke dalam model, agar otomatis terload ketika menambahkan atau update data
4. Jadi tidak perlua lagi membuatnya di controller
4. Nama functionnya adalah, createing untuk create data
5. Updating untuk update data

Pertemuan 32
1. Membuat function helper untuk format rupiah
2. Setelah di buat tambahkan files di composer.json agar helpernya terload
3. Setelah itu tinggal panggil

Pertemuan 33
1. Membaur sebauh Traits
2. Letaknya di dalam folder app, buat sebuah folder dengan nama Traits
3. Lalu buat sebuah class atau train dengan nama HasFormatRupiah
4. Setelah itu panggil trait di dalam model Biaya dengan perinta use
5. Setelah di panggil tinggal di gunakan function yang berada di Traits tersebut

Pertemuan 34
1. Membuat tabel Tagihan siswa

Pertemuan 35
1. Menambahka colum kelas
2. Namun harus di rollback terbeih dahulu, dengan perinta
3. php artisn migrate:status untuk lihat status migrate
4. php artisan migrate:rollback --step=1, untu menghapus migrate sebelumnya 
5. php artisan migrate kembali.


Pertemuan 36
1. 

