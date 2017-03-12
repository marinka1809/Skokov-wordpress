<?php
add_action( 'widgets_init', 'register_widget_contact' );

function register_widget_contact() {
    register_widget( 'Contact_Widget' );//Register widget
}


class Contact_Widget extends WP_Widget {

    function Contact_Widget () {// Widget Settings
        $widget_ops = array( 'classname' => 'contact' );
        $control_ops = array('id_base' => 'contact-widget' );
        $this->WP_Widget( 'contact-widget', __('Contact Widget ', 'contact'), $widget_ops, $control_ops );
    }

    function widget($args, $instance) {
        extract( $args );

        //Our variables from the widget settings.
        $title = apply_filters('widget_title', $instance['title'] );
        $address = $instance['address'];
        $phone = $instance['phone'];
        $phone2 = $instance['phone2'];
        $mail = $instance['mail'];

        echo $before_widget;
        // Display the widget title
        if ( $title )
            echo $before_title . $title . $after_title; ?>
        <address>
            <dl class="contact-block">
                <?php if ( $address ) :?>
                    <dt class="address">Address: </dt>
                    <dd> <?php echo $address ;?> </dd>
                <?php endif; ?>
                <?php if ( $phone ) : ?>
                    <dt class="phone">Phone: </dt>
                    <dd>
                        <a href="tel: <?php echo  $phone ;?>"><?php echo  $phone ;?></a>
                        <a href="tel: <?php echo  $phone2 ;?>"><?php echo  $phone2 ;?></a>
                    </dd>
                <?php endif; ?>
                <?php if ( $mail ) :?>
                    <dt class="mail">E-mail: </dt>
                    <dd> <a class="footer-link" href="mailto:<?php echo  $mail ;?>"><?php echo  $mail ;?></a></dd>
                <?php endif; ?>
                <?php echo $after_widget;?>
            </dl>
        </address>

     <?php }

    //Update the widget
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        //Strip tags from title and name to remove HTML
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['address'] = strip_tags( $new_instance['address'] );
        $instance['phone'] = strip_tags( $new_instance['phone'] );
        $instance['phone2'] = strip_tags( $new_instance['phone2'] );
        $instance['mail'] = strip_tags( $new_instance['mail'] );
        return $instance;
    }

    function form($instance){ // and of course the form for the widget options
        $defaults = array( 'title' => __('Contact', 'contact'), 'address' => __('', 'phone'), 'name' => __('', 'contact'), 'mail' => __('', 'contact') );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
        Address
        <ul>
            <li>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'contact'); ?></label>
                <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;">
            </li>
            <li>
                <label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e('Address:', 'contact'); ?></label>
                <input id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" value="<?php echo $instance['address']; ?>" style="width:100%;" />
            </li>
            <li>
                <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e('Phone:', 'phone'); ?></label>
                <input id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo $instance['phone']; ?>" style="width:100%;" />
                <input id="<?php echo $this->get_field_id( 'phone2' ); ?>" name="<?php echo $this->get_field_name( 'phone2' ); ?>" value="<?php echo $instance['phone2']; ?>" style="width:100%;" />
            </li>
            <li>
                <label for="<?php echo $this->get_field_id( 'mail' ); ?>"><?php _e('E-mail:', 'mail'); ?></label>
                <input id="<?php echo $this->get_field_id( 'mail' ); ?>" name="<?php echo $this->get_field_name( 'mail' ); ?>" value="<?php echo $instance['mail']; ?>" style="width:100%;" />
            </li>
        </ul>
    <?php
    }
};