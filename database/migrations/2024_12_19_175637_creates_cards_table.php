<?php

use App\Models\Card;
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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('short_text');
            $table->text('long_text');
            $table->string('image_url');
            $table->timestamps();
            $table->softDeletes();
        });

        Card::create([
            'name' => 'Austria',
            'short_text' => 'Government: Federal semi-presidential republic. Total area: 83 879 km.',
            'long_text' => 'Austria, formally the Republic of Austria, is a landlocked country in Central Europe, lying in the Eastern Alps. It is a federation of nine states, one of which is the capital, Vienna, the most populous city and state.',
            'image_url' => 'images/Flag_of_Austria.png',
        ]);
        Card::create([
            'name' => 'Belgium',
            'short_text' => 'Government: Federal parliamentary constitutional monarchy. Total area: 30 689 km.',
            'long_text' => 'Belgium, officially the Kingdom of Belgium, is a country in Northwestern Europe. The country is bordered by the Netherlands to the north, Germany to the east, Luxembourg to the southeast, France to the south, and the North Sea to the west.',
            'image_url' => 'images/Flag_of_Belgium.png',
        ]);
        Card::create([
            'name' => 'Denmark',
            'short_text' => 'Government: Unitary parliamentary constitutional monarchy. Total area: 43 094 km.',
            'long_text' => 'Denmark (Danish: Danmark, pronounced [ˈtænmɑk]) is a Nordic country in the south-central portion of Northern Europe with a population of nearly 6 million; 767 000 live in Copenhagen (1.9 million in the wider area). It is the metropolitan part, and most populous constituent part of, the Kingdom of Denmark, a constitutionally unitary state that includes the autonomous territories of the Faroe Islands and Greenland in the North Atlantic Ocean.',
            'image_url' => 'images/Flag_of_Denmark.png',
        ]);
        Card::create([
            'name' => 'France',
            'short_text' => 'Government: Unitary semi-presidential republic. Total area: 643 801 km.',
            'long_text' => 'France, officially the French Republic, is a country located primarily in Western Europe. Its overseas regions and territories include French Guiana in South America, Saint Pierre and Miquelon in the North Atlantic, the French West Indies, and many islands in Oceania and the Indian Ocean, giving it one of the largest discontiguous exclusive economic zones in the world.',
            'image_url' => 'images/Flag_of_France.png',
        ]);
        Card::create([
            'name' => 'Netherlands',
            'short_text' => 'Government: Unitary parliamentary constitutional monarchy. Total area: 41 865 km.',
            'long_text' => 'The Netherlands, informally Holland, is a country in Northwestern Europe, with overseas territories in the Caribbean. It is the largest of the four constituent countries of the Kingdom of the Netherlands. The Netherlands consists of twelve provinces.',
            'image_url' => 'images/Flag_of_the_Netherlands.png',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
