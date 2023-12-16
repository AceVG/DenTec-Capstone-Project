<x-guest-layout>
    <div class="max-w-7xl mx-auto space-y-6">
        <div class="p-4 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.view-profile-history-form')
            </div>
        </div>

        <div class="p-4 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>
</x-guest-layout>
