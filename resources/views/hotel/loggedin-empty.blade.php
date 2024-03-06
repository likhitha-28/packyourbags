<div class="container py-md-5 container--narrow">
    <div class="text-center">
      <h2>Hello {{ Auth::guard('admin')->user()->name}}, your feed is empty.</h2>
    </div>
  </div>
