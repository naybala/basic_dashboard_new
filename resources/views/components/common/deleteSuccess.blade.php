@if (Session::has('success_delete'))
    <br>
    <div class="bg-green-100 border-l-4 border-red-500 text-red-700 p-4" role="alert" id="validateDisappear">
        <ul>
            <li>{{ Session::get('success_delete') }}</li>
        </ul>
    </div>
    <br>
@endif
