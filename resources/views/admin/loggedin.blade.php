<x-layout>
<div class="container py-md-5 container--narrow">
    <div class="text-center">
      <h2>Hello {{ Auth::guard('admin')->user()->name}}</h2>
    </div>
  </div>
</x-layout>