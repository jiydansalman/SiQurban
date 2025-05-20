<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit-profile', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request){
        $user = Auth::user();

        $request->validate([
            'full_name' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'profile_photo' => 'nullable|image|max:2048'
        ]);

        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo && Storage::disk('public')->exists('profile_photos/' . $user->profile_photo)) {
                Storage::disk('public')->delete('profile_photos/' . $user->profile_photo);
            }

            // Simpan foto baru
            $file = $request->file('profile_photo');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile_photos', $filename, 'public');

            // Simpan ke DB
                    $user->profile_photo = $filename;
        }
    
        $user->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diganti');
    }
}
