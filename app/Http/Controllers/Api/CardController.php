<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;                   
use Illuminate\Support\Facades\Http;          
use Illuminate\Support\Facades\Storage;       
use Illuminate\Http\File;


class CardController extends Controller
{
    public function index()
    {
        $cards = Card::with([
            'user',                
            'comments.user'        
        ])->latest()->paginate(20);

        return CardResource::collection($cards); 
    }

    public function store(Request $request)
    {
        $data = $request->validate([
                'name'        => 'required|string|max:255',
                'short_text'  => 'required|string|max:1000',
                'long_text'   => 'required|string|max:2000',
                'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|required_without:image_url',
                'image_url'   => 'nullable|url|required_without:image',
            ]);


        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data['image_url'] = $path; 

        } elseif (! empty($data['image_url'])) {
            $remoteUrl = $data['image_url'];
            try {
                $response = Http::withoutVerifying()->get($remoteUrl);
                $response->throw(); 

                $ext = pathinfo(parse_url($remoteUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
                $temp = tempnam(sys_get_temp_dir(), 'img_') . '.' . $ext;
                file_put_contents($temp, $response->body());

                $path = Storage::disk('public')
                            ->putFile('images', new File($temp));

                @unlink($temp);

                $data['image_url'] = $path;

            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Failed to download remote image',
                    'error'   => $e->getMessage(),
                ], 422);
            }
        }

        unset($data['image']);

        $card = $request->user()->cards()->create($data);

        return (new CardResource($card->load('user')))
            ->additional(['message' => 'Card created'])
            ->response()
            ->setStatusCode(201);
    }

    public function show(Card $card)
    {
        $card->load(['user', 'comments.user']);
        return new CardResource($card);
    }

    public function update(Request $request, Card $card)
    {
        // Gate::authorize('update', $card);
        $me = $request->user();

        if ($me->id !== $card->user_id && $me->is_admin === 0) {
            return response()->json([
                'message' => 'You don’t have permission to edit this card.'
            ], 403);
        }

        $data = $request->validate([
            'name'        => 'sometimes|required|string|max:255',
            'short_text'  => 'sometimes|required|string|max:1000',
            'long_text'   => 'sometimes|nullable|string|max:2000',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|required_without:image_url',
            'image_url'   => 'nullable|url|required_without:image',
        ]);

        if ($request->hasFile('image')) {
            if ($card->image_url && ! str_starts_with($card->image_url, 'http')) {
                Storage::disk('public')->delete($card->image_url);
            }
            $path = $request->file('image')->store('images', 'public');
            $data['image_url'] = $path;

        } elseif (! empty($data['image_url'])) {
            $resp = Http::withoutVerifying()->get($data['image_url']);
            $resp->throw();
            $ext = pathinfo(parse_url($data['image_url'], PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
            $temp = tempnam(sys_get_temp_dir(), 'img_') . ".$ext";
            file_put_contents($temp, $resp->body());
            $path = Storage::disk('public')->putFile('images', new File($temp));
            @unlink($temp);

            if ($card->image_url && ! str_starts_with($card->image_url, 'http')) {
                Storage::disk('public')->delete($card->image_url);
            }
            $data['image_url'] = $path;
        }
        unset($data['image']);

        $card->update($data);

        return (new CardResource($card->load(['user','comments.user'])))
            ->additional(['message' => 'Card updated'])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Card $card)
    {
        $me = $request->user();
        
        // $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        // $out->writeln($card->user_id);
        // $out->writeln($me->id);
        // $out->writeln($me->is_admin ? 'true' : 'false');

        if ($me->id !== $card->user_id) {
            return response()->json([
                'message' => 'You don’t have permission to delete this card.'
            ], 403);
        }   

        $card->delete();

        return response()->json(['message' => 'Card deleted'], 204);
    }
}
