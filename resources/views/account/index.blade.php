@include('templates.header', [
    'title' => $title,
    'menu' => $menu,
])

<div class="flex-1 container mx-auto bg-white overflow-hidden px-4 sm:px-6">
    <a href="getToken/{{ $user['id'] }}"
        class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded"
        role="button">
        Получить Api Token
    </a>

    <?php
    $hiddenText = $user['api_token'];
    ?>

    @if ($user['api_token'])
        <button
            class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded"
            role="button" onclick="copyToken('{{ $user['api_token'] }}')">Копировать токен</button>
        <div class="py-3">
            <p>Ваш токен:</p>
            <p id="hiddenText">{{ $user['api_token'] }}</p>
        </div>
    @endif
</div>
<!-- Подключение jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function copyToken(token) {
        var hiddenText = token;

        var $tmp = $("<textarea>");
        $("body").append($tmp);
        $tmp.val(hiddenText).select();
        document.execCommand("copy");
        $tmp.remove();

        alert("Токен скопирован: " + hiddenText);
    }
</script>
@include('templates.footer')
