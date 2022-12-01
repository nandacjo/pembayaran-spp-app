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