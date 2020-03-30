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

if ( ! function_exists('get_formatted_date'))
{
    function get_formatted_date($source_date)
    {
        $d = strtotime($source_date);

        $year = date('Y', $d);
        $month = date('n', $d);
        $day = date('d', $d);
        $day_name = date('D', $d);
            
        $day_names = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jum\'at',
            'Sat' => 'Sabtu'
        );
        $month_names = array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'November',
            '11' => 'Oktober',
            '12' => 'Desember'
        );
        $day_name = $day_names[$day_name];
        $month_name = $month_names[$month];

        $date = "$day_name, $day $month_name $year";

        return $date;
    }
}