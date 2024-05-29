@props(['links', 'keyword'])
@php
    $suffix = '';
    if (isset($keyword)) {
        foreach ($keyword as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $val) {
                    $suffix .= "&$key%5B%5D=$val";
                }
            } else {
                $suffix .= "&$key=$value";
            }
        }
    }
    // dd($keyword);
@endphp
<div class="container flex flex-wrap justify-between mx-auto mt-5 mb-5 pr-4">
    <div></div>
    <nav aria-label="Page navigation example">
        <ul class="inline-flex -space-x-px">
            @foreach ($links as $key => $link)
                @if ($loop->first)
                    <li>
                        <a href="{{ $link['url'] ? $link['url'] . $suffix : $links[$key + 1]['url'] . $suffix }}"
                            class="{{ config('config.sampleForm.paginatePrevButton') }}">Previous</a>
                    </li>
                    @continue
                @endif
                @if ($loop->last)
                    <li>
                        <a href="{{ $link['url'] ? $link['url'] . $suffix : $links[$key - 1]['url'] . $suffix }}"
                            class="{{ config('config.sampleForm.paginateNextButton') }}">Next</a>
                    </li>
                    @continue
                @endif
                @if (request()->page == $key)
                    <li>
                        <a href="{{ $link['url'] . $suffix }}" aria-current="page"
                            class="{{ config('config.sampleForm.paginateLabel') }} bg-gray-500 text-white">{{ $link['label'] }}</a>
                    </li>
                @else
                    <li>
                        <a href="{{ $link['url'] }}{{ $suffix }}"
                            class="{{ config('config.sampleForm.paginateLabelSelected') }}">{{ $link['label'] }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</div>
