<?php

namespace StarterTheme\Widgets;

use WP_Widget,
    Timber\Timber;


/**
 * Widget Social
 */
class Social extends WP_Widget
{

    /**
     * Register
     */
    public static function register()
    {
        register_widget('StarterTheme\Widgets\Social');
    }


    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'StarterThemeSocial', // Base ID
            esc_html__('StarterTheme Social', 'starter-theme'), // Name
            ['description' => esc_html__('Icones réseaux sociaux footer', 'starter-theme')] // Args
        );
    }


    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        $context = Timber::get_context();
        $context['lien_linkedin'] = $instance['lien_linkedin'];
        $context['lien_youtube'] = $instance['lien_youtube'];
        Timber::render('widgets/social.twig', $context);
        echo $args['after_widget'];
    }


    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        ?><p>
        <label for="<?= $this->get_field_id('lien_linkedin'); ?>">Lien LinkedIn :</label>
        <input class="widefat" id="<?= $this->get_field_id('lien_linkedin'); ?>" name="<?= $this->get_field_name('lien_linkedin'); ?>"
               type="text" value="<?= isset($instance['lien_linkedin']) ? $instance['lien_linkedin'] : ''; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('lien_youtube'); ?>">Lien Youtube :</label>
            <input class="widefat" id="<?= $this->get_field_id('lien_youtube'); ?>" name="<?= $this->get_field_name('lien_youtube'); ?>"
                   type="text" value="<?= isset($instance['lien_youtube']) ? $instance['lien_youtube'] : ''; ?>"/>
        </p>
        <?php
    }


    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['lien_linkedin'] = isset($new_instance['lien_linkedin']) ? $new_instance['lien_linkedin'] : '';
        $instance['lien_youtube'] = isset($new_instance['lien_youtube']) ? $new_instance['lien_youtube'] : '';
        return $instance;
    }

}
