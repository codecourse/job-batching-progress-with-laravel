@props(['task'])

<li class="relative pb-10 group">
    <div class="absolute left-4 top-4 -ml-px mt-0.5 h-full w-0.5 group-last:hidden transition-colors"></div>

    <div class="group relative flex items-start">
        <span class="flex h-9 items-center">
            <!--Pending-->
                <span class="flex h-9 items-center" aria-hidden="true">
                    <span class="relative z-10 flex h-8 w-8 items-center justify-center rounded-full border-2 border-gray-300 bg-white"></span>
                </span>

            <!--In progress-->
            {{--<span class="flex h-9 items-center" aria-hidden="true">--}}
            {{--    <span class="relative z-10 flex h-8 w-8 items-center justify-center rounded-full border-2 border-indigo-600 bg-white">--}}
            {{--        <span class="h-2.5 w-2.5 rounded-full bg-indigo-600 animate-pulse"></span>--}}
            {{--    </span>--}}
            {{--</span>--}}

            <!--Complete-->
            {{--<span class="relative z-10 flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600">--}}
            {{--    <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
            {{--        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"/>--}}
            {{--    </svg>--}}
            {{--</span>--}}

            <!--Failed-->
            {{--<span class="flex h-9 items-center" aria-hidden="true">--}}
            {{--    <span class="relative z-10 flex h-8 w-8 items-center justify-center rounded-full border-2 border-black bg-white">--}}
            {{--        <span class="h-2.5 w-2.5 rounded-full bg-black"></span>--}}
            {{--    </span>--}}
            {{--</span>--}}

        </span>
        <span class="ml-4 flex min-w-0 flex-col">
            <span class="text-sm font-medium">
                {{ $task->title }}
            </span>
            <span class="text-sm text-gray-500">
                {{ $task->description }}
            </span>
        </span>
    </div>
</li>
