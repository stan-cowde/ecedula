<?php

namespace App\Http\Controllers;

use App\Models\IdentityDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class IdentityImageController extends Controller
{
    public function show(Request $request, IdentityDetails $identity)
    {
        // Authorize: only the owner can view (adjust if admins should also view)
        $user = $request->user();
        abort_unless($user && (int) $identity->user_id === (int) $user->id, Response::HTTP_FORBIDDEN);

        $relativePath = $identity->valid_id; // expected like "private/filename.jpeg"
        if (!$relativePath || !Storage::disk('local')->exists($relativePath)) {
            abort(404);
        }

        $fullPath = Storage::disk('local')->path($relativePath);
        $mime = @mime_content_type($fullPath) ?: 'application/octet-stream';

        return response()->file($fullPath, [
            'Content-Type' => $mime,
            'Cache-Control' => 'private, max-age=0, no-cache',
        ]);
    }
}
