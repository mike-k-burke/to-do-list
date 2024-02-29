
<div {{ $attributes->only('class')->merge(['class' => 'bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 py-3 px-6']) }}>
    {{ $slot }}
</div>
