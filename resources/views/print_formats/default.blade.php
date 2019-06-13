<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="build/css/print_default.css">
    </head>

    <body>
        @php
            $x = 0;
            $y = 0;
        @endphp
        @for ($i = 1; $i <= ceil((sizeof($images)/24)); $i++)
            @while ($x < (24 * $i) && $x < sizeof($images))
                @php
                    $y = $x;
                    $x += 4;
                @endphp
                <section class="tags-row">
                    @while ($y < sizeof($images) && $y < $x)
                        <div class="tags-column">
                            <img src="{{ $images[$y] }}" >
                        </div>
                        @php
                            $y++;
                        @endphp
                    @endwhile
                    @if ($x - $y === 3)
                        <div class="tags-column"></div>
                    @endif
                </section>
            @endwhile
            @if ($i < ceil((sizeof($images)/24)))
                <div class="page-break"></div>
            @endif
        @endfor
    </body>
</html>