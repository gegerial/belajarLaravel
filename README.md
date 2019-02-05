Perkenalkan nama saya Gerial Giovanni Esertha.
Saya sekarang sedang menempuh pendidikan di Universitas Komputer Indonesia di Bandung dan menuju Semester 8 tingkat akhir, Fakultas Teknik dan Ilmu Komputer program studi Sistem Informasi. Ini adalah project pembuatan Laravel untuk tugas UAS mata kuliah E-commerce Lanjut yang diajarkan oleh kang Ferry Stephanus Suwita, S.Kom, M.T.

Saya akan menjelaskan tentang hasil pekerjaan project Laravel yang telah saya buat.

pada Laravel Framewok ini cukup mudah digunakan dan di pelajari sekali asalkan kita tekun dan penasaran bagaimana caranya ketemu sintaks yang error hehe. Itu adalah tantangan untuk seorang programmer.

pertama-tama saya menggunakan tampilan LOGIN bawaan dari AdminLTE-2.3.11 dan memodifikasi sistem codenya.

mengcopy isi dari login.html ke login.blade.php yang terdapat pada resources/views/login.blade.php lalu memodifikasi tambah feedback,form action, field name dan menambahkan token(remember me).

mengedit pada router/web.php lalu membuat migration table untuk login caranya yaitu menggunakan command prompt dan mengetikan > php artisan make:migration create_table_user. setelah di ketik lalu kita membuka folder table user tersebut dan memodifikasinya agar data yang kita input dapat masuk ke databse yang sudah kita buat di PHP dengan nama db_laravel_siswa. supaya masuk ke database, kita perlu migrate folder table user tersebut dengan cara menggunakan command prompt lagi dan ketik > php artisan migrate. setelah kita migrate maka data yang kita input di table user untuk username dan passwordnya masuk ke databse secara otomatis.

setelah itu membuka folder app dan membuka file user.php dan memodifikasinya.

buka kembali command prompt dan ketik php artisan make:seed LoginSeeder untuk membuat user admin dan password melalui seeder dan mengedit pada database/seed/DatabaseSeeder.php setelah itu ketik kembali di command prompt php artisan db:seed maka user admin dan password secara otomatis akan masuk ke database yang telah dibuat. lalu modifikasi kembali file di app/http/controllers/auth/LoginController.php. setelah selesai buka project laravelnya dan akan muncul halaman login masukkan username admin dan password admin maka langsung ke halaman utama (home). Jika username/pass salah makan akan muncul peringatan bahwa username/password nya salah. kemudian  membuat tombol logout dengan cara buka file resources/views/template/header.blade.php dan mengedit di line 173 untuk membuat tombol logoutnya. setelah dibuat maka kembali ke project laravelnya dan klik tombol logout di bagian profil untuk form login ini juga menyediakan fitur remember me supaya tanpa harus login ketika membuka project laravelnya.

setelah login selesai maka untuk halaman utama saya membuat tampilan Data Kelas dan Data Siswa dengan cara mengcopy file dari adminLTE nya dan memodifikasi bagian header.blade.php dan footer.blade.php setelah selesai di modifikasi file tersebut lalu membuat folder kelas pada folder resource/views pada project laravel. didalam folder kelas buat file index.blade.php dan copy dari folder adminLTE blank.html ke index.blade.php. buka command promt lalu ketik php artisan make:controller KelasController. jika berhasil maka folder KelasController telah dibuat. buka folder tersebut lalu memodifikasi filenya. lalu buka routes/web.php dan mengubah routes yang sudah ada. membuat tabel t_kelas pada database yang sudah dibuat dengan cara buka command prompt dan ketik php artisan make:migration create_table_kelas. lalu kita buka foldernya di database/migrations dan memasukkan sintaks untuk table kelas tersebut pada fungsi UP dan Down, setelah selasi lalu migrate folder tersebut dengan cara command promt ketik php artisan migrate. maka secara otomatis t_kelas masuk ke database. untuk membuat seeder, buka kembali command promptnya dan ketik php artisan make:seeder KelasSeeder lalu buka folder nya di database/seeds dan modifikasi untuk membuat perintah memasukkan data kedalam table t_kelas. supaya sintaks nya dibuat lalu kembali ke command prompt lalu ketik php artisan db:seed maka secara otomatis inputan yang dibuat pada KelasSeeder masuk ke database. setelah itu membuat tampilan dalam bentuk tabel di project laravelnya ketik php artisan make:model Kelas pada command prompt. buka file app/Kelas.php dan edit file nya. setelah diedit, buka file app/http/controllers/KelasController.php dan memodifikasi sintaksnya. setelah selesai edit pada kelas controller lalu buka file resources/views/kelas/index.blade.php dan memodifikasi file nya agar tampilannya sesuai dengan data pada database dan sesuai dengan no, nama kelas, jurusan, serta actionya. setelah selesai membuat tampilan kelas, lanjut ke pembuatan form tambah data dengan cara masuk ke resource/views/kelas/form.blade.php dan copy sintaksnya ke index.php untuk edit data. modifikasi lagi form.blade.php sesuai dengan project. lalu buka kelas controller.php dan tambahkan sintaks public function create () dan public function store(). Buka file routes/web.php lalu menambahkan sintaks

Route::get('kelas/add', 'KelasController@create');
Route::post('kelas/add', KelasController@store');

setelah selesai buka kembali project laravelnya dan klik tombol tambah data dan kemudian simpan data, data yang telah di input maka akan tampil di tabel kelas.

untuk menampilkan feedback sukses atau gagal data yang kita input yaitu dengan cara membuat file baru di resource/temlates/feedback.blade.php dan membuat funsi session untuk mengambil ssession dengan nama yang ada pada parameter. session('success') artinya mengambil session dengan nama success begitu sebaliknya. serta menambahkan include pada file resources/kelas/index.blade.php dan resources/kelas/index.blade.php. jika data yang kita input belum terisi dan kita klik tombol simpan maka akan muncul alert peringatan bahwa ada fill yang kosong dan diharuskan diisi.

untuk membuat action update data yaitu dengan cara buka file KelasController dan menambahkan fungsi edit dan update sesuai dengan project laravel yang telah saya buat. dan buka file routes/web.php untuk menambahkan sintaks

Routes::get('kelas/{id}/edit', 'KelasController@edit')
Routes::patch('kelas/{id}/edit', 'KelasController@update')

buka kembali project laravelnya dan klik tombol edit pada action maka akan masuk ke form edit data kelas. lalu edit dan simpan maka data berhasil diubah.

setelah membuat fungsi action edit maka langkah selanjutnya yaitu membuat action delete dengan menambahkan fungsi destroy pada file app/http/Controllers/KelasController.php lalu buka web.php dan tambahkan sintaks
Route::delete('kelas/{id}/delete', 'KelasController@destroy');

$result->delete() digunakan untuk menghapus data.

setelah selesai membuat table kelas maka langkah selanjutnya membuat table siswa.
untuk membuat table siswa caranya sama dengan membuat table kelas, yang berbeda hanyalah di form tambah data siswa dengan menambahkan radio button untuk jenis kelamin berikut sintaksnya :

<div class="form-group">
<label class="control-label col-sm-2">Jenis Kelamin</label>
 <div class="col-sm-10">
<div class="checkbox">
<label><input type="radio" name="jenis_kelamin" value="L" {{ (@$result->
jenis_kelamin == 'L' ? 'checked' : '') }} /> L<label>
<label><input type="radio" name="jenis_kelamin" value="P" {{ (@$result->
jenis_kelamin == 'P' ? 'checked' : '') }} /> P<label>
</div>
</div>

serta fill kelas yang diambil dari data kelas dengan cara combobox kelas sintaksnya yaitu:

<div class="form-group">
<label class="control-label col-sm-2">Kelas</label>
<div class="col-sm-10">
<select name="id_kelas" class="form-control">
@foreach (\App\Kelas::all() as $kelas)
<option value="{{ $kelas->id_kelas }}" {{ @$result->id_kelas ==
$kelas->id_kelas ? 'selected' : '' }}>{{ $kelas->nama_kelas }}</option>
@endforeach
</select>
</div>
</div>

setelah selesai membuat table siswa maka lanjut untuk membuat file upload file, cara pertama yaitu membuka file config/filesystems.php mengganti default storage nya menjadi 'upload'. pada blok disk tambahkan nama 'upload' sintaksnya yaitu :

'upload' => [
			
'driver' => 'local',
			
'root' => public_path('uploads'),
			
'visibility' => 'public',
		
],

lalu membuat folder baru dengan nama uploads di folder public. kegunaan folder ini yaitu tempat tersimpannya foto yang diupload pada table siswa.

menambahkan enctype="multipart/form-data" pada file resources/views/siswa/form.blade.php serta menambahkan form upload dengan nama foto.

untuk membuat alter table t_siswa untuk menambahkan field foto caranya yaitu kita menggunakan migration. ketik php artisan make:migration add_foto_table_siswa pada command prompt. setelah di migration buka file nya dan edit. setelah di edit maka migrate foldernya dengancara ketik php artisan migrate pada command prompt maka secara otomatis form foto masuk ke database. buka siswa.php dan tambahkan foto pada variable $fillable. langkah selanjutnya yaitu modifikasi SiswaController dan tambahkan rules validasi untuk tipe file yang boleh di upload dan ukuran maksimal file yang akan di upload. kemudian tambahkan sintak berikut pada SiswaController pada bagian store dan update :

if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
				
$filename = $input['nis'] . "." . $request->file('foto')->getClientOriginalExtension();
	$request->file('foto')->storeAs('', $filename);
				
$input['foto'] = $filename;
		
}

kembali ke tampilan index siswa dan tambahkan foto pada tabel dan sintak berikut pada line 43-45 :

<td>
<img src="{{ asset('uploads/'.$row->foto) }}" width="80px" class="img" />
</td> 

lalu buka project laravel pada tabel siswa dan lakukan edit data kembali, masukkan file foto nya pada form yang tersedia. file yang telah di diupload akan tersimpan didalam folder public/uploads.

Demikian penjelasan tentang project tugas UAS laravel.
saya ucapkan banyak terimakasih.



