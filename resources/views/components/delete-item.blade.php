<form method="POST" action="{{ $route }}"
      onsubmit="return confirm('Are you sure you want to delete this item?');">
    @method('delete')
    @csrf

    <a href="#"
       class="mt-3 inline-block px-2 py-1 bg-red-600 text-white rounded-md hover:bg-red-400"
       onclick="event.preventDefault(); this.closest('form').requestSubmit();">
        {{ $text }}
    </a>
</form>
