<!DOCTYPE html>
<html lang="en">
<head>
    <% base_tag %>
    $MetaTags
    <meta charset="utf-8">
    <meta name="theme-color" content="#008cc9"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <meta name="theme-color" content="#008CC9" />
    <meta http-equiv="Accept-CH" content="DPR, Width">
</head>
<body id="top">

<div id="vueapp">
    <b-navbar toggleable="md" type="dark" variant="dark">
        <b-navbar-brand href="#">NavBar</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
                <% loop $Menu(1) %>
                <b-nav-item href="$Link" title="$Title">$MenuTitle</b-nav-item>
                <% end_loop %>
            </b-navbar-nav>

            <!-- Right aligned nav items -->
            <b-navbar-nav class="ml-auto">

                <b-nav-item-dropdown text="Lang" right>
                    <b-dropdown-item href="#">EN</b-dropdown-item>
                    <b-dropdown-item href="#">ES</b-dropdown-item>
                    <b-dropdown-item href="#">RU</b-dropdown-item>
                    <b-dropdown-item href="#">FA</b-dropdown-item>
                </b-nav-item-dropdown>

            </b-navbar-nav>
        </b-collapse>
    </b-navbar>

    $Layout

</div><!-- //vue-app -->

<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

<footer>
    <div class="bg-dark mt-5 py-5 text-center text-white">
        Copyright &copy; 2019.
    </div>
</footer>

</body>
</html>
