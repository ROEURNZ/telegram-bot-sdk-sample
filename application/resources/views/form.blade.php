<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message to Telegram Bot</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Send Message to Telegram Bot</h1>
        <form action="{{ route('telegram.form-submit') }}" method="POST" class="space-y-4">
            @csrf {{-- CSRF protection --}}
            @method('POST') {{-- Explicitly define the HTTP method --}}

            <div>
                <label for="chat_id" class="block text-sm font-medium text-gray-700 mb-1">Chat ID</label>
                <input type="text" name="chat_id" id="chat_id" placeholder="Enter chat ID"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                <textarea name="message" id="message" rows="4" placeholder="Type your message here"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Send Message
            </button>
        </form>
    </div>
</body>

</html>
