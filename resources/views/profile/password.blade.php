@extends('layouts.profile')

@section('content')
<main class="flex-1 p-10">
  <h1 class="text-2xl font-bold mb-6">Security Settings</h1>

  <form action="{{ route('profile.update_password') }}" method="POST" class="space-y-6 max-w-xl relative">
    @csrf
    @method('PUT')

    <!-- Current Password -->
    <div class="relative">
      <label class="block font-semibold">Current Password</label>
      <input type="password" name="current_password" id="current_password" class="w-full border p-2 rounded pr-10" required>
      <span class="absolute right-3 top-9 cursor-pointer" onclick="togglePasswordVisibility('current_password', this)">
        <svg xmlns="http://www.w3.org/2000/svg" class="eye-icon h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
      </span>
    </div>

    <!-- New Password -->
    <div class="relative">
      <label class="block font-semibold">New Password</label>
      <input type="password" name="new_password" id="new_password" class="w-full border p-2 rounded pr-10" required>
      <span class="absolute right-3 top-9 cursor-pointer" onclick="togglePasswordVisibility('new_password', this)">
        <svg xmlns="http://www.w3.org/2000/svg" class="eye-icon h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
      </span>
    </div>

    <!-- Confirm New Password -->
    <div class="relative">
      <label class="block font-semibold">Confirm New Password</label>
      <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="w-full border p-2 rounded pr-10" required>
      <span class="absolute right-3 top-9 cursor-pointer" onclick="togglePasswordVisibility('new_password_confirmation', this)">
        <svg xmlns="http://www.w3.org/2000/svg" class="eye-icon h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
      </span>
    </div>

    <button class="px-6 py-2 bg-[#8B5D33] text-white rounded">Update Password</button>
  </form>

  @if(session('success'))
    <div class="text-green-600 mt-4">{{ session('success') }}</div>
  @endif

  @if($errors->any())
    <ul class="text-red-600 mt-4">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif
</main>

<!-- Toggle Eye Visibility Script -->
<script>
function togglePasswordVisibility(inputId, iconSpan) {
  const input = document.getElementById(inputId);
  const svg = iconSpan.querySelector('svg');

  if (input.type === 'password') {
    input.type = 'text';
    svg.innerHTML = `
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.964 9.964 0 012.258-3.419m2.567-2.003A9.956 9.956 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-1.147 2.592M15 12a3 3 0 11-6 0 3 3 0 016 0zM3 3l18 18" />
    `;
  } else {
    input.type = 'password';
    svg.innerHTML = `
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
    `;
  }
}
</script>
@endsection
