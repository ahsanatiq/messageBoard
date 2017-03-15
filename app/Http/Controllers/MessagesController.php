<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'auth.admin.role', 'first.login'], ['except'=>'showPublic']);
    }

    public function add()
    {
        return view('messages.add');
    }

    public function create(Request $request)
    {
        $rules = Message::$rules;
        if ($request->file('image'))
            $rules = array_add($rules, 'image', 'file|image');
        if($request->input('type')=='private')
            $rules = array_add($rules, 'private_email', 'required_if:type,private|email');

        $this->validate($request, $rules);

        $user = auth()->user();
        $imageName = '';
        if ($request->image) {
            $imageName = time() . '_' . $user->id . '.' . $request->image->extension();
            $newImage = Image::make($request->image)->fit(300);
            \Storage::disk('public')->put($imageName, $newImage->encode());
        }
        Message::create([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'image' => $imageName,
            'type' => $request->input('type'),
            'private_email' => $request->input('private_email'),
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()
            ->with(['status' => 'success'])
            ->with(['message' => 'Message successfully created']);
    }

    public function showPublic() {
        $messages = Message::whereType('public')->get();
        return view('messages.show', compact('messages'));
    }

    public function showPrivate() {
        $messages = Message::whereType('private')
                            ->where('private_email',auth()->user()->email)
                            ->get();
        return view('messages.show', compact('messages'));
    }
}