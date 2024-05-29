<div class="grid gap-0 md:grid-cols-2 xl:grid-cols-2  ml-10">
    <div></div>
    <div class="flex flex-row justify-end">
        <button type="submit" class="{{ config('config.sampleForm.newButtonForm') }} btnSubmit" id="btn-submit">
            {{ $attributes['operate'] }}
        </button>
        <a href="{{ route($attributes['url']) }}" class="{{ config('config.sampleForm.newButtonForm') }}">
            <button type="button" class="">
                Cancel
            </button>
        </a>
    </div>
</div>
