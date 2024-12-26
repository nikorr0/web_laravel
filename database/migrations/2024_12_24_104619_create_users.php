<?php

use App\Models\Card;
use App\Models\User;
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
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        // $admin = User::find(1);

        // $card1 = new Card([
        //     'name' => 'Austria',
        //     'short_text' => 'Government: Federal semi-presidential republic. Total area: 83 879 km.',
        //     'long_text' => 'Austria, formally the Republic of Austria, is a landlocked country in Central Europe, lying in the Eastern Alps. It is a federation of nine states, one of which is the capital, Vienna, the most populous city and state.',
        //     'image_url' => 'images/Flag_of_Austria.png',
        //     'user_id' => 1,
        // ]);
        // $admin->cards()->save($card1);

        // $card2 = new Card([
        //     'name' => 'Belgium',
        //     'short_text' => 'Government: Federal parliamentary constitutional monarchy. Total area: 30 689 km.',
        //     'long_text' => ' ',
        //     'image_url' => 'images/Flag_of_Belgium.png',
        // ]);
        // $admin->cards()->save($card2);

        // $card3 = new Card([
        //     'name' => 'Denmark',
        //     'short_text' => 'Government: Unitary parliamentary constitutional monarchy. Total area: 43 094 km.',
        //     'long_text' => 'Denmark (Danish: Danmark, pronounced [ˈtænmɑk]) is a Nordic country in the south-central portion of Northern Europe with a population of nearly 6 million; 767 000 live in Copenhagen (1.9 million in the wider area). It is the metropolitan part, and most populous constituent part of, the Kingdom of Denmark, a constitutionally unitary state that includes the autonomous territories of the Faroe Islands and Greenland in the North Atlantic Ocean.',
        //     'image_url' => 'images/Flag_of_Denmark.png',
        // ]);
        // $admin->cards()->save($card3);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('users');
        // $admin = User::find(1);
        // $admin->cards()->delete();
    }
};
