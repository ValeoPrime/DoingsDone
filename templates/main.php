<section class="content__side">
    <h2 class="content__side-heading">Проекты</h2>
    <nav class="main-navigation">
        <ul class="main-navigation__list">

            <?php foreach($projects as $value): ?>
                <li class="main-navigation__list-item">
                    <a class="main-navigation__list-item-link" href="#"><?=filter_text($value); ?></a>
                    <span class="main-navigation__list-item-count"><?=tasks_count($tasks, $value); ?></span>
                </li>
            <?php endforeach; ?>

        </ul>
    </nav>

    <a class="button button--transparent button--plus content__side-button"
       href="pages/form-project.html" target="project_add">Добавить проект</a>
</section>

<main class="content__main">
    <h2 class="content__main-heading">Список задач</h2>

    <form class="search-form" action="index.php" method="post" autocomplete="off">
        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

        <input class="search-form__submit" type="submit" name="" value="Искать">
    </form>

    <div class="tasks-controls">
        <nav class="tasks-switch">
            <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
            <a href="/" class="tasks-switch__item">Повестка дня</a>
            <a href="/" class="tasks-switch__item">Завтра</a>
            <a href="/" class="tasks-switch__item">Просроченные</a>
        </nav>

        <label class="checkbox">
            <input class="checkbox__input visually-hidden show_completed" type="checkbox"
                <?php if ($show_complete_tasks === 1): ?>
                    checked
                <?php endif; ?>>

            <span class="checkbox__text">Показывать выполненные</span>
        </label>
    </div>

    <table class="tasks">
        <?php foreach($tasks as $value): ?>
            <tr class="tasks__item task
            <?php
            if ($value["completed"]===true): ?>
                                task--completed
            <?php endif ?>
            <?php if ($show_complete_tasks===0 and $value["completed"]===true ): ?>
                            visually-hidden
            <?php endif ?>

            <?php
            $time_left=burning_task($value["date"]);
            ?>
            <?php if ($time_left>0 && $time_left<=24): ?>
                task--important
            <?php endif ?>


                            ">
                <td class="task__select">
                    <label class="checkbox task__checkbox">
                        <input class="checkbox__input visually-hidden" type="checkbox">
                        <span class="checkbox__text"><?=filter_text($value["title"]); ?> </span>
                    </label>
                </td>
                <td class="task__date"><?=$value["date"]?></td>
                <td class="task__controls"></td>
            </tr>
        <?php endforeach ?>
    </table>
</main>
