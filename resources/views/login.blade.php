<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SiQurban - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Actor&family=Berkshire+Swash&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Actor&family=Berkshire+Swash&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="flex min-h-screen m-0">
  <!-- Bagian kiri untuk gambar -->
  <div class="flex-1 bg-cover bg-center h-screen" style="background-image: url('/storage/images/foto_login.jpg');"></div>
  
  <!-- Bagian kanan untuk form login -->
  <div class="flex-1 bg-[#875937] flex flex-col justify-center items-center text-white p-10 h-screen gap-2">
    <img src="/storage/images/logo_putih.png" alt="Siddiq Qurban Logo" class="w-32 mb-3">
    
    <h1 class="text-4xl font-bold " style="font-family: 'Berkshire Swash' ">Welcome Back!</h1>
    <p class="text-lg">Log in to your account!</p>
    @if(session('success'))
    <div>{{session('success')}}</div>
    @endif

    
    <form action="{{route('logedIn')}}" class="w-full max-w-xs flex flex-col" method="POST">
      @csrf
      <label for="username" class="font-bold">Username</label>
      <input type="text" id="username" name="username" placeholder="Username" class="p-2 mb-1 rounded-lg bg-orange-100 text-black border-none">
      
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
      <button type="submit" class="p-2 rounded bg-[#f5ebdc] text-black font-bold cursor-pointer hover:opacity-80 mb-3">Log in</button>
    </form>
    
    @error('password')
      <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
    @if ($errors->has('login'))
    <div class=" text-red-600 alert alert-danger">
        {{ $errors->first('login') }}
    </div>
    @endif

    <div class="flex items-center w-full max-w-sm mb-3">
      <hr class="flex-grow border-t border-white">
      <span class="mx-4 text-sm">Or sign up with</span>
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
    
    <p class="mt-4 text-sm">Don't have an account? <a href="/signup" class="underline">Sign Up</a></p>
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