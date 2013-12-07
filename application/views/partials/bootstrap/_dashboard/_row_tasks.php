
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <legend>Your top Tasks</legend>
            <ul class="list-group">
                <? foreach ($p->get_results('contact_actions', 'task') as $row => $array): ?>
                    <li class="list-group-item"><?= word_limiter($array['action_title'], 45); ?></li>
                <? endforeach;?>
            </ul>
            <a href="#" class="text-primary pull-right">See all your tasks</a>
        </div>
    </div>
</div>