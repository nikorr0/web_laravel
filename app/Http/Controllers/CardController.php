<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CardController // extends Controller
{

    public function index()
    {
        // $cards = Card::all();
        $cards = Card::with('user')->get();
        // return view('main-page', compact('cards'));
        return view('welcome', compact('cards'));
        
    }

    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add a card.');
        }
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
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to edit a card.');
        }
        Gate::authorize('update-card', $card);
        return view('edit', compact('card'));
    }

    public function update(Request $request, Card $card)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to edit a card.');
        }
        Gate::authorize('update-card', $card);

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
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to delete a card.');
        }
        Gate::authorize('delete-card', $card);
        
        $card->delete();
        return redirect()->route('cards.index')->with('success', 'The card was successfully deleted.');
    }

    public function restore($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to restore a card.');
        }
        $card = Card::withTrashed()->findOrFail($id);

        Gate::authorize('admin-card');
        $card->restore();
        return redirect()->route('cards.indexTrash')->with('success', 'The card has been restored.');
    }

    public function forceDelete($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to delete a card.');
        }
        $card = Card::withTrashed()->findOrFail($id);
        Gate::authorize('admin-card');

        if ($card->image_url && file_exists(public_path($card->image_url))) {
            unlink(public_path($card->image_url));
        }
        $card->forceDelete();

        return redirect()->route('cards.indexTrash')->with('success', 'The card has been permanently deleted.');
    }

    public function indexTrash()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to delete a card.');
        }
        $cards = Card::onlyTrashed()->get();
        Gate::authorize('admin-card');

        return view('trash', compact('cards'));
    }

    public function userCards(User $user) {
        $cards = $user->cards()->get();
        return view('usercards', compact('cards'));
    }
}
