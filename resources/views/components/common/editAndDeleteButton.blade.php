<form action="{{ route($attributes['deleteRoute'], $attributes['deleteId']) }}" method="post" class="formActionDelete">
    @csrf
    @method('DELETE')
    <td class="px-6 py-4 text-center">
        <a href="{{ route($attributes['editRoute'], $attributes['deleteId']) }}">
            <button type="button" class="{{ config('config.sampleForm.buttonEdit') }} lg:px-0 lg:pl-4 lg:pr-4">
                Edit
            </button>
        </a>
        <button type="submit" class="{{ config('config.sampleForm.buttonDelete') }} lg:px-0 lg:pl-4 lg:pr-4 mt-1">
            Delete
        </button>
    </td>
</form>
