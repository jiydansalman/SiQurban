@extends('layouts.profile')

@section('content')
<main class="flex-1 p-10">
  <h1 class="text-2xl font-bold mb-6">Notification Settings</h1>
  <form class="space-y-6 max-w-xl">
    <div class="flex justify-between items-center">
      <span class="font-medium">Email Notifications</span>
      <input type="checkbox" class="toggle toggle-accent" checked>
    </div>
    <div class="flex justify-between items-center">
      <span class="font-medium">SMS Notifications</span>
      <input type="checkbox" class="toggle toggle-accent">
    </div>
    <div class="flex justify-between items-center">
      <span class="font-medium">App Notifications</span>
      <input type="checkbox" class="toggle toggle-accent" checked>
    </div>
    <button class="mt-6 px-6 py-2 bg-[#8B5D33] text-white rounded">Save Changes</button>
  </form>
</main>
@endsection