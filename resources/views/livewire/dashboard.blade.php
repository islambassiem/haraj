<div class="py-4 my-4 ">
    @if (session()->has('message'))
        <div class="flex items-center p-4 mb-4 mx-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session('message') }}</span>
            </div>
        </div>
    @endif
    @if ($posts->count() > 0)
        <div class="flex flex-col">
            <a href="{{ route('create.post') }}"
                class="flex gap-1 items-center self-end mx-6 border border-indigo-500 bg-indigo-500 text-gray-200 rounded-xl px-4 py-2 hover:bg-indigo-300 hover:text-white hover:border-neutral-100 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5z" />
                </svg>
                {{ __('Add') }}
            </a>
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        {{ '#' }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        {{ __('Title') }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        {{ __('Price') }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        {{ __('Category') }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        {{ __('Created at') }}</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        {{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($posts as $post)
                                    <tr wire:key="{{ $post->id }}">
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $i }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ Str::limit($post->title, 20) }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $post->price }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ app()->getLocale() === 'en' ? $post->category->name_en : $post->category->name_ar }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $post->created_at }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex items-center gap-2 justify-end">
                                            <button wire:click="refresh({{ $post->id }})"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-neutral-500 p-2 hover:bg-indigo-100 text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">
                                                <svg fill="currentColor" class="size-5" version="1.1" id="Layer_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    viewBox="0 0 383.748 383.748" xml:space="preserve">
                                                    <g>
                                                        <path d="M62.772,95.042C90.904,54.899,137.496,30,187.343,30c83.743,0,151.874,68.13,151.874,151.874h30
                                            C369.217,81.588,287.629,0,187.343,0c-35.038,0-69.061,9.989-98.391,28.888C70.368,40.862,54.245,56.032,41.221,73.593
                                            L2.081,34.641v113.365h113.91L62.772,95.042z" />
                                                        <path d="M381.667,235.742h-113.91l53.219,52.965c-28.132,40.142-74.724,65.042-124.571,65.042
                                            c-83.744,0-151.874-68.13-151.874-151.874h-30c0,100.286,81.588,181.874,181.874,181.874c35.038,0,69.062-9.989,98.391-28.888
                                            c18.584-11.975,34.707-27.145,47.731-44.706l39.139,38.952V235.742z" />
                                                    </g>
                                                </svg>
                                                {{ __('Refresh') }}
                                            </button>
                                            <a href="{{ route('show.post', $post) }}"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-neutral-500 p-2 hover:bg-indigo-100 text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                                    <path
                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                                </svg>
                                                {{ __('Show') }}
                                            </a>
                                            <a href="{{ route('edit.post', $post) }}"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-neutral-500 p-2 hover:bg-indigo-100 text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                                                    class="size-5">
                                                    <path fill="#fdbc01"
                                                        d="m77.13,24.59c-1.69-1.76-17.92-2.18-17.92-2.18l-42.97,42.97c-.57.57,17.81,18.95,18.38,18.38l42.97-42.97s.71-14.98-.46-16.21Z" />
                                                    <path fill="#fd86ae"
                                                        d="m85.99,22.76c-2.54-3.27-5.48-6.22-8.75-8.75-3.11-2.41-7.54-2.09-10.33.69l-7.71,7.71,18.38,18.38,7.71-7.71c2.78-2.78,3.1-7.22.69-10.33Z" />
                                                    <path fill="#c9dcf4"
                                                        d="m19.74,87.26l12.79-2.4c.76-.14,1.46-.51,2.02-1.04-5.03-7.68-10.69-13.34-18.38-18.37-.53.56-.9,1.26-1.04,2.02l-2.4,12.79,7,7Z" />
                                                    <path fill="#4a254b"
                                                        d="m17.27,82.73c-1.29-1.29-2.87-2.11-4.53-2.47l-.26,1.37c-.65,3.49,2.4,6.54,5.89,5.89l1.37-.26c-.36-1.66-1.18-3.24-2.47-4.53Z" />
                                                    <path fill="#4a254b"
                                                        d="m77.87,41.57c-.13,0-.26-.05-.35-.15l-6.97-6.97c-.2-.2-.2-.51,0-.71s.51-.2.71,0l6.97,6.97c.2.2.2.51,0,.71-.1.1-.23.15-.35.15Z" />
                                                    <path fill="#4a254b"
                                                        d="m30.49,78.72c-.15,0-.29-.06-.39-.19-3.98-4.91-8.49-8.94-14.19-12.67-.23-.15-.29-.46-.14-.69.15-.23.46-.29.69-.14,5.79,3.79,10.37,7.89,14.42,12.88.17.21.14.53-.07.7-.09.07-.2.11-.31.11Z" />
                                                    <path fill="#4a254b"
                                                        d="m54.26,55.65c1.45-1.45,1.55-3.74.31-5.31-.15-.19-.43-.22-.61-.05-.98.98-4.08,4.08-5.06,5.06-.17.17-.15.45.05.61,1.57,1.25,3.86,1.14,5.31-.31Z" />
                                                    <circle cx="41.17" cy="55.29" r="4.5" fill="#fff" />
                                                    <circle cx="41.17" cy="55.29" r="1.93" fill="#4a254b" />
                                                    <circle cx="53.9" cy="42.56" r="4.5" fill="#fff" />
                                                    <circle cx="53.9" cy="42.56" r="1.93" fill="#4a254b" />
                                                </svg>
                                                {{ __('Edit') }}
                                            </a>
                                            <button wire:click="delete({{ $post->id }})"
                                                wire:confirm="{{ __('Are you sure you want to delete this post?') }}"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-neutral-500 p-2 hover:bg-indigo-100 text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"
                                                    class="size-5">
                                                    <path fill="#afc4e1"
                                                        d="M50,21H14v36c0,1.105,0.895,2,2,2h32c1.105,0,2-0.895,2-2V21z" />
                                                    <path fill="#becde8" d="M39,59V21H14v36c0,1.104,0.895,2,2,2H39z" />
                                                    <path fill="#cad8ed" d="M25,59V21H14v36c0,1.104,0.895,2,2,2H25z" />
                                                    <path fill="#afc4e1" d="M14 21H50V24H14z" />
                                                    <path fill="#8d6c9f"
                                                        d="M48,60H16c-1.654,0-3-1.346-3-3V21c0-0.553,0.448-1,1-1h36c0.552,0,1,0.447,1,1v36 C51,58.654,49.654,60,48,60z M15,22v35c0,0.552,0.449,1,1,1h32c0.551,0,1-0.448,1-1V22H15z" />
                                                    <path fill="#a8b7d1"
                                                        d="M53,11H11c-1.105,0-2,0.895-2,2v6c0,1.105,0.895,2,2,2h42c1.105,0,2-0.895,2-2v-6 C55,11.895,54.105,11,53,11z" />
                                                    <path fill="#8d6c9f"
                                                        d="M53,22H11c-1.654,0-3-1.346-3-3v-6c0-1.654,1.346-3,3-3h42c1.654,0,3,1.346,3,3v6 C56,20.654,54.654,22,53,22z M11,12c-0.551,0-1,0.448-1,1v6c0,0.552,0.449,1,1,1h42c0.551,0,1-0.448,1-1v-6c0-0.552-0.449-1-1-1H11 z" />
                                                    <path fill="#8d6c9f"
                                                        d="M41 12c-.38 0-.743-.218-.911-.586l-2.335-5.137C37.57 6.1 37.323 6 37.063 6H26.937c-.26 0-.506.1-.691.277l-2.335 5.137c-.229.503-.822.726-1.324.496-.502-.229-.725-.821-.496-1.324l2.4-5.28c.037-.081.084-.157.142-.226C25.204 4.394 26.043 4 26.937 4h10.127c.893 0 1.733.394 2.305 1.08.057.068.105.145.142.226l2.4 5.28c.229.503.006 1.096-.496 1.324C41.28 11.972 41.139 12 41 12zM14 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C15 17.553 14.552 18 14 18zM19 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C20 17.553 19.552 18 19 18zM24 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C25 17.553 24.552 18 24 18zM29 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C30 17.553 29.552 18 29 18zM35 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C36 17.553 35.552 18 35 18zM40 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C41 17.553 40.552 18 40 18zM45 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C46 17.553 45.552 18 45 18zM50 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C51 17.553 50.552 18 50 18zM38 56H14c-.552 0-1-.447-1-1s.448-1 1-1h24c.552 0 1 .447 1 1S38.552 56 38 56zM46 56h-4c-.552 0-1-.447-1-1s.448-1 1-1h4c.552 0 1 .447 1 1S46.552 56 46 56zM20 42c-.552 0-1-.447-1-1V29c0-.553.448-1 1-1s1 .447 1 1v12C21 41.553 20.552 42 20 42zM20 50c-.552 0-1-.447-1-1v-4c0-.553.448-1 1-1s1 .447 1 1v4C21 49.553 20.552 50 20 50zM28 50c-.552 0-1-.447-1-1V29c0-.553.448-1 1-1s1 .447 1 1v20C29 49.553 28.552 50 28 50zM36 50c-.552 0-1-.447-1-1V29c0-.553.448-1 1-1s1 .447 1 1v20C37 49.553 36.552 50 36 50zM44 50c-.552 0-1-.447-1-1V37c0-.553.448-1 1-1s1 .447 1 1v12C45 49.553 44.552 50 44 50zM44 34c-.552 0-1-.447-1-1v-4c0-.553.448-1 1-1s1 .447 1 1v4C45 33.553 44.552 34 44 34z" />
                                                </svg>
                                                {{ __('Delete') }}
                                            </button>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="p-4 mx-4 bg-red-500 text-white rounded-lg">
            <span>{{ __('No Ads yet') }}</span>
            <span class="underline"><a href="{{ route('create.post') }}">{{ __('Create One') }}</a></span>
        </div>
    @endif
</div>
