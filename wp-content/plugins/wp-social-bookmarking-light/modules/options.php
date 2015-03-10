<?php
/*
Copyright 2010 utahta (email : labs.ninxit@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/**
 * default option
 */
function wp_social_bookmarking_light_default_options()
{
    $styles = <<<EOT
.wp_social_bookmarking_light{
    border: 0 !important;
    padding: 10px 0 20px 0 !important;
    margin: 0 !important;
}
.wp_social_bookmarking_light div{
    float: left !important;
    border: 0 !important;
    padding: 0 !important;
    margin: 0 5px 0px 0 !important;
    min-height: 30px !important;
    line-height: 18px !important;
    text-indent: 0 !important;
}
.wp_social_bookmarking_light img{
    border: 0 !important;
    padding: 0;
    margin: 0;
    vertical-align: top !important;
}
.wp_social_bookmarking_light_clear{
    clear: both !important;
}
#fb-root{
    display: none;
}
.wsbl_twitter{
    width: 100px;
}
.wsbl_facebook_like iframe{
    max-width: none !important;
}
EOT;
    
    return array( "services" => "hatena_button,facebook_like,twitter",
                  "styles" => $styles,
                  "position" => "top",
                  "single_page" => true,
                  "is_page" => true,
                  "mixi" => array('check_key' => '',
                                   'check_robots' => 'noimage',
                                   'button' => 'button-3'),
                  'mixi_like' => array('width' => '65'),
                  "twitter" => array('via' => "",
                                      'lang' => "en",
                                      'count' => 'horizontal'),
                  "hatena_button" => array('layout' => 'simple-balloon'),
                  'facebook' => array('locale' => 'en_US',
                                      'version' => 'xfbml',
                                      'fb_root' => true),
                  'facebook_like' => array('layout' => 'button_count',
                                            'action' => 'like',
                                            'share' => false,
                                            'width' => '100'),
                  'facebook_share' => array('type' => 'button_count',
                                            'width' => ''),
                  'facebook_send' => array('colorscheme' => 'light',
                                           'width' => '',
                                           'height' => ''),
                  'gree' => array('button_type' => '4',
                                    'button_size' => '16'),
                  'evernote' => array('button_type' => 'article-clipper'),
                  'tumblr' => array('button_type' => '1'),
                  'atode' => array('button_type' => 'iconsja'),
                  'google_plus_one' => array('button_size' => 'medium',
                                             'lang' => 'en-US',
                                             'annotation' => 'none',
                                             'inline_size' => '250'),
                  'line' => array('button_type' => 'line88x20',
                                  'protocol' => 'http'),
                  'pocket' => array('button_type' => 'none'),
    );
}

/**
 * option
 */
function wp_social_bookmarking_light_options()
{
    $options = get_option("wp_social_bookmarking_light_options", array());
    
    // array merge recursive overwrite (1 depth)
    $default_options = wp_social_bookmarking_light_default_options();
    foreach( $default_options as $key => $val ){
        if(is_array($default_options[$key])){
            if(!array_key_exists($key, $options) || !is_array($options[$key])){
                $options[$key] = array();
            }
            $options[$key] = array_merge($default_options[$key], $options[$key]);
        }
    }
    return array_merge( wp_social_bookmarking_light_default_options(), $options );
}

/**
 * save options
 *
 * @param array $data ($_POST)
 * @return array
 */
function wp_social_bookmarking_light_save_options($data)
{
    $options = array("services" => $data["services"],
                      "styles" => $data["styles"],
                      "position" => $data["position"],
                      "single_page" => $data["single_page"] == 'true',
                      "is_page" => $data["is_page"] == 'true',
                      "mixi" => array('check_key' => $data["mixi_check_key"],
                                       'check_robots' => $data["mixi_check_robots"],
                                       'button' => $data['mixi_button']),
                      'mixi_like' => array('width' => $data["mixi_like_width"],),
                      "twitter" => array('via' => $data['twitter_via'],
                                          'lang' => $data['twitter_lang'],
                                          'count' => $data['twitter_count']),
                      'hatena_button' => array('layout' => $data['hatena_button_layout']),
                      'facebook' => array('locale' => trim($data['facebook_locale']),
                                          'version' => $data['facebook_version'],
                                          'fb_root' => $data['facebook_fb_root'] == 'true'),
                      'facebook_like' => array('layout' => $data['facebook_like_layout'],
                                                'action' => $data['facebook_like_action'],
                                                'share' => $data['facebook_like_share'] == 'true',
                                                'width' => $data['facebook_like_width']),
                      'facebook_share' => array('type' => $data['facebook_share_type'],
                                                'width' => $data['facebook_share_width']),
                      'facebook_send' => array('colorscheme' => $data['facebook_send_colorscheme'],
                                               'width' => $data['facebook_send_width'],
                                               'height' => $data['facebook_send_height']),
                      'gree' => array('button_type' => $data['gree_button_type'],
                                        'button_size' => $data['gree_button_size']),
                      'evernote' => array('button_type' => $data['evernote_button_type']),
                      'tumblr' => array('button_type' => $data['tumblr_button_type']),
                      'atode' => array('button_type' => $data['atode_button_type']),
                      'google_plus_one' => array('button_size' => $data['google_plus_one_button_size'],
                                                  'lang' => $data['google_plus_one_lang'],
                                                  'annotation' => $data['google_plus_one_annotation'],
                                                  'inline_size' => $data['google_plus_one_inline_size']),
                      'line' => array('button_type' => $data['line_button_type'],
                                      'protocol' => $data['line_protocol']),
                      'pocket' => array('button_type' => $data['pocket_button_type']),
    );
    update_option( 'wp_social_bookmarking_light_options', $options );
    return $options;
}

/**
 * restore default options
 */
function wp_social_bookmarking_light_restore_default_options()
{
    $options = wp_social_bookmarking_light_default_options();
    update_option( 'wp_social_bookmarking_light_options', $options );
    return $options;
}
