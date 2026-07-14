<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#c42802] dark:bg-[#FF4433] border border-transparent rounded-[3px] font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#f53003] focus:bg-[#f53003] active:bg-[#c42802] focus:outline-none focus:ring-2 focus:ring-[#c42802]/30 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
