<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // List semua pesan
    public function index()
{
    $messages = Message::latest()->paginate(10); // pagination 10 data
    return view('admin.messages.index', compact('messages'));
}


    // Lihat detail pesan + tandai sebagai dibaca
public function show($id)
{
    $message = Message::findOrFail($id);

    // Kalau pesan belum dibaca, tandai sebagai sudah dibaca
    if (is_null($message->read_at)) {
        $message->update([
            'read_at' => now()
        ]);
    }

    return view('admin.messages.show', compact('message'));
}


    // Hapus pesan
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus!');
    }
}
