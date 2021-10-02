<div class="container">
    <h1 class="page__title page__title--popular">Популярное</h1>
</div>
<div class="popular container">
    <div class="popular__filters-wrapper">
        <div class="popular__sorting sorting">
            <b class="popular__sorting-caption sorting__caption">Сортировка:</b>
            <ul class="popular__sorting-list sorting__list">
                <li class="sorting__item sorting__item--popular">
                    <a class="sorting__link sorting__link--active" href="#">
                        <span>Популярность</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Лайки</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Дата</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <div class="popular__filters filters">
            <b class="popular__filters-caption filters__caption">Тип контента:</b>
            <ul class="popular__filters-list filters__list">
<<<<<<< HEAD
                <? if (isset($_GET['post_list'])) {
                    $active_tab = $_GET['post_list'];
                   } ?>
                <li class="popular__filters-item popular__filters-item--all filters__item filters__item--all">
                    <a class="filters__button filters__button--ellipse filters__button--all <?= (!isset($_GET['post_list']) || $active_tab === 'posts') ? 'filters__button--active' : ''; ?>" href="index.php?post_list=posts">
=======
                <?php if (isset($_GET['post_list'])) {
                    $active_tab = $_GET['post_list'];
                } ?>
                <li class="popular__filters-item popular__filters-item--all filters__item filters__item--all">
                    <a class="filters__button filters__button--ellipse filters__button--all <?= ($active_tab === '' || !isset($_GET['post_list'])) ? 'filters__button--active' : ''; ?> " href="index.php?post_list=posts">
>>>>>>> cd1f685d7958eb55a223b6afdf4d278b07e924a6
                        <span>Все</span>
                    </a>
                </li>
                <?php foreach ($content_type_arr as $type): ?>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--photo button <?= ($active_tab === $type['class_name']) ? 'filters__button--active' : ''; ?>" href="index.php?post_list=<?= $type['class_name']; ?>">
                        <span class="visually-hidden"><?= $type['type_name']; ?></span>
                        <svg class="filters__icon" width="22" height="18">
                            <use xlink:href="#icon-filter-<?= $type['class_name']; ?>"></use>
                        </svg>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="popular__posts">
        <?php foreach ($posts_arr as $value): ?>
            <article class="popular__post post <?= $value['class_name']; ?>">
                <header class="post__header">
                    <h2>
                        <a href="posts.php?active_post=<?= $value['unique_id_post'];?>"><?= htmlspecialchars($value['title']); ?></a>
                    </h2>
                </header>
                <div class="post__main">
                    <?php switch ($value['class_name']):
                        case "quote": ?>
                            <!--содержимое для поста-цитаты-->
                            <blockquote>
                                <p>
                                    <?= htmlspecialchars($value['text_quote']); ?>
                                </p>
                                <cite><?= htmlspecialchars($value['author_quote']); ?></cite>
                            </blockquote>
                            <?php break;
                        case "link": ?>
                            <!--содержимое для поста-ссылки-->
                            <div class="post-link__wrapper">
                                <a class="post-link__external" href="http://" title="Перейти по ссылке">
                                    <div class="post-link__info-wrapper">
                                        <div class="post-link__icon-wrapper">
                                            <img src="https://www.google.com/s2/favicons?domain=vitadental.ru"
                                                 alt="Иконка">
                                        </div>
                                        <div class="post-link__info">
                                            <h3><?= htmlspecialchars($value['title']); ?></h3>
                                        </div>
                                    </div>
                                    <span><?= htmlspecialchars($value['site_link']); ?></span>
                                </a>
                            </div>
                            <?php break;
                        case "photo": ?>
                            <!--содержимое для поста-фото-->
                            <div class="post-photo__image-wrapper">
                                <img src="img/<?= $value['image_link'] ?>" alt="Фото от пользователя" width="360"
                                     height="240">
                            </div>
                            <?php break;
                        case "video": ?>
                            <!--содержимое для поста-видео-->
                            <div class="post-video__block">
                                <div class="post-video__preview">
                                    <?= embed_youtube_cover($value['video_link']); ?>
                                    <img src="img/coast-medium.jpg" alt="Превью к видео" width="360" height="188">
                                </div>
                                <a href="post-details.html" class="post-video__play-big button">
                                    <svg class="post-video__play-big-icon" width="14" height="14">
                                        <use xlink:href="#icon-video-play-big"></use>
                                    </svg>
                                    <span class="visually-hidden">Запустить проигрыватель</span>
                                </a>
                            </div>
                            <?php break;
                        case "text": ?>
                            <!--содержимое для поста-текста-->
                            <blockquote>
                                <p><?= get_text_content(htmlspecialchars($value['text'])); ?></p>
                            </blockquote>
                            <?php break;
                    endswitch; ?>
                </div>
                <footer class="post__footer">
                    <div class="post__author">
                        <a class="post__author-link" href="#" title="Автор">
                            <div class="post__avatar-wrapper">
                                <img class="post__author-avatar" src="img/<?= $value['avatar_link']; ?>" alt="Аватар пользователя">
                            </div>
                            <div class="post__info">
                                <b class="post__author-name"><?= $value['login']; ?></b>
                                <time class="post__time" datetime="" title="<?=$value['pub_date_post']?>"><?= get_post_date ( $value['pub_date_post'] )?></time>
                            </div>
                        </a>
                    </div>
                    <div class="post__indicators">
                        <div class="post__buttons">
                            <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
                                <svg class="post__indicator-icon" width="20" height="17">
                                    <use xlink:href="#icon-heart"></use>
                                </svg>
                                <svg class="post__indicator-icon post__indicator-icon--like-active" width="20" height="17">
                                    <use xlink:href="#icon-heart-active"></use>
                                </svg>
                                <span>0</span>
                                <span class="visually-hidden">количество лайков</span>
                            </a>
                            <a class="post__indicator post__indicator--comments button" href="#" title="Комментарии">
                                <svg class="post__indicator-icon" width="19" height="17">
                                    <use xlink:href="#icon-comment"></use>
                                </svg>
                                <span>0</span>
                                <span class="visually-hidden">количество комментариев</span>
                            </a>
                        </div>
                    </div>
                </footer>
            </article>
        <?php endforeach; ?>
    </div>
</div>
