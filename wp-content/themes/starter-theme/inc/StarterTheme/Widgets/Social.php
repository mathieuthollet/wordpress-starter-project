<?php

namespace StarterTheme\Widgets;

use WP_Widget,
    Timber\Timber;


/**
 * Widget Social
 * @package StarterTheme\Widgets
 */
class Social extends WP_Widget
{
    /**
     * Initialisation globale
     */
    public static function init()
    {
        add_action('widgets_init', ['StarterTheme\Widgets\Social', 'register']);
    }


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
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        echo $args['before_widget'];
        if ($title) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        $context = Timber::get_context();
        $context['lien_facebook'] = $instance['lien_facebook'];
        $context['lien_instagram'] = $instance['lien_instagram'];
        $context['lien_twitter'] = $instance['lien_twitter'];
        $context['lien_linkedin'] = $instance['lien_linkedin'];
        $context['lien_youtube'] = $instance['lien_youtube'];
        $context['lien_viadeo'] = $instance['lien_viadeo'];
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
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ) ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>"
                   type="text" value="<?= isset( $instance['title'] ) ? $instance['title'] : ''; ?>" />
        </p>
        <p>
            <label for="<?= $this->get_field_id('lien_facebook'); ?>">Lien Facebook :</label>
            <input class="widefat" id="<?= $this->get_field_id('lien_facebook'); ?>" name="<?= $this->get_field_name('lien_facebook'); ?>"
                   type="text" value="<?= isset($instance['lien_facebook']) ? $instance['lien_facebook'] : ''; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('lien_instagram'); ?>">Lien Instagram :</label>
            <input class="widefat" id="<?= $this->get_field_id('lien_instagram'); ?>" name="<?= $this->get_field_name('lien_instagram'); ?>"
                   type="text" value="<?= isset($instance['lien_instagram']) ? $instance['lien_instagram'] : ''; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('lien_twitter'); ?>">Lien Twitter :</label>
            <input class="widefat" id="<?= $this->get_field_id('lien_twitter'); ?>" name="<?= $this->get_field_name('lien_twitter'); ?>"
                   type="text" value="<?= isset($instance['lien_twitter']) ? $instance['lien_twitter'] : ''; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('lien_linkedin'); ?>">Lien LinkedIn :</label>
            <input class="widefat" id="<?= $this->get_field_id('lien_linkedin'); ?>" name="<?= $this->get_field_name('lien_linkedin'); ?>"
                   type="text" value="<?= isset($instance['lien_linkedin']) ? $instance['lien_linkedin'] : ''; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('lien_youtube'); ?>">Lien Youtube :</label>
            <input class="widefat" id="<?= $this->get_field_id('lien_youtube'); ?>" name="<?= $this->get_field_name('lien_youtube'); ?>"
                   type="text" value="<?= isset($instance['lien_youtube']) ? $instance['lien_youtube'] : ''; ?>"/>
        </p>
        <p>
            <label for="<?= $this->get_field_id('lien_viadeo'); ?>">Lien Viadeo :</label>
            <input class="widefat" id="<?= $this->get_field_id('lien_viadeo'); ?>" name="<?= $this->get_field_name('lien_viadeo'); ?>"
                   type="text" value="<?= isset($instance['lien_viadeo']) ? $instance['lien_viadeo'] : ''; ?>"/>
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
        $instance['title'] = isset($new_instance['title']) ? $new_instance['title'] : '';
        $instance['lien_facebook'] = isset($new_instance['lien_facebook']) ? $new_instance['lien_facebook'] : '';
        $instance['lien_instagram'] = isset($new_instance['lien_instagram']) ? $new_instance['lien_instagram'] : '';
        $instance['lien_twitter'] = isset($new_instance['lien_twitter']) ? $new_instance['lien_twitter'] : '';
        $instance['lien_linkedin'] = isset($new_instance['lien_linkedin']) ? $new_instance['lien_linkedin'] : '';
        $instance['lien_youtube'] = isset($new_instance['lien_youtube']) ? $new_instance['lien_youtube'] : '';
        $instance['lien_viadeo'] = isset($new_instance['lien_viadeo']) ? $new_instance['lien_viadeo'] : '';
        return $instance;
    }

}
