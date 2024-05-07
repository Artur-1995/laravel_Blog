<ul class="list-inside bullet-list-item flex flex-wrap -mx-5 -my-2">
    <?php

foreach ($menu as $item) {

    $title = call_user_func($cutString, $item['title']);    
    $href = $item['path'];
    $class = Route::is($href) ? "text-orange cursor-default" : "text-gray-600 hover:text-orange";
        ?>
    <li class="px-5 py-2"><a class="<?= $class ?>" href="<?= $href ?>">{{ $title }}</a></li>
    <?php } ?>
</ul>
