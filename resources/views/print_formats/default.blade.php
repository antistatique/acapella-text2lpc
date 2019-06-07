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
        @for ($i = 1; $i <= floor((sizeof($images)/24) + 1); $i++)
            @while ($x <= (24 * $i) && $x < sizeof($images))
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
                </section>
            @endwhile
            @if ($i < floor((sizeof($images)/24) + 1))
                <div class="page-break"></div>
            @endif
            @php
                $x++;
            @endphp
        @endfor
    </body>
</html>