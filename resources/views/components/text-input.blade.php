@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-[#e3e3e0] dark:border-[#3E3E3A] focus:border-[#c42802] focus:ring-[#c42802]/30 rounded-md shadow-sm']) }}>
