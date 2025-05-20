@extends('layouts.profile')

@section('content')
<main class="flex-1 p-10">
    <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="flex flex-col grid grid-cols-1 md:grid-cols-2 gap-2 w-full mx-auto">
        @csrf
        <div class="max-w-xl space-y-4">
            <div>  
                <label class="block font-semibold">Full Name</label>
                <input type="text" value="{{$user->full_name}}" name="full_name" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-semibold">Email</label>
                <div class="relative">
                    <input type="email" value="{{$user->email}}" name="email" class="w-full border p-2 rounded">
                </div>
            </div>
            <div>
                <label class="block font-semibold">Address</label>
                <input type="text" value="{{$user->address}}" name="address" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-semibold">City</label>
                <select class="w-full border p-2 rounded">
                    <option selected>Surabaya</option>
                </select>
            </div>
            <div>
                <label class="block font-semibold">Contact Number</label>
                <input type="text" value="{{$user->phone}}" name="phone" class="w-full border p-2 rounded">
            </div>
            <div class="flex space-x-4">
                <button type="button" class="px-4 py-2 border rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-[#8B5D33] text-white rounded">Save</button>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center relative">
            <!-- Frame Foto -->
            <div class="relative w-80 h-80">
                <img id="profileImage"
                    src="{{ $user->profile_photo ? asset('storage/profile_photos/' . $user->profile_photo) : asset('default-profile.png') }}" 
                    alt="Foto Profil"
                    class="w-80 h-80 object-cover rounded-full border-4 border-[#8B5D33] shadow">

                <!-- Icon Kamera -->
                <label for="uploadProfilePhoto" class="absolute bottom-2 right-2 bg-white rounded-full p-2 shadow cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8B5D33]" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 010 2.828l-9.172 9.172a4 4 0 01-1.414.94l-4.242 1.414a1 1 0 01-1.263-1.263l1.414-4.242a4 4 0 01.94-1.414l9.172-9.172a2 2 0 012.828 0z" />
                    </svg>
                </label>
                <input id="uploadProfilePhoto" name="profile_photo" type="file" accept="image/*" class="hidden" onchange="previewProfileImage(event)">
                <!-- Input File Tersembunyi -->
            </div>
            <p class="text-sm text-gray-500 mt-2 text-center">Klik ikon untuk mengganti foto</p>
        </div>
    </form>
  
</main>
@endsection

<script>
function previewProfileImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('profileImage');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
