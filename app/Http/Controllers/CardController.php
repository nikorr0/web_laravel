<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{

    // public function cards()
    // {
    //     $cards = \App\Card::all();
    //     dd($cards);
    // }

    public function index()
    {
        $cards = Card::all();
        # return view('card-list', compact('cards'));
        return view('main-page', compact('cards'));
        
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_text' => 'required|string|max:1000',
            'long_text' => 'required|string|max:2000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        
        if ($request->hasFile('image')) {
            // $imagePath = $request->file('image')->storeAs('images', request()->file('image')->getClientOriginalName(), 'public');
            // $imagePath = $request->file('image')->store('images', 'public');
            // $imagePath = $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
            // $validated['image_url'] = $imagePath;
            $imagePath = $request->file('image')->store('images', 'public'); 
            $validated['image_url'] = $imagePath;
        }
        Card::create($validated);

        return redirect()->route('cards.index')->with('success', 'The card has been added successfully.');
    }

    public function show(Card $card): Card
    {
        return $card;
    }

    public function edit(Card $card)
    {
        return view('edit', compact('card'));
    }

    public function update(Request $request, Card $card)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'short_text' => 'required|string|max:1000',
            'long_text' => 'required|string|max:2000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image_url'] = $imagePath;
        }
        $card->update($validated);
        return redirect()->route('cards.index')->with('success', 'The card has been successfully updated.');
    }

    public function destroy(Card $card)
    {
        $card->delete();
        return redirect()->route('cards.index')->with('success', 'The card was successfully deleted.');
    }
}
