<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('History') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="dental_history" :value="__('Dental History')" />
            <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" type="text" id="dental_history" name="dental_history" rows="3">{{$user->dental_history}}</textarea>
        </div>

        <div>
            <x-input-label for="medical_history" :value="__('Medical History')" />
            <textarea class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" type="text" id="medical_history" name="medical_history" rows="3">{{$user->medical_history}}</textarea>
        </div>
    </form>
</section>
