@include('templates.header', ['title' => $title, 'user' => $user ?? null])

@if ($_POST && $message == 'Вы авторизовались')
    @include('templates.messages.successful_message', ['message' => $message])
@else
    @if ($message)
        @include('templates.messages.error_message', ['message' => $message])
    @endif

    <form action="{{ route('login.store') }}" method="POST">
        @csrf
        <div class="mt-8 max-w-md">

            <div class="grid grid-cols-1 gap-6">

                <div class="block">
                    <label for="fieldEmail" class="text-gray-700 font-bold">Email</label>
                    <input id="fieldEmail" name="email" type="email"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="john@example.com" value="<?= $_POST['email'] ?? ($email ?? '') ?>">
                </div>
                <div class="block">
                    <label for="fieldPassword" class="text-gray-700 font-bold">Пароль</label>
                    <input id="fieldPassword" name="password" type="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="******"
                        value="<?= isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>">
                </div>
                <div class="block">
                    <button type="submit"
                        class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Войти
                    </button>
                    <a href="{{ route('register.create') }}"
                        class="inline-block hover:underline focus:outline-none font-bold py-2 px-4 rounded">
                        У меня нет аккаунта
                    </a>
                </div>
            </div>
        </div>
    </form>
@endif
@include('templates.footer')
