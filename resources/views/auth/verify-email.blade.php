<x-guest-layout>
    <div class="mb-4 text-sm text-[#706f6c]" data-translate-key="Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600" data-translate-key="A new verification link has been sent to the email address you provided during registration.">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button data-translate-key="Resend Verification Email">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-[#706f6c] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] rounded-[3px] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c42802]/30" data-translate-key="Log Out">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
