<select
    class="changeLang bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
    <option value="mm" {{ session()->get('locale') == 'mm' ? 'selected' : '' }}>Myanmar</option>
</select>
<script>
    var url = "{{ route('changeLang') }}";
    $(".changeLang").change(function() {
        window.location.href = url + "?lang=" + $(this).val();
    });
</script>
