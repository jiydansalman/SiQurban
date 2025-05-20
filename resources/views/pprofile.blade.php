<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - SiQurban</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-55 bg-[#8B5D33] text-white p-6 flex flex-col">
        <div class="flex items-center space-x-2 mb-6">
        <img src="/storage/images/Logo_Siddiq_Putih.png" alt="Logo" class="h-20">
            
        </div>
        <nav class="flex flex-col space-y-4">
            <a href="#" class="flex items-center space-x-2 p-2 bg-white text-[#8B5D33] rounded">
                <span class="text-lg">✏️</span>
                <span>Edit Profile</span>
            </a>
            <a href="#" class="flex items-center space-x-2 p-2">
                <span class="text-lg">🔔</span>
                <span>Notification</span>
            </a>
            <a href="#" class="flex items-center space-x-2 p-2">
                <span class="text-lg">🔒</span>
                <span>Security</span>
            </a>
            <a href="#" class="flex items-center space-x-2 p-2">
                <span class="text-lg">📆</span>
                <span>History</span>
            </a>
            <a href="#" class="flex items-center space-x-2 p-2">
                <span class="text-lg">❓</span>
                <span>Help</span>
            </a>
        </nav>
    </aside>
    
    <!-- Main Content -->
    <main class="flex-1 p-10">
        <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>
        
        <form class="max-w-xl space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold">First Name</label>
                    <input type="text" value="Mazaya" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-semibold">Last Name</label>
                    <input type="text" value="Shaina" class="w-full border p-2 rounded">
                </div>
            </div>
            <div>
                <label class="block font-semibold">Email</label>
                <div class="relative">
                    <input type="email" value="shainajiydan@gmail.com" class="w-full border p-2 rounded">
                    <span class="absolute right-2 top-1/2 transform -translate-y-1/2 text-green-600">✔️</span>
                </div>
            </div>
            <div>
                <label class="block font-semibold">Address</label>
                <input type="text" value="Jalan Mulyorejo 12345" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-semibold">Contact Number</label>
                <input type="text" value="0812983487" class="w-full border p-2 rounded">
            </div>
            <div>
                <label class="block font-semibold">City</label>
                <select class="w-full border p-2 rounded">
                    <option selected>Surabaya</option>
                </select>
            </div>
            <div>
                <label class="block font-semibold">Password</label>
                <div class="relative">
                    <input type="password" value="sbdfbnd65sfdvb s" class="w-full border p-2 rounded">
                    <span class="absolute right-2 top-1/2 transform -translate-y-1/2 text-green-600">✔️</span>
                </div>
            </div>
            <div class="flex space-x-4">
                <button type="button" class="px-4 py-2 border rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-[#8B5D33] text-white rounded">Save</button>
            </div>
        </form>
    </main>
</body>
</html>
