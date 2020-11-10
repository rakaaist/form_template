<form <?php print form($form['attr']); ?>>
    <?php foreach ($form['fields'] as $input_name => $input): ?>
        <label>
            <span><?php print $input['label']; ?></span>
            <input <?php print input_attr($input_name, $input); ?>>
            <?php if(isset($input['error'])): ?>
                <p><?php print $input['error']; ?></p>
            <?php endif; ?>
        </label>
    <?php endforeach; ?>
    <?php foreach ($form['buttons'] as $button_name => $button): ?>
        <button <?php print button_attr($button_name, $button); ?>>
            <?php print $button['title']; ?>
        </button>
    <?php endforeach; ?>
</form>
