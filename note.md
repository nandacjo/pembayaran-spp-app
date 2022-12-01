pertemuan 23:
1. ambil semua data siswa
Siswa::whereNotIn('wali_id', [$id])->pluck('nama', 'id');
2. whereNotIn jangan tampilkan jika siswa sudah ada
3. validation exist:user, id = pastika data wali_id ada di tabe user
4. membuat flash message secara global
5. 