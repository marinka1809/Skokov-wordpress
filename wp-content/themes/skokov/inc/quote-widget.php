<?php
add_action( 'widgets_init', 'register_my_widget' );

function register_my_widget() {
    register_widget( 'Quote_Widget' );//Register widget
}


class Quote_Widget extends WP_Widget {

    function Quote_Widget () {// Widget Settings
        $widget_ops = array( 'classname' => 'quote' );
        $control_ops = array('id_base' => 'quote-widget' );
        $this->WP_Widget( 'quote-widget', __('Quote Widget ', 'quote'), $widget_ops, $control_ops );
    }

    function widget($args, $instance) {
        extract( $args );

        //Our variables from the widget settings.
        $title = apply_filters('widget_title', $instance['title'] );
        $quote = $instance['text-quote'];
        $name = $instance['name'];

        echo $before_widget;
        // Display the widget title
        if ( $title )
            echo $before_title . $title . $after_title;	// Выводим имя
        if ( $quote )?>
            <q>" <?php echo $quote ;?> "</q>
        <?php if ( $name )?>
            <cite><?php echo  $name ;?></cite>
        <?php echo $after_widget;
    }

    //Update the widget
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        //Strip tags from title and name to remove HTML
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['text-quote'] = strip_tags( $new_instance['text-quote'] );
        $instance['name'] = strip_tags( $new_instance['name'] );
        return $instance;
    }

    function form($instance){ // and of course the form for the widget options
        $defaults = array( 'title' => __('', 'quote'), 'text-quote' => __('', 'quote'), 'name' => __('', 'quote') );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <ul>
            <li>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'quote'); ?></label>
                <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;">
            </li>
            <li>
                <label for="<?php echo $this->get_field_id( 'text-quote' ); ?>"><?php _e('Text quote:', 'quote'); ?></label>
                <textarea id="<?php echo $this->get_field_id( 'text-quote' ); ?>" name="<?php echo $this->get_field_name( 'text-quote' ); ?>" style="width:100%;"><?php echo esc_textarea( $instance['text-quote'] ); ?></textarea>
            </li>
            <li>
                <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Autor:', 'quote'); ?></label>
                <input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" />
            </li>
        </ul>
    <?php
    }
};