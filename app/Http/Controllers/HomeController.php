<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\HasilResponse;
use Illuminate\Http\Request;
use App\RandomUser;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $randomUser;

    public function __construct(RandomUser $randomUser)
    {
        $this->randomUser = $randomUser;
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengguna | Home User',
            'currentNav' => 'user',
            'currentNavChild' => 'user',
        ];

        return view('user.index', $data);
    }

    public function getDataUser()
    {
        $users = HasilResponse::select('nama', 'nama_jalan as jalan', 'email', 'jk.jenis_kelamin', 'profesi.nama_profesi as profesi')
            ->join('jenis_kelamin as jk', 'hasil_response.jenis_kelamin', '=', 'jk.id')
            ->join('profesi', 'hasil_response.profesi', '=', 'profesi.id')
            ->get();

        return ResponseFormatter::success([
            'users' => $users,
        ], 'Data berhasil diambil');
    }

    public function getRandomUser(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->randomUser->getRandomUser();

            // mengambil data yang dibutuhkan
            $gender = $user['results'][0]['gender'] == 'male' ? '1' : '2';
            $name = $user['results'][0]['name']['first'] . ' ' . $user['results'][0]['name']['last'];
            $street = $user['results'][0]['location']['street']['name'];
            $email = $user['results'][0]['email'];

            // menghitung jumlah angka dari md5
            $md5 = str_split($user['results'][0]['login']['md5']);
            $lessNumber = 0;
            $moreNumber = 0;
            foreach ($md5 as $value) {
                // mengecek apakah angka
                if (is_numeric($value)) {
                    // mengecek apakah angka kurang dari 7
                    if ($value < 7) {
                        $lessNumber++;
                    } else if ($value > 7) {
                        $moreNumber++;
                    }
                }
            }

            // menentukan profesi
            $randomProfession = ['A', 'B', 'C', 'D', 'E'];
            $profession = $randomProfession[array_rand($randomProfession)];

            HasilResponse::create([
                'jenis_kelamin' => $gender,
                'nama' => $name,
                'nama_jalan' => $street,
                'email' => $email,
                'angka_kurang' => $lessNumber,
                'angka_lebih' => $moreNumber,
                'profesi' => $profession,
                'plain_json' => json_encode($user),
            ]);

            DB::commit();
            return ResponseFormatter::success([
                'user' => $user,
            ], 'Berhasil menambah data user');
        } catch (\Exception $e) {
            DB::rollback();
            return ResponseFormatter::error([
                'message' => $e->getMessage(),
            ], 'Gagal menambah data user', 500);
        }
    }
}
