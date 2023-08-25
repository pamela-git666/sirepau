@props(['size' => 35, 'color' => 'gray'])
@php
switch ($color) {
    case 'value':
        $col = '#374151';
        break;

    case 'value':
        $col = '#ffffff';
        break;

    default:
        $col = '#374151';
        break;
}
@endphp

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="{{ $size}}"
    height="{{ $size}}" viewBox="0 0 256 256" xml:space="preserve">
    <desc>Created with Fabric.js 1.7.22</desc>
    <defs>
    </defs>
    <g transform="translate(128 128) scale(0.72 0.72)" style="">
        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
            transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)">
            <path
                d="M 73.07 79.046 H 16.929 c -3.223 0 -5.845 -2.622 -5.845 -5.845 c 0 -3.499 1.526 -6.809 4.186 -9.08 c 1.323 -1.131 2.083 -2.777 2.083 -4.519 V 38.949 c 0 -15.245 12.402 -27.647 27.647 -27.647 c 15.245 0 27.647 12.402 27.647 27.647 v 20.653 c 0 1.741 0.759 3.389 2.082 4.519 c 2.66 2.271 4.187 5.581 4.187 9.08 C 78.916 76.424 76.294 79.046 73.07 79.046 z M 17.086 73.046 h 55.828 c -0.044 -1.684 -0.797 -3.266 -2.081 -4.362 c -2.66 -2.272 -4.186 -5.582 -4.186 -9.081 V 38.949 c 0 -11.936 -9.711 -21.647 -21.647 -21.647 c -11.936 0 -21.647 9.711 -21.647 21.647 v 20.653 c 0 3.498 -1.525 6.808 -4.186 9.081 C 17.883 69.78 17.13 71.362 17.086 73.046 z"
                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            <path
                d="M 45 90 c -7.656 0 -13.884 -6.229 -13.884 -13.884 c 0 -0.064 0.003 -0.153 0.008 -0.227 c 0.083 -1.611 1.422 -2.902 3.059 -2.843 c 1.656 0.034 2.971 1.405 2.937 3.062 c 0 0.023 -0.001 0.052 -0.003 0.081 C 37.155 80.503 40.677 84 45 84 c 4.329 0 7.854 -3.507 7.884 -7.829 c -0.002 -0.045 -0.003 -0.091 -0.003 -0.125 c 0 -1.657 1.343 -3 3 -3 c 1.623 0 2.945 1.29 2.998 2.9 c 0.003 0.057 0.005 0.124 0.005 0.17 C 58.884 83.771 52.655 90 45 90 z"
                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            <path
                d="M 45 17.305 c -4.771 0 -8.652 -3.882 -8.652 -8.653 S 40.229 0 45 0 c 4.771 0 8.652 3.881 8.652 8.652 S 49.771 17.305 45 17.305 z M 45 6 c -1.462 0 -2.652 1.19 -2.652 2.652 c 0 1.463 1.19 2.653 2.652 2.653 c 1.463 0 2.652 -1.19 2.652 -2.653 C 47.652 7.19 46.463 6 45 6 z"
                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            <path
                d="M 83.517 41.949 c -1.657 0 -3 -1.343 -3 -3 c 0 -13.24 -7.293 -25.293 -19.033 -31.457 c -1.467 -0.77 -2.032 -2.584 -1.262 -4.051 c 0.77 -1.466 2.581 -2.031 4.051 -1.262 c 13.721 7.204 22.244 21.292 22.244 36.77 C 86.517 40.606 85.174 41.949 83.517 41.949 z"
                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
            <path
                d="M 6.483 41.949 c -1.657 0 -3 -1.343 -3 -3 c 0 -15.477 8.523 -29.565 22.243 -36.769 c 1.465 -0.77 3.281 -0.205 4.051 1.262 s 0.205 3.281 -1.262 4.051 C 16.776 13.656 9.483 25.709 9.483 38.949 C 9.483 40.606 8.14 41.949 6.483 41.949 z"
                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
        </g>
    </g>
</svg>
