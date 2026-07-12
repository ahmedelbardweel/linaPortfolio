<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md font-semibold text-xs text-[#1b1b18] dark:text-[#EDEDEC] uppercase tracking-widest shadow-sm hover:bg-[#f0f0ef] dark:hover:bg-[#2a2a28] focus:outline-none focus:ring-2 focus:ring-[#c42802]/30 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
