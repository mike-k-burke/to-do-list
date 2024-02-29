<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex-col items-center text-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-sm text-white tracking-widest hover:bg-blue-600 focus:bg-blue-600 active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
