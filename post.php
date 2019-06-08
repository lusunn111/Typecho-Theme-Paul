<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
$this->need('header.php');
require_once 'functions.php';
$this->widget('Widget_Contents_Page_List')->to($pages);
global $pages_note, $pages_say;
while ($pages->next()):
    switch ($pages->slug) {
        case 'note':
            $pages_note = $pages->permalink;
            break;
        case 'saying':
            $pages_say = $pages->permalink;
            break;
        default:
            break;
    }
endwhile;
?>


<main class="is-article">
    <nav class="navigation">
        <a href="<?php echo $pages_note; ?>" class="active">日记</a>
        <?php if ($this->options->blog_url): ?> <a href="<?php $this->options->blog_url(); ?>" target="_blank">
                博文</a><?php endif; ?>
        <a href="<?php echo $pages_say; ?>">语录</a>
    </nav>
    <article>


        <h1><?php echo date('Y-m-d'); ?>
            <small>(<?php echo $this->date('l');?>)</small>
        </h1>
        <div class="paul-note" id="<?php $this->cid() ?>">
            <div class="note-content">
                <center><h1><?php $this->title() ?></h1></center>
                <?php $this->content();?>

            </div>
            <div class="note-inform">
                <span class="user"><?php $this->user->name(); ?></span>
                <span class="mood" title="好心情可以带来美好的一天">一般</span>
            </div>
            <div class="note-action">
                    <span class="comment" data-cid="<?php $this->cid(); ?>" data-year="<?php $this->year(); ?>"
                          title="参与评论">评论</span>
                <!--                    TODO 点赞实现 line 191 263 86 -->
                <!--                    <span class="like" data-cid="-->
                <?php //$this->cid(); ?><!--" title="已有 0 人点赞">0</span>-->
            </div>
        </div>


    </article>
    <!-- <section class="post-form is-comment">
         <h3><i class="fa fa-comments"></i>评论</h3>
         <div class="note-comments">
             <div id="note-m"></div>
             <p>评论功能暂时关闭</p>
         </div>
     </section>-->

</main>

<?php $this->need('footer.php'); ?>

