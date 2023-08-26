@extends ('user.layouts.app')

@section ('content')
  <div class="mb-2 px-4 py-2 text-center">
    <div class="mx-auto max-w-3xl mb-2 pb-2 text-center bg-white border border-gray-200 rounded-lg shadow" >
      <img src="{{ asset('image/default_header.png') }}" class="w-full rounded">
      <div>
        <img src="{{ Auth::user()?->reviewer?->iconSrc ?? asset('image/default_icon.jpg') }}" class="ms-4 h-48 w-48 rounded-pill border transform -translate-y-1/2">
        <div>
          <span>
            
          </span>
        </div>
      </div>
      <x-hr />
    </div>
  </div>
@endsection

@section('script')
@endsection