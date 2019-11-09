@push('menu_items')
  @component('menu-item')
    <a class="pure-menu-link" href="{{ trim($url) }}">{{ $slot }}</a>
  @endcomponent
@endpush
