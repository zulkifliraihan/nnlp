<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class OrderOnlineImport implements ToCollection, WithChunkReading, WithStartRow
{
  
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            if($row[3] == "PAID"){
                User::where('email', $row[1])->update(['status_pembayaran' => 1]);
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
