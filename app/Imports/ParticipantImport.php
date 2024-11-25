<?php

namespace App\Imports;

use App\Models\Olimpiade;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Str;

class ParticipantImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    private $olimpiade;
    private $password;

    public function __construct($olimpiade)
    {
        $this->olimpiade = $olimpiade;
        $this->password = Hash::make('secret1234');
    }

    public function model(array $row)
    {
        return new User([
            'name'          => $row['nama_peserta'],
            'email'         => $row['email_address'],
            'role'          => 'user',
            'login_id'      => Str::random(10) . $this->olimpiade->id,
            'password'      => $this->password,
            'olimpiade_id'  => $this->olimpiade->id,
            'asal_sekolah'  => $row['asal_sekolah'],
            'kelas'         => $row['kelas'],
            'nomor_hp'      => "-",
        ]);
    }

    public function rules(): array
    {
        return [
            'nama_peserta' => 'required',
            'email_address' => 'required',
            'asal_sekolah' => 'required',
            'kelas' => 'required',
        ];
    }
}
