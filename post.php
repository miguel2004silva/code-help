<?php
include_once("templates/header.php");

if(isset($_GET['id'])) {
    $postId = $_GET['id'];
    $currentPost = null;

    foreach($posts as $post) {
        if($post['id'] == $postId) {
            $currentPost = $post;
            break;
        }
    }

    // Verifica se a chave 'specific_text' está definida no array atual de postagens
    $specificText = isset($currentPost['specific_text']) ? $currentPost['specific_text'] : '';
}
?>

<main id="post-container">
    <div class="content-container">
        <h1 id="main-title"><?= $currentPost['title'] ?></h1>
        <p id="post-description"><?= $currentPost['description'] ?></p>
        <div class="img-container">
            <img src="<?= $BASE_URL ?>/img/<?= $currentPost['img'] ?>" alt="<?= $currentPost['title'] ?>">
        </div>
        <p class="post-content"><?= $specificText ?></p> <!-- Aqui está o texto específico para cada postagem -->
    </div>

    <aside id="nav-container">
        <h3 id="tags-title">Tags</h3>
        <ul id="tag-list">
            <?php foreach($currentPost['tags'] as $tag): ?>
                <li><a href="#"><?= $tag ?></a></li>
            <?php endforeach; ?>
        </ul>
        <h3 id="categories-title">Categorias</h3>
        <ul id="categories-list">
            <?php foreach($categories as $category): ?>
                <li><a href="#"><?= $category ?></a></li>
            <?php endforeach; ?>
        </ul>
    </aside>
</main>

<?php include_once("templates/footer.php") ?>
