<!DOCTYPE html>
<html id=signup lang="en">
<head>
  <meta charset="UTF-8">
  <title>SiQurban - Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Actor&family=Berkshire+Swash&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Actor&family=Berkshire+Swash&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="flex min-h-screen m-0">
  <!-- Bagian kiri (gambar) -->
  <div class="flex-1 bg-cover bg-center h-screen" style="background-image: url('/images/foto-sign-up.jpg');"></div>

  <!-- Bagian kanan (form sign up) -->
  <div class="flex-1 bg-[#875937] flex flex-col justify-center items-center text-white p-10 h-screen gap-2">
    <div class="w-48 h-48 mb-0 bg-contain bg-center bg-no-repeat" style="background-image: url('/images/logo_putih.png');"></div>
    <h1 class="text-3xl font-serif" style="font-family: 'Berkshire Swash'">Welcome to SiQurban</h1>
    <p class="text-lg">create an account!</p>
    

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
        <strong>Ups!</strong> Ada kesalahan:
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4">
        {{ session('error') }}
    </div>
@endif

    <form action="{{route('signedUp')}}" class="w-full max-w-xs flex flex-col" method="POST">
      @csrf
      <label for="username" class="font-bold">Username</label>
      <input type="text" id="username" name="username" placeholder="Username" value="{{ old('nama_field') }}" class="p-2 mb-1 rounded-lg bg-orange-100 text-black border-none">

      <label for="email" class="font-bold">Email / No Handphone</label>
      <input type="text" id="email" name="email"  placeholder="Email / No Handphone"  value="{{ old('email') }}" class="p-2 mb-1 rounded-lg bg-orange-100 text-black border-none">
        
      <div class="relative flex flex-col">
        <label for="password" class="font-bold">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" class="p-2 mb-1 rounded-lg bg-orange-100 text-black border-none">
        <span class="absolute right-3 top-9 cursor-pointer" onclick="togglePasswordVisibility('password', this)">
          <svg xmlns="http://www.w3.org/2000/svg" class="eye-icon h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
        </span>
      </div>
      
      <div class="relative flex flex-col">
        <label for="password_confirmation" class="font-bold">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" class="p-2 mb-1 rounded-lg bg-orange-100 text-black">
        <span class="absolute right-3 top-9 cursor-pointer" onclick="togglePasswordVisibility('password_confirmation', this)">
          <svg xmlns="http://www.w3.org/2000/svg" class="eye-icon h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
        </span>
      </div>
      
      <button type="submit" class="p-2 rounded bg-[#D5C0B7] text-black font-bold cursor-pointer hover:opacity-80 mb-2">Sign Up</button>
    </form>

    @error('password')
      <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
    @error('username')
      <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
    @error('email')
      <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror


    <div class="flex items-center w-full max-w-sm mb-3">
      <hr class="flex-grow border-t border-white">
      <span class="mx-4 text-sm">Or sign in with</span>
      <hr class="flex-grow border-t border-white">
    </div>

    <div class="w-full max-w-sm flex gap-4">
      <button class="flex-1 bg-white text-gray-700 py-2 rounded-md flex items-center justify-center gap-2 font-bold">
        <img src="" class="w-5"> Google
      </button>
      <button class="flex-1 bg-blue-600 text-white py-2 rounded-md flex items-center justify-center gap-2 font-bold">
        <img src="" class="w-2"> Facebook
      </button>
    </div>
    
    <div class="text-center mt-4">
      <p>Have an account? <a href="/login" class="text-white underline">Sign in</a></p>
    </div>
  </div>
</body>
</html>

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