<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Chat Application AI Prompt using Tailwind CSS | Preline UI, crafted with Tailwind CSS</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Theme Check and Update -->
    <script src="resources/theme.js"></script>

    <!-- CSS Preline -->
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
</head>

<body class="dark:bg-neutral-900">
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        <!-- Content -->
        <div class="relative h-screen">
            <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                <!-- Title -->
                <div class="text-center">
                    <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
                        Welcome to Widya AI
                    </h1>
                    <p class="mt-3 text-gray-600 dark:text-neutral-400">
                        Your AI-powered copilot for the web
                    </p>
                </div>
                <!-- End Title -->

                <ul id="messages" class="mt-16 space-y-5">
                    <!-- Chat Bubble -->
                    <li class="flex gap-x-2 sm:gap-x-4">
                        <div class="grow max-w-[90%] md:max-w-2xl w-full space-y-3">
                            <span class="shrink-0 inline-flex items-center justify-center size-9.5 rounded-full bg-gray-600">
                                <span class="text-sm font-medium text-white">AI</span>
                            </span>
                            <div
                                class="inline-block bg-white border border-gray-200 rounded-lg p-4 space-y-3 dark:bg-neutral-900 dark:border-neutral-700">
                                <p class="text-sm text-gray-800 dark:text-white">
                                    Hi, how can I help you? 
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div
                class="max-w-4xl mx-auto sticky bottom-0 z-10 bg-white border-t border-gray-200 pt-2 pb-4 sm:pt-4 sm:pb-6 px-4 sm:px-6 lg:px-0 dark:bg-neutral-900 dark:border-neutral-700">
                <!-- Textarea -->
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-0">
                    <!-- Input -->
                    <div class="relative">
                        <textarea id="userInput"
                            class="p-3 sm:p-4 pb-12 sm:pb-12 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Ask me anything..."></textarea>

                        <!-- Toolbar -->
                        <div class="absolute bottom-px inset-x-px p-2 rounded-b-lg bg-white dark:bg-neutral-900">
                            <div class="flex flex-wrap justify-between items-center gap-2">
                                <!-- Button Group -->
                                <div class="flex items-center"></div>
                                <!-- End Button Group -->

                                <!-- Button Group -->
                                <div class="flex items-center gap-x-1">
                                    <!-- Send Button -->
                                    <button id="sendButton" type="button"
                                        class="inline-flex shrink-0 justify-center items-center size-8 rounded-lg text-white bg-blue-600 hover:bg-blue-500 focus:z-10 focus:outline-hidden focus:bg-blue-500">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path
                                                d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                                        </svg>
                                    </button>
                                    <!-- End Send Button -->
                                </div>
                                <!-- End Button Group -->
                            </div>
                        </div>
                        <!-- End Toolbar -->
                    </div>
                    <!-- End Input -->
                </div>
                <!-- End Textarea -->
            </div>
        </div>
        <!-- End Content -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- JS Implementing Plugins -->

    <!-- JS PLUGINS -->
    <!-- Required plugins -->
    <script src="https://cdn.jsdelivr.net/npm/preline/dist/index.js"></script>
    <script src="https://preline.co/assets/vendor/prism/prism.js"></script>

    <script src="resources/js/chat.js"></script>
</body>

</html>