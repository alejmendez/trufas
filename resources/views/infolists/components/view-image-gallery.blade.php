<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    @php
        $limit = $getLimit();
        $state = \Illuminate\Support\Arr::wrap($getState());
        $limitedState = array_slice($state, 0, $limit);
        $isCircular = $isCircular();
        $isSquare = $isSquare();
        $isStacked = $isStacked();
        $overlap = $isStacked ? ($getOverlap() ?? 2) : null;
        $ring = $isStacked ? ($getRing() ?? 2) : null;
        $height = $getHeight() ?? ($isStacked ? '2.5rem' : '8rem');
        $width = $getWidth() ?? (($isCircular || $isSquare) ? $height : null);

        $defaultImageUrl = $getDefaultImageUrl();

        if ((! count($limitedState)) && filled($defaultImageUrl)) {
            $limitedState = [null];
        }

        $ringClasses = \Illuminate\Support\Arr::toCssClasses([
            'ring-white dark:ring-gray-900',
            match ($ring) {
                0 => null,
                1 => 'ring-1',
                2 => 'ring-2',
                3 => 'ring',
                4 => 'ring-4',
                default => $ring,
            },
        ]);

        $hasLimitedRemainingText = $hasLimitedRemainingText();
        $isLimitedRemainingTextSeparate = $isLimitedRemainingTextSeparate();

        $limitedRemainingTextSizeClasses = match ($getLimitedRemainingTextSize()) {
            'xs' => 'text-xs',
            'sm', null => 'text-sm',
            'base', 'md' => 'text-base',
            'lg' => 'text-lg',
            default => $size,
        };
    @endphp

    <div class="view-image-gallery">
        @if (count($limitedState))
            <div class="w-full mb-5">
                <img
                    src="{{ filled($limitedState[0]) ? $getImageUrl($limitedState[0]) : $defaultImageUrl }}"
                    class="main-img h-auto max-w-full rounded-lg"
                />
            </div>
        @endif

        <div
            {{
                $attributes
                    ->merge($getExtraAttributes(), escape: false)
                    ->class([
                        'fi-in-image flex gap-x-2.5',
                    ])
            }}
        >
            @if (count($limitedState))
                <div
                    @class([
                        'flex flex-wrap flex-row justify-center gap-4'
                    ])
                >
                    @foreach ($limitedState as $stateItem)
                        <img
                            src="{{ filled($stateItem) ? $getImageUrl($stateItem) : $defaultImageUrl }}"
                            {{
                                $getExtraImgAttributeBag()
                                    ->class([
                                        'max-w-none object-cover object-center rounded-lg',
                                        'rounded-full' => $isCircular,
                                        $ringClasses,
                                    ])
                                    ->style([
                                        "height: {$height}" => $height,
                                        "width: {$width}" => $width,
                                    ])
                            }}
                        />
                    @endforeach

                    @if ($hasLimitedRemainingText && ($loop->iteration < count($limitedState)) && (! $isLimitedRemainingTextSeparate) && $isCircular)
                        <div
                            style="
                                @if ($height) height: {{ $height }}; @endif
                                @if ($width) width: {{ $width }}; @endif
                            "
                            @class([
                                'flex items-center justify-center bg-gray-100 font-medium text-gray-500 dark:bg-gray-800 dark:text-gray-400',
                                'rounded-full' => $isCircular,
                                $limitedRemainingTextSizeClasses,
                                $ringClasses,
                            ])
                            @style([
                                "height: {$height}" => $height,
                                "width: {$width}" => $width,
                            ])
                        >
                            <span class="-ms-0.5">
                                +{{ count($state) - count($limitedState) }}
                            </span>
                        </div>
                    @endif
                </div>

                @if ($hasLimitedRemainingText && ($loop->iteration < count($limitedState)) && ($isLimitedRemainingTextSeparate || (! $isCircular)))
                    <div
                        @class([
                            'font-medium text-gray-500 dark:text-gray-400',
                            $limitedRemainingTextSizeClasses,
                        ])
                    >
                        +{{ count($state) - count($limitedState) }}
                    </div>
                @endif
            @elseif (($placeholder = $getPlaceholder()) !== null)
                <x-filament-infolists::entries.placeholder>
                    {{ $placeholder }}
                </x-filament-infolists::entries.placeholder>
            @endif
        </div>
    </div>
</x-dynamic-component>
