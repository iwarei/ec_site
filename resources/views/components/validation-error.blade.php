@props(['name'])

@error ($name)
<div class="mt-1 mb-2">
  <p class="text-red-600 text-sm">
    {{ $message }}
  </p>
</div>
@enderror
