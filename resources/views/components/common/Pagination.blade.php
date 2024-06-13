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
@endphp
<div class="container flex flex-wrap justify-between mx-auto mt-5 mb-5 pr-4">
    <div></div>
    <nav aria-label="Page navigation example">
        <ul class="inline-flex -space-x-px">
            @foreach ($links as $key => $link)
                @php
                    $digits = $link['label'];
                    $number = null;
                    $en_number = range(0, 9);

                    $mm_number = ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];

                    if (session()->get('locale') === 'mm') {
                        $number = str_ireplace($en_number, $mm_number, $digits);
                    } elseif (session()->get('locale') === 'en') {
                        $number = str_ireplace($mm_number, $en_number, $digits);
                    }
                @endphp
                @if ($loop->first)
                    <li>
                        <a href="{{ $link['url'] ? $link['url'] . $suffix : $links[$key + 1]['url'] . $suffix }}"
                            class="{{ config('config.sampleForm.paginatePrevButton') }}">
                            {{ __('messages.previous') }}</a>
                    </li>
                    @continue
                @endif
                @if ($loop->last)
                    <li>
                        <a href="{{ $link['url'] ? $link['url'] . $suffix : $links[$key - 1]['url'] . $suffix }}"
                            class="{{ config('config.sampleForm.paginateNextButton') }}"> {{ __('messages.next') }}</a>
                    </li>
                    @continue
                @endif
                @if (request()->page == $key)
                    <li>
                        <a href="{{ $link['url'] . $suffix }}" aria-current="page"
                            class="{{ config('config.sampleForm.paginateLabel') }} bg-gray-500 text-white">{{ $number }}</a>
                    </li>
                @else
                    <li>
                        <a href="{{ $link['url'] }}{{ $suffix }}"
                            class="{{ config('config.sampleForm.paginateLabelSelected') }}">{{ $number }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</div>
