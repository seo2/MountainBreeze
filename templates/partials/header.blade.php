<!DOCTYPE html>
<html {{ language_attributes() }}>
<head>
    <meta charset="{{ get_bloginfo( 'charset' ) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="@php bloginfo('template_url') @endphp/dist/img/isotipo.svg">
    @php(wp_head())
</head>
<body @php(body_class())>
@php(wp_body_open())
