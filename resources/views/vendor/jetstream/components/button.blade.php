<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn bg-indigo-500 hover:bg-indigo-600 text-white whitespace-nowrap mt-5']) }}>
    {{ $slot }}
</button>
