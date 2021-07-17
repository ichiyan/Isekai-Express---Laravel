<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchandisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('merch_name');
            $table->decimal('price', 15, 2);
            $table->text('description');
            $table->string('image');
            $table->timestamps();
        });


        DB::table('merchandises')->insert(
            array(
                'merch_name' => 'Legendary Ace Statue',
                'price' => "19500.00",
                'description' => "Scale: 1/7. H: 58,4 / P: 39,1 / L: 42,4. Sculpture comes with a numbered plate and a certificate of authenticity",
                'image' => "legendaryAce.jpg"
            )
        );

        DB::table('merchandises')->insert(
            array(
                'merch_name' => 'Meruem VS Netero Statue',
                'price' => "25000.00",
                'description' => "Scale: 1/6. H 76.2 x W 69.9 x D 64.3cm; base diameter -  38cm. Includes certificate of authenticity, exclusive art print, and two portraits of Netero.",
                'image' => "meruem-vs-netero.jpg"
            )
        );

        DB::table('merchandises')->insert(
            array(
                'merch_name' => 'Light & Ryuk Diorama',
                'price' => "15000.00",
                'description' => "Scale: 1/6. Dimension: 48 x 29 x 28cm. Material: Resin. Includes certificate of authenticity and exclusive art print.",
                'image' => "light-and-ryuk.jpg"
            )
        );

        DB::table('merchandises')->insert(
            array(
                'merch_name' => 'Kenshin VS Shishio 25th Anniversary Edition',
                'price' => "24000.00",
                'description' => "Scale: 1/6. H 60 x W 60 x D 55cm.  Includes 2 torsos (Kenshin), 2 portraits (Shishio), removeable fire sleeve (Mugenjin).",
                'image' => "kenshin-vs-shishio.jpg"
            )
        );

        DB::table('merchandises')->insert(
            array(
                'merch_name' => 'Attack On Titan Sculpture',
                'price' => "25777.00",
                'description' => "Comparative to most 1/3 scale statues in size – Approx: H 61.1 cm x W 73.4 cm x D 69.5 cm.  Materials: Polystone, Resin, PU. Includes exclusive artprint.",
                'image' => "attack-on-titan.webp"
            )
        );

        DB::table('merchandises')->insert(
            array(
                'merch_name' => 'FMA Pocket Watch',
                'price' => "5599.00",
                'description' => "Fully functional classical pocket watch with hollow emboss lion pattern based on Fullmetal Alchemist Edward Elric's pocket watch",
                'image' => "fullmetal-pocketwatch.jpg"
            )
        );



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandises');
    }
}
