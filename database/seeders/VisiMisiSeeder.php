<?php

namespace Database\Seeders;

use App\Models\VisiMisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisi::create([
            "visi" => "<p>Menjadi lembaga serfikasi profesi terkemuka untuk menghasilkan tenaga kompeten bidang Administrasi Publik di Indonesia.</p>",
            "misi" => "<ul><li>Mengembangkan dan mengevaluasi skema kompetensi sesuai dengan kebutuhan profesi bidang administrasi publik.</li><li>Menyelenggarakan serfikasi kompetensi bidang administrasi publik secara profesional.</li><li>Menjamin mutu proses serfikasi sesuai dengan standar yang berlaku.</li><li>Menyelenggarakan tata kelola kelembagaan LSP yang akuntabel.</li><li>Meningkatkan sumber daya yang kompeten dalam pengelolaan LSP</li></ul>",
            "target" => "<ol><li>Terselenggaranya uji kompetensi bagi tenaga kompeten bidang administrasi publik secara berkelanjutan</li><li>Tercapainya kompetensi sumber daya manusia bidang administrasi publik sesuai standar mutu yang telah ditetapkan</li><li>Adanya pengembangan skema uji kompetensi yang sesuai kebutuhan profesi bidang administrasi publik</li></ol>"
        ]);
    }
}
