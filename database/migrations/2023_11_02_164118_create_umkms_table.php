<?php

use App\Models\PemilikUmkm;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha');
            $table->foreignIdFor(PemilikUmkm::class);
            $table->enum('jenis',['Perdagangan', 'Jasa', 'Industri Kreatif']);
            $table->string('alamat');
            $table->string('no_telpon');
            $table->string('media_promosi');
            $table->string('produk_unggulan');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
