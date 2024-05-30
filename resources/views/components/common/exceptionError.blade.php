@if (Session::has('base_error'))
    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert" id="validateDisapper">
        <ul>
            <li>{{ Session::get('base_error') }}</li>
        </ul>
    </div><br>
@endif
