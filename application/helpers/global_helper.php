<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('get_settings'))
{
    function get_settings($key = '')
    {
        $CI =& get_instance();

        $row = $CI->db
            ->select('content')
            ->where('key', $key)
            ->get('settings')
            ->row();

        return $row->content;
    }
}

if ( ! function_exists('get_site_name'))
{
    function get_site_name()
    {
        return get_settings('site_name');
    }
}


if ( ! function_exists('get_user_image'))
{
    function get_user_image()
    {
        $CI = init();
        $CI->load->model('profile_model', 'profile');

        $user_profile = $CI->profile->user_profile();
        $pic = $user_profile->profile_picture;

        return base_url('assets/uploads/static/'. $pic);
    }
}

if ( ! function_exists('get_user_name'))
{
    function get_user_name()
    {
        $CI = init();
        $CI->load->model('profile_model', 'profile');

        $user_profile = $CI->profile->user_profile();
        return $user_profile->name;
    }
}

if ( ! function_exists('get_site_logo'))
{
    function get_site_logo()
    {
        $file = get_settings('site_logo');
        return base_url('assets/uploads/static/'. $file);
    }
}