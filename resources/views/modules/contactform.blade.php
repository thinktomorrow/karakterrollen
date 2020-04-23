<div class="container stack-l m-stack-xl">
    <form action="{{ route('contact.store') }}" method="POST" id="contactform">
        @csrf
        {{ honeypot_fields() }}
        <div class="row gutter-s justify-center">
            <div class="xs-column-12 s-column-6 m-column-4">
                <label class="mb-2 block" for="name">@lang('contact.form.name')</label>
                <input value="{{ old('name') }}" class="w-full p-3 bg-grey-200 border border-grey-300 mb-4 rounded" type="text" name="name" id="name">
                @error('name')
                    <p class="font-medium mb-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="xs-column-12 s-column-6 m-column-4">
                <label class="mb-2 block" for="email">@lang('contact.form.email')</label>
                <input value="{{ old('email') }}" class="w-full p-3 bg-grey-200 border border-grey-300 mb-4 rounded" type="email" name="email" id="email">
                @error('email')
                    <p class="font-medium mb-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row gutter-s justify-center">
            <div class="xs-column-12 s-column-12 m-column-8">
                <label class="mb-2 block" for="message">@lang('contact.form.message')</label>
                <textarea class="w-full p-3 bg-grey-200 border border-grey-300 mb-4 rounded" name="message" id="message" cols="30" rows="10">{{ old('message') }}</textarea>
                @error('message')
                    <p class="font-medium mb-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row gutter-s justify-center">
            <div class="xs-column-12 s-column-12 m-column-8">
                <div class="flex items-center mb-2">
                    <input class="bg-grey-200 border border-grey-300 rounded mr-4" type="checkbox" name="privacy" id="privacy">
                    <label for="privacy">@lang('contact.form.privacy_policy')</label>
                    @error('privacy')
                        <p class="font-medium mb-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row gutter-s justify-center mt-4">
            <div class="xs-column-12 s-column-12 m-column-8">
                <button type="submit" form="contactform" class="btn btn-primary">@lang('contact.form.send')</button>
            </div>
        </div>
    </form>
</div>
