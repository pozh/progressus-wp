<?php

class customheaderMetabox
{
    private $screen = array(
        'post',
        'page',
    );
    private $meta_fields = array(
        array(
            'label' => 'Add Image Header',
            'id' => 'post_imageheader',
            'type' => 'media',
        ),
    );

    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('admin_footer', array($this, 'media_fields'));
        add_action('save_post', array($this, 'save_fields'));
    }

    public function add_meta_boxes()
    {
        foreach ($this->screen as $single_screen) {
            add_meta_box(
                'customheader',
                __('Custom Header', 'progressus'),
                array($this, 'meta_box_callback'),
                $single_screen,
                'advanced',
                'default'
            );
        }
    }

    public function meta_box_callback($post)
    {
        wp_nonce_field('customheader_data', 'customheader_nonce');
        echo 'Allow you to add custom header in every page';
        $this->field_generator($post);
    }

    public function field_generator($post)
    {
        $output = '';
        foreach ($this->meta_fields as $meta_field) {
            $label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
            $meta_value = get_post_meta($post->ID, $meta_field['id'], true);
            if (empty($meta_value)) {
                $meta_value = ''; //$meta_field['default']
            }
            switch ($meta_field['type']) {
                case 'media':
                    $input = sprintf(
                        '<input style="width: 80%%" id="%s" name="%s" type="text" value="%s"> <input style="width: 19%%" class="button customheader-media" id="%s_button" name="%s_button" type="button" value="Upload" />',
                        $meta_field['id'],
                        $meta_field['id'],
                        $meta_value,
                        $meta_field['id'],
                        $meta_field['id']
                    );
                    break;
                default:
                    $input = sprintf(
                        '<input %s id="%s" name="%s" type="%s" value="%s">',
                        $meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
                        $meta_field['id'],
                        $meta_field['id'],
                        $meta_field['type'],
                        $meta_value
                    );
            }
            $output .= $this->format_rows($label, $input);
        }
        echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
    }

    public function format_rows($label, $input)
    {
        return '<tr><th>' . $label . '</th><td>' . $input . '</td></tr>';
    }

    public function media_fields()
    {
        ?>
        <script>
          jQuery(document).ready(function ($) {
            if (typeof wp.media !== 'undefined') {
              var _custom_media = true,
                _orig_send_attachment = wp.media.editor.send.attachment;
              $('.customheader-media').click(function (e) {
                var send_attachment_bkp = wp.media.editor.send.attachment;
                var button = $(this);
                var id = button.attr('id').replace('_button', '');
                _custom_media = true;
                wp.media.editor.send.attachment = function (props, attachment) {
                  if (_custom_media) {
                    $('input#' + id).val(attachment.url);
                  } else {
                    return _orig_send_attachment.apply(this, [props, attachment]);
                  }
                  ;
                }
                wp.media.editor.open(button);
                return false;
              });
              $('.add_media').on('click', function () {
                _custom_media = false;
              });
            }
          });
        </script><?php
    }

    public function save_fields($post_id)
    {
        if (!isset($_POST['customheader_nonce']))
            return $post_id;
        $nonce = $_POST['customheader_nonce'];
        if (!wp_verify_nonce($nonce, 'customheader_data'))
            return $post_id;
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;
        foreach ($this->meta_fields as $meta_field) {
            if (isset($_POST[$meta_field['id']])) {
                switch ($meta_field['type']) {
                    case 'email':
                        $_POST[$meta_field['id']] = sanitize_email($_POST[$meta_field['id']]);
                        break;
                    case 'text':
                        $_POST[$meta_field['id']] = sanitize_text_field($_POST[$meta_field['id']]);
                        break;
                }
                update_post_meta($post_id, $meta_field['id'], $_POST[$meta_field['id']]);
            } else if ($meta_field['type'] === 'checkbox') {
                update_post_meta($post_id, $meta_field['id'], '0');
            }
        }
    }
}

if (class_exists('customheaderMetabox')) {
    new customheaderMetabox;
};
