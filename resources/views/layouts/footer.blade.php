<footer class="bg-gray-900 text-gray-400 py-8">
    <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between">
        <div class="mb-6 md:mb-0">
            <h3 class="text-xl font-bold text-white mb-2">{{ config('app.name', 'NexusMind') }}</h3>
            <p class="text-sm">Integrated task, project and knowledge management system</p>
        </div>

        <div class="grid grid-cols-2 gap-8 text-sm">
            <div>
                <h4 class="text-gray-300 font-semibold mb-3">Features</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:underline">Task Manager</a></li>
                    <li><a href="#" class="hover:underline">Project Manager</a></li>
                    <li><a href="#" class="hover:underline">Second Brain</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-gray-300 font-semibold mb-3">Support</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:underline">Documentation</a></li>
                    <li><a href="#" class="hover:underline">API</a></li>
                    <li><a href="#" class="hover:underline">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mt-8 text-center text-xs text-gray-500">
        &copy; {{ date('Y') }} {{ config('app.name', 'NexusMind') }}. All rights reserved.
    </div>
</footer>
