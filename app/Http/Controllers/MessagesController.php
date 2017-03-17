<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\Facades\Image;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'first.login'], ['except' => ['showPublic','downloadFile']]);
        $this->middleware(['auth.admin.role'], ['except' => ['showPublic', 'showPrivate','downloadFile']]);
    }

    public function add()
    {
        return view('messages.add');
    }

    public function create(Request $request)
    {
        $rules = Message::$rules;
        if ($request->file('image'))
            $rules['image'] = 'file|image';
        if ($request->file('docs'))
            $rules['docs.*'] = 'file|mimes:doc,docx,pdf';
        if ($request->input('type') == 'private')
            $rules['private_group'] = 'required';

        $this->validate($request, $rules);

        $user = auth()->user();
        $imageName = '';
        if ($request->image) {
            $imageName = time() . '_' . $user->id . '.' . $request->image->extension();
            $newImage = Image::make($request->image)->fit(600);
            \Storage::disk('public')->put($imageName, $newImage->encode());
        }
        $docsName = [];
        if ($request->docs && count($request->docs) > 0) {
            foreach ($request->docs as $doc) {
                $docFile = time() . '_' . $user->id . '_' . $doc->hashName();
                \Storage::disk('public')->putFileAs('', $doc, $docFile);
                $docsName[] = [
                    'name' => $doc->getClientOriginalName(),
                    'file' => $docFile
                ];
            }
        }
        $message = Message::create([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'image' => $imageName,
            'docs' => json_encode($docsName),
            'type' => $request->input('type'),
            'private_group' => $request->input('private_group'),
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()
            ->with(['status' => 'success'])
            ->with(['message' => 'Message successfully created']);
    }

    public function showPublic()
    {
        $messages = Message::whereType('public')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('messages.show', compact('messages'));
    }

    public function showPrivate()
    {
        $messages = Message::whereType('private')
            ->where('private_group', auth()->user()->object_type)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('messages.show', compact('messages'));
    }

    public function downloadFile($id, $file)
    {
        $message = Message::findOrFail($id);
        $found = '';
        if ($message->docs) {
            $docs = json_decode($message->docs, true);
            foreach ($docs as $doc) {
                if ($file == $doc['file']) {
                    if(
                        $message->type=='public' ||
                        (
                            $message->type=='private' &&
                            auth()->user() &&
                            auth()->user()->object_type==$message->private_group
                        )
                    )
                    $found = $doc;
                }
            }
        }

        if ($found) {
            return response()->download(public_path('storage/'.$found['file']),$found['name']);
        } else {
            abort(404);
        }
    }
}
